<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        // Obtener los parámetros de paginación de la solicitud
        $page = $request->get('page', 1);
        $perPage = $request->get('per_page', 5);
        $search = $request->get('search');

        $query = Permission::with('roles')->orderBy('id', 'asc');

        // Aplicar la búsqueda si se proporciona un término
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhereHas('roles', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    });
            });
        }

        $permissions = $query->paginate($perPage, '*', 'page', $page);

        return response()->json([
            'data' => $permissions->items(),
            'draw' => intval($request->get('draw')),
            'recordsTotal' => $permissions->total(),
            'recordsFiltered' => $permissions->total(), // Si tienes filtrado
        ]);
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
    }
}
