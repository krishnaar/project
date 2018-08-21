<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index()
    {
      $user = User::all();
      return view('admin.user.index', compact('user'));
    }

    public function create()
    {
      $role = Role::all();
      return view('admin.user.create', compact('role'));
    }

    public function store(Request $request)
    {
      $this->validate($request,[
          'name' => 'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->role_id = $request->role_id;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('admin.user.index');
    }
}
