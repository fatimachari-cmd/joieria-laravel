<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $categories = Categoria::paginate(10);
        return view("categoria.index", compact("categories"));
    }

    public function create()
    {
        $categoria = new Categoria;
        $title = "Afegir categoria";
        $textButton = "Afegir";
        $route = route("categoria.store");
        return view("categoria.create", compact("categoria", "title", "textButton", "route"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "nom" => "required",
        ]);
        Categoria::create($request->all());
        return redirect(route("categoria.index"))
            ->with("success", "La categoria " . $request->nom . " ha estat creada correctament");
    }

    public function show(Categoria $categoria)
    {
        return view("categoria.show", compact("categoria"));
    }

    public function edit(Categoria $categoria)
    {
        $update = true;
        $title = "Editar categoria";
        $textButton = "Actualitzar";
        $route = route("categoria.update", ["categoria" => $categoria]);
        return view("categoria.edit", compact("categoria", "update", "title", "textButton", "route"));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            "nom" => "required",
        ]);
        $categoria->update($request->all());
        return back()->with("success", "La categoria " . $request->nom . " ha estat actualitzada correctament");
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return back()->with("success", "La categoria " . $categoria->nom . " ha estat eliminada correctament");
    }
}