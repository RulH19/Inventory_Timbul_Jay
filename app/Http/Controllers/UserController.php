<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = User::get();
        return view("user.index", ['data' => $user]);
    }
    public function tambah()
    {
        $users = User::get();
        return view('user.form', ['data' => $users]);
    }
    public function simpan(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ];
        User::create($data);

        return redirect()->route('user');
    }
}
