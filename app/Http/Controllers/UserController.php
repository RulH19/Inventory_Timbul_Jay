<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

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
        Alert::success('Berhasil', 'Data Telah Ditambah');
        return redirect()->route('user');
    }
    public function hapus($id)
    {
        User::find($id)->delete();

        return redirect()->route('user');
    }
}
