<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class UserController extends Controller
{
    use HasRoles;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin', ['only' => ['index']]);
    }


    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('admin.users.index', compact('users'));
    }
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'apellido' => ['required'],
            'telefono' => ['required'],
            'documento' => ['required']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'documento' => $request->documento
        ]);

        //avatar
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/adminlte/dist/img/', $name);
            $user->avatar = $name;
            $user->save();
        }


        $user->assignRole($request->role);
        return redirect()->route('users.index')->with('flash', 'registrado');
    }
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('roles', 'user'));
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'apellido' => ['required'],
            'telefono' => ['required'],
            'documento' => ['required']
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'documento' => $request->documento
        ]);

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/adminlte/dist/img/', $name);
            $user->avatar = $name;
            $user->save();
        }

        $user->syncRoles($request->role);
        return redirect()->route('users.index')->with('flash', 'actualizado');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('flash', 'eliminado');
    }

    public function updateProfile(User $user, Request $request)
    {

        $user->update([
            'name' => $request->name,
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'documento' => $request->documento
        ]);

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/adminlte/dist/img/', $name);
            $user->avatar = $name;
            $user->save();
        }

        return redirect()->route('users.show', $user);
    }
}
