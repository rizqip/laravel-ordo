<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function listUser()
    {
        $listuser = DB::table('users')
                    ->get();

        return redirect()->view('users/dashboard')->with(
            ['listuser' => $listuser]
        );
    }

    // Sengaja untuk menunjukan bahwa saya bisa menggunakan Eloquent ORM, namun saya lebih prefer menggunakan query
    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|password_confirmation',
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'role' => 'required',
            'gender' => 'required',
            'image' => $request->image,
        ]);

        // $createUser = User::create($request->all());
        User::create($request->all());

        // if (!$createUser) {
        //     return redirect('/users/dashboard')
        //         ->with('alert-failed', 'Data Tidak Ditemukan !');
        // } else {
        //     return redirect()->view('users/dashboard')
        //         ->with('success', 'User created successfully.');
        // }
        return redirect()->view('users/dashboard')
            ->with('success', 'User created successfully.');
    }

    public function detailUser($id)
    {
        $detailUser = DB::table('users')
                    ->select('name', 'email', 'address', 'phone_number', 'role', 'gender')
                    ->where('id', $id)
                    ->get();


        if (!$detailUser) {
            return redirect('/users/dashboard')
                ->with('alert-failed', 'Data Tidak Ditemukan !');
        } else {
            return redirect()->view('users/detail/'. $id)->with(
                ['detailuser' => $detailUser]
            );
        }
    }

    public function updateUser(Request $request, $id)
    {
        $updateUser = DB::table('users')
                    ->where('id', $id)
                    ->update(
                        array(
                            'email' => $request->email,
                            'address' => $request->address,
                            'phone_number' => $request->phone_number,
                            'image' => $request->image,
                        )
                    );

        if (!$updateUser) {
            return redirect('/users/dashboard')
                ->with('alert-failed', 'Data Tidak Ditemukan !');
        } else {
            return redirect()->view('users/detail/'. $id)->with(
                ['detailuser' => $this->detailUser]
            );
        }
    }

    public function deleteUser($id)
    {
        $deleteUser = DB::table('users')
                    ->where('id', $id)
                    ->delete();

        if (!$deleteUser) {
            return redirect('/users/dashboard')
                ->with('alert-failed', 'Gagal Menghapus User !');
        } else {
            return redirect('/users/dashboard')
                ->with('alert-success', 'Berhasil Menghapus User');
        }
    }
}
