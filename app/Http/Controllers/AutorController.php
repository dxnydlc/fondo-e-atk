<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $autores = Autor::all();

        return view('authors.index')->with(['autores' => $autores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'string|required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $path = null;

        if ($request->has('imagen')) {
            /** @noinspection NullPointerExceptionInspection */
            $path = $request->file('imagen')->store('autores', 'public');
        }

        Autor::create([
            'nombre' => $request->get('nombre'),
            'biografia' => $request->get('biografia'),
            'imagen' => $path
        ]);

        return redirect()->route('autores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Autor $autor
     * @return Response
     */
    public function show(Autor $autor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Autor $autor
     * @return Response
     */
    public function edit(Autor $autor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Autor $autor
     * @return Response
     */
    public function update(Request $request, Autor $autor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Autor $autor
     * @return RedirectResponse|Response
     * @throws Exception
     */
    public function destroy(Autor $autor)
    {
        $autor->delete();

        return redirect()->route('autores.index');
    }
}
