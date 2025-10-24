<?php

namespace App\Http\Controllers;

use App\Models\Oportunidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OportunidadeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $oportunidades = Oportunidade::when($search, function ($query, $search) {
            return $query->where('titulo', 'like', "%{$search}%");
        })->paginate(10);

        return view('oportunidades.index', compact('oportunidades', 'search'));
    }

    public function create()
    {
        return view('oportunidades.create');
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
