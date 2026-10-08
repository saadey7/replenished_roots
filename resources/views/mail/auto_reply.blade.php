<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Query Received</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Arial', Helvetica, sans-serif; background-color: #f4f4f4;">
  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #f4f4f4; padding: 20px;">
    <tr>
      <td align="center">
        <table role="presentation" width="600" cellspacing="0" cellpadding="0" style="background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
          <!-- Header -->
          <tr>
            <td style="padding: 40px 30px 20px; text-align: center; background-color: #2c5282; border-radius: 8px 8px 0 0;">
              <h1 style="color: #ffffff; font-size: 24px; margin: 0;">We've Received Your Query</h1>
            </td>
          </tr>
          <!-- Content -->
          <tr>
            <td style="padding: 30px; color: #333333; font-size: 16px; line-height: 1.6;">
              <p style="margin: 0 0 20px;">Dear <strong>{!! $name !!}</strong>,</p>
              <p style="margin: 0 0 20px;">Thank you for contacting us. We’ve received your query and our support team will get back to you within 24–48 hours.</p>
              <p style="margin: 0 0 20px;">Here’s a summary of your request:</p>
              
              <table role="presentation" width="100%" cellspacing="0" cellpadding="10" style="border: 1px solid #e0e0e0; border-collapse: collapse;">
                <tr style="background-color: #f9f9f9;">
                  <th style="border: 1px solid #e0e0e0; padding: 10px; text-align: left; color: #2c5282;">Field</th>
                  <th style="border: 1px solid #e0e0e0; padding: 10px; text-align: left; color: #2c5282;">Details</th>
                </tr>
                <tr>
                  <td style="border: 1px solid #e0e0e0; padding: 10px;">Phone</td>
                  <td style="border: 1px solid #e0e0e0; padding: 10px;">{!! $phone !!}</td>
                </tr>
                <tr>
                  <td style="border: 1px solid #e0e0e0; padding: 10px;">Message</td>
                  <td style="border: 1px solid #e0e0e0; padding: 10px;">{!! $user_message !!}</td>
                </tr>
              </table>

              <p style="margin: 20px 0;">If you have urgent concerns, you can reply directly to this email.</p>
              <p style="margin: 0;">Best regards,<br>The Replenished Roots Support Team</p>
            </td>
          </tr>
          <!-- Footer -->
          <tr>
            <td style="padding: 20px 30px; text-align: center; background-color: #edf2f7; border-radius: 0 0 8px 8px; font-size: 14px; color: #4a5568;">
              <p style="margin: 0;">&copy; 2025 Replenished Roots. All rights reserved.</p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
