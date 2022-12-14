<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;

class UserController extends Controller
{
    
    //   Tampilkan formulir pengguna baru

    public function create()
    {
        $roles = Role::pluck('name','id');

        return view('users.create', compact('roles'));
    }

    // Untuk Menyimpan data ke Database
    public function store(Request $request)
    {
        $this->validate($request, [
            'nip'           => 'required|unique:users',
            'name'          => 'bail|required|min:2',
            'email'         => 'required',
            'jenis_kelamin' => 'required',
            'jabatan'       => 'required',
            'alamat'        => 'required',
            'phone'         => 'required',
            'password'      => 'required|min:6',
            'roles'         => 'required|min:1',
        ]);

        $request->merge(['password' => bcrypt($request->get('password'))]);

        if($user = User::create($request->except('roles'))){
            $user->syncRoles($request->get('roles'));

            flash()->success('Pengguna berhasil ditambahkan');

        }else{
            flash()->error('Tidak dapat menambahkan pengguna');
        }

        return redirect()->route('anggota.index');
    }

    public function edit($id)
    {
        $data = [
            'pegawai'   => User::findOrFail($id),
            'roles'     => Role::pluck('name', 'id'),
        ];

        return view('users.edit', $data);
        // parameter 
        // identitas 
        // untuk mengidentifikasikan 

        // compact per variable hanya satu 

    }


    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);  // untuk mencari data dengan parameter id 
        $user->fill($request->except('roles'));  // untuk mencari data kecuali roles

        $user->save();  // Menyimpan data
        $user->syncRoles($request->get('roles')); // disinkronkan agar semua nya sah

        flash()->success('Data penguna berhasil di perbaharui');

        return redirect()->route('anggota.index');
    }

}
