<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        return view('user.index', [
            'users' =>User::all(),
            'title' =>'user'
        ]);
    }

    public function edit(User $id) {
        return view('user.edit', [
            'title' => 'user',
            'user' => $id,
        ]);
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $validateData = $request->validate([
            'username' => 'required|string|max:100',
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:100',
        ]);

        $user->update($validateData);

        return redirect()->route('user.index')->with('success', 'user berhasil Diupdate');
    }
    
    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'user berhasil Dihapus');
    }
}
