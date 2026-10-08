<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Auth;

use App\Models\Experience;
use App\Models\User;

class UserDataExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $user = Auth::user();
        $experience = Experience::where('user_id', $user->id)->get();
        return $experience;
    }
}
