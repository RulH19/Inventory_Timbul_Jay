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
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $user = User::where('nama', 'LIKE', '%' . $request->search . '%')
                ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                ->orWhere('role', 'LIKE', '%' . $request->search . '%')
                ->paginate(5);
        } else {
            $user = User::paginate(5);
        }
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
    public function hapusUser(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->route('barangMasuk');
        }
    }
}
