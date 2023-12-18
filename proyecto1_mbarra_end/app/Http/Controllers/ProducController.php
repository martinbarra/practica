<?php

namespace App\Http\Controllers;

use App\Models\Produc;
use Illuminate\Http\Request;

/**
 * Class ProducController
 * @package App\Http\Controllers
 */
class ProducController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producs = Produc::paginate();

        return view('produc.index', compact('producs'))
            ->with('i', (request()->input('page', 1) - 1) * $producs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produc = new Produc();
        return view('produc.create', compact('produc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Produc::$rules);

        $produc = Produc::create($request->all());

        return redirect()->route('producs.index')
            ->with('success', 'Produc created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produc = Produc::find($id);

        return view('produc.show', compact('produc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produc = Produc::find($id);

        return view('produc.edit', compact('produc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Produc $produc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produc $produc)
    {
        request()->validate(Produc::$rules);

        $produc->update($request->all());

        return redirect()->route('producs.index')
            ->with('success', 'Produc updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $produc = Produc::find($id)->delete();

        return redirect()->route('producs.index')
            ->with('success', 'Produc deleted successfully');
    }
}
