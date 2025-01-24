<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::with('users')->orderBy('id', 'asc')->get();
        $permissions = Permission::where('status', 1)->orderBy('id', 'asc')->get();

        $agrupados = [];

        foreach ($permissions as $permiso) {
            // Extraemos el tipo (usuario, rol, permiso) y la acción (listar, crear, etc.)
            list($categoria, $accion) = explode('-', $permiso['name']);

            // Crear un array por cada categoría (usuarios, roles, permisos)
            // Agrupar los permisos por categoría
            $agrupados[$categoria][] = [
                'id' => $permiso['id'],
                'accion' => $accion
            ];

        }
        //dd($agrupados);
        return view('intranet.pages.roles.index', compact('roles', 'agrupados'));
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
            $permissionsID = [];
            //
            $permisosSeleccionados = $request->input('permisos');
            // Si los permisos fueron enviados en un formato estructurado como categorías
            foreach ($permisosSeleccionados as $categoria => $ids) {
                // Convertir los permisos en esa categoría a enteros y agregarlos al array
                $permissionsID = array_merge($permissionsID, array_map(function($value) {
                    return (int)$value;
                }, $ids));
            }
            //dd($permissionsID);

            $role = Role::create(['name' => $request->input('name')]);
            $role->syncPermissions($permissionsID);

            return redirect()->back()
                ->with('success', 'Rol agregado de manera correcta!');
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        try {
            //code...
            $role = Role::find($id);
            $role->status = 0;
            $role->save();

            return response()->json(['success' => 'Permiso eliminado correctamente.']);
        } catch (\Error $e) {
            //throw $th;
            return redirect()->back()
                ->with('error', 'Error al editar el permiso!');
        }
    }
}
