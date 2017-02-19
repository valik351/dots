<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index() {
        return view('admin.user.index', [
            'users' => User::paginate(10)
        ]);
    }
}
