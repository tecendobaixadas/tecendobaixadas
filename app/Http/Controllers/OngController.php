<?php

namespace App\Http\Controllers;

use App\Models\Ong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OngController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $ongs = Ong::when($search, function ($query, $search) {
            return $query->where('nome_organizacao', 'like', "%{$search}%");
        })->paginate(10);

        return view('ongs.index', compact('ongs', 'search'));
    }

    public function create()
    {
        return view('ongs.create');
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
