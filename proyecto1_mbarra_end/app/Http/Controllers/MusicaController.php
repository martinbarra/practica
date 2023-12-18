<?php

namespace App\Http\Controllers;

use App\Models\Musica;
use Illuminate\Http\Request;

/**
 * Class MusicaController
 * @package App\Http\Controllers
 */
class MusicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musicas = Musica::paginate();

        return view('musica.index', compact('musicas'))
            ->with('i', (request()->input('page', 1) - 1) * $musicas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $musica = new Musica();
        return view('musica.create', compact('musica'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Musica::$rules);

        $musica = Musica::create($request->all());

        return redirect()->route('musicas.index')
            ->with('success', 'Musica created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $musica = Musica::find($id);

        return view('musica.show', compact('musica'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $musica = Musica::find($id);

        return view('musica.edit', compact('musica'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Musica $musica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Musica $musica)
    {
        request()->validate(Musica::$rules);

        $musica->update($request->all());

        return redirect()->route('musicas.index')
            ->with('success', 'Musica updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $musica = Musica::find($id)->delete();

        return redirect()->route('musicas.index')
            ->with('success', 'Musica deleted successfully');
    }
}
