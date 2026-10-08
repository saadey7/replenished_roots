@extends('admin.layouts.layouts')
@section('title')
Live Chat
@endsection
@section('content')
<style>
    .messageInput:focus {
        box-shadow: none;
        background: transparent;
    }
</style>
<section class="content">
    <div class="">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Live Chat</h2>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card" style="height:80vh;">
                        <div class="row h-100">

                            <!-- Users List -->
                            <div id="userListContainer" class="col-md-3 border-right overflow-auto">
                                <h6 class="p-2">Users</h6>
                                <ul id="userList" class="list-group list-group-flush"></ul>
                            </div>

                            <!-- Chat Area -->
                            <div id="chatContainer" class="col-md-9 flex-column h-100 d-flex">
                                <div class="p-3 bg-primary text-white d-flex justify-content-between align-items-center">
                                    <button id="backButton" class="btn btn-sm btn-light d-md-none" onclick="goBack()" style="display:none;">←</button>
                                    <span id="chatHeader">Select a user</span>
                                </div>
                                <div id="chatBox" class="flex-fill p-3 overflow-auto" style="background:#f8f9fa;"></div>
                                <div id="typingIndicator" style="display:none; font-size:12px; color:gray; margin:5px;">User is typing...</div>
                                <div class="d-flex border-top" style="background:#f8f9fa; padding: 10px;">
                                    <input type="text" id="adminMessage" class="form-control border-0 messageInput"
                                           placeholder="Type a reply..." oninput="setTyping()">
                                    <button onclick="sendMessage()" class="btn btn-primary">Send</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Mobile View */
@media (max-width: 767px) {
    #userListContainer {
        width: 100%;
    }
    #chatContainer {
        width: 100%;
    }
}
</style>

<script>
  const db = firebase.database();
  let selectedUser = null;
  let typingTimeout;

  // 🔹 Load all users in sidebar
  function loadUsers() {
    const userListRef = db.ref("chats");
    userListRef.on("value", snapshot => {
      const userList = document.getElementById("userList");
      userList.innerHTML = "";

      snapshot.forEach(userSnap => {
          console.log('snapshotttt', userSnap.val())
        const emailKey = userSnap.key;
        const userData = userSnap.val();
        const emailText = userData.name ? userData.name : emailKey.replace(/_/g, ".");

        const li = document.createElement("li");
        li.className = "list-group-item";
        li.style.cursor = "pointer";
        li.onclick = () => loadUserChat(emailKey);

        const nameDiv = document.createElement("div");
        nameDiv.className = "d-flex justify-content-between align-items-center";

        const spanName = document.createElement("span");
        spanName.textContent = emailText;

        // 🔹 Badge for unread
        const badge = document.createElement("span");
        badge.className = "badge badge-danger badge-pill";
        badge.id = "badge-" + emailKey;
        badge.style.display = "none";

        nameDiv.appendChild(spanName);
        nameDiv.appendChild(badge);

        // 🔹 Last message preview
        const preview = document.createElement("small");
        preview.className = "text-muted d-block";
        preview.id = "preview-" + emailKey;
        preview.textContent = "No messages yet";

        li.appendChild(nameDiv);
        li.appendChild(preview);
        userList.appendChild(li);

        // 🔹 Listen unread count from Firebase
        const unreadRef = db.ref("chats/" + emailKey + "/unreadCount/Admin");
        unreadRef.on("value", snap => {
          const count = snap.val() || 0;
          const badgeEl = document.getElementById("badge-" + emailKey);
          if (count > 0) {
            badgeEl.style.display = "inline-block";
            badgeEl.textContent = count;
          } else {
            badgeEl.style.display = "none";
          }
        });

        // 🔹 Listen last message
        const chatRef = db.ref("chats/" + emailKey + "/messages")
          .orderByChild("timestamp").limitToLast(1);
        chatRef.on("child_added", snap => {
          const msg = snap.val();
          document.getElementById("preview-" + emailKey).textContent = msg.text;
        });
      });
    });
  }

  // 🔹 Load messages of a selected user
  function loadUserChat(emailKey) {
    selectedUser = emailKey;

    // Reset unread count
    db.ref("chats/" + emailKey + "/unreadCount/Admin").set(0);

    document.getElementById("chatHeader").innerText =
      "Chat with: " + emailKey.replace(/_/g, ".");

    const chatBox = document.getElementById("chatBox");
    chatBox.innerHTML = "";

    const chatRef = db.ref("chats/" + emailKey + "/messages");
    chatRef.off();
    chatRef.on("child_added", snapshot => {
      const msg = snapshot.val();
      displayMessage(msg.text, msg.sender);
    });

    // 🔹 Typing indicator listener
    const typingRefUser = db.ref("chats/" + emailKey + "/typing");
    typingRefUser.off();
    typingRefUser.on("value", snap => {
      const typingVal = snap.val();
      document.getElementById("typingIndicator").style.display =
        typingVal === "user" ? "block" : "none";
    });

    // ✅ Mobile view toggle
    if (window.innerWidth <= 767) {
      document.getElementById("userListContainer").classList.add("d-none");
      document.getElementById("chatContainer").classList.remove("d-none");
      document.getElementById("chatContainer").classList.add("d-flex");
      document.getElementById("backButton").style.display = "block";
    }
  }

  // 🔹 Display message
  function displayMessage(text, sender) {
    const chatBox = document.getElementById("chatBox");
    const div = document.createElement("div");

    if (sender === "Admin") {
      div.className = "text-right mb-2";
      div.innerHTML = `<span class="badge badge-primary p-2">${text}</span>`;
    } else {
      div.className = "text-left mb-2";
      div.innerHTML = `<span class="badge badge-success p-2">${text}</span>`;
    }

    chatBox.appendChild(div);
    chatBox.scrollTop = chatBox.scrollHeight;
  }

  // 🔹 Send message
  function sendMessage() {
    const input = document.getElementById("adminMessage");
    const text = input.value.trim();
    if (text === "" || !selectedUser) return;

    db.ref("chats/" + selectedUser + "/messages").push({
      sender: "Admin",
      text: text,
      timestamp: Date.now()
    });

    // Increase unread for user
    const unreadRef = db.ref("chats/" + selectedUser + "/unreadCount/User");
    unreadRef.transaction(current => (current || 0) + 1);

    input.value = "";
    setTyping(false);
  }

  // 🔹 Typing indicator
  function setTyping(isTyping = true) {
    if (!selectedUser) return;
    const typingRefAdmin = db.ref("chats/" + selectedUser + "/typing");
    typingRefAdmin.set(isTyping ? "admin" : "");

    if (isTyping) {
      clearTimeout(typingTimeout);
      typingTimeout = setTimeout(() => typingRefAdmin.set(""), 1500);
    }
  }

  // 🔹 Back button (Mobile only)
  function goBack() {
    document.getElementById("chatContainer").classList.add("d-none");
    document.getElementById("chatContainer").classList.remove("d-flex");
    document.getElementById("userListContainer").classList.remove("d-none");
  }

  // 🔹 Handle responsive switch
  window.addEventListener("resize", () => {
    if (window.innerWidth > 767) {
      document.getElementById("userListContainer").classList.remove("d-none");
      document.getElementById("chatContainer").classList.remove("d-none");
      document.getElementById("chatContainer").classList.add("d-flex");
      document.getElementById("backButton").style.display = "none";
    }
  });

  // Init
  loadUsers();
</script>

@endsection
