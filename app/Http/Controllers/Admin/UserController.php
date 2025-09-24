<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Example: list users
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Add other CRUD methods (create, store, edit, update, destroy)
}
