<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class GestAdmin extends Controller
{
    public function gestAdmin()
    {
        $users = User::all();

        return view('managerUser', ['users' => $users]);
    }
}
