<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        /* $permissions = Permission::orderBy('id','DESC')->paginate(5);
        return view('intranet.pages.permissions.index',compact('permissions'))->with('i', ($request->input('page', 1) - 1) * 5); */
        return view('intranet.pages.permissions.index');
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
        //
        try {
            Permission::create($request->all());
            return redirect()->back()
                ->with('success', 'Permiso agregado de manera correcta!');
        } catch (\Error $e) {
            //throw $th;
            return redirect()->back()
                ->with('error', 'Error al crear el permiso!');
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
        try {
            $permission = Permission::find($request->id);
            $permission->name = $request->name;
            $permission->save();

            return redirect()->back()
                ->with('success', 'Permiso editado de manera correcta!');
        } catch (\Error $e) {
            //throw $th;
            return redirect()->back()
                ->with('error', 'Error al editar el permiso!');
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
