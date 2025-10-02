<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class PenggunaController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        $userQuery = User::with('role')
            ->when($query, function ($q, $query) {
                return $q->where('nama', 'like', "%{$query}%")
                        ->orWhere('username', 'like', "%{$query}%")
                        ->orWhere('email', 'like', "%{$query}%");
            })
            ->orderBy('role_id', 'asc');

        $user = $userQuery->paginate(2)->appends($request->except('page'));

        if ($request->ajax()) {
            return response()->json([
                'table' => view('admin.partials.pengguna_table', compact('user'))->render(),
                'pagination' => view('admin.partials.pagination', ['paginator' => $user])->render()
            ]);
        }

        $title = 'Hapus Pengguna?';
        $text = "Yakin ingin menghapus?";
        confirmDelete($title, $text);

        return view('admin.pengguna', compact('user'));
    }

    public function create(){
        $roles = Role::all();
        return view('admin.createPengguna', compact('roles'));
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
            'role_id' => 'required'
        ]);

        User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id
        ]);

        Alert::success('Berhasil', 'Pengguna berhasil ditambahkan!');
        return redirect()->route('pengguna.index');
    }

    public function show($id){
        $user = User::findOrFail($id);
        return view('admin.detailPengguna', compact('user'));
    }

    public function edit($id){
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.editPengguna', compact('user', 'roles'));
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_hp' => 'required',
            'role_id' => 'required'
        ]);

        $user->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'role_id' => $request->role_id
        ]);

        Alert::success('Berhasil', 'Pengguna berhasil diupdate!');
        return redirect()->route('pengguna.index');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();

        Alert::success('Dihapus!', 'Pengguna berhasil dihapus.');
        return redirect()->route('pengguna.index');
    }
}