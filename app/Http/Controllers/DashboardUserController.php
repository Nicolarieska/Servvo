<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardUserController extends Controller
{
    public function index($id)
    {
        $user = User::findOrFail($id);

        return view('user.index', [
            'title' => 'Dashboard User',
            'user' => $user,
        ]);
    }
}
