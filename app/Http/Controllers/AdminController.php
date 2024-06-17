<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        // Menghitung jumlah pengguna
        $userCount = User::count();
    
        // Mengirim jumlah pengguna ke view admin.index
        return view('admin.index', ['userCount' => $userCount]);
    }

    public function daftarpengguna()
    {
        // Mengambil semua data pengguna
        $users = User::paginate(10); // Menggunakan paginate untuk membagi halaman

        // Mengirim data pengguna ke view
        return view('admin.daftarpengguna', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validasi data yang dikirim
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role_id' => 'required|integer',
        ]);

        // Update data pengguna
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('admin.daftarpengguna')->with('success', 'Pengguna berhasil diperbarui');
    }
}

