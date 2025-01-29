<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::orderBy('id', 'asc')->get();
        return view('intranet.pages.users.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            $role = Role::findById($request->role_id)->name;

            $user->assignRole([$role]);

            return redirect()->back()
                ->with('success', 'Usuario agregado de manera correcta!');
        } catch (\Error $e) {
            //throw $th;
            return redirect()->back()
                ->with('error', $e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        try {

            $user = User::find($request->id);
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->email = $request->email;

            if ($request->password) {
                $user->password = bcrypt($request->password);
            }

            $user->save();


            $role = Role::findById($request->role_id)->name;

            $user->syncRoles([$role]);

            return redirect()->back()
                ->with('success', 'Usuario actualizado de manera correcta!');
        } catch (\Error $e) {
            //throw $th;
            return redirect()->back()
                ->with('error', $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
