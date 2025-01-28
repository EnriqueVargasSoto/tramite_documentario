<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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

        $query = User::with('roles')->orderBy('id', 'asc');

        // Aplicar la búsqueda si se proporciona un término
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
                    /* ->orWhereHas('roles', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    }); */
            });
        }

        $roles = $query->paginate($perPage, '*', 'page', $page);

        return response()->json([
            'data' => $roles->items(),
            'draw' => intval($request->get('draw')),
            'recordsTotal' => $roles->total(),
            'recordsFiltered' => $roles->total(), // Si tienes filtrado
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
