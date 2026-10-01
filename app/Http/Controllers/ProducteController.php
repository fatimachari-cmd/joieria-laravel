<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producte;
use App\Models\Categoria;

class ProducteController extends Controller
{
    public function index()
    {
        $productes = Producte::paginate(10);
        return view("producte.index", compact("productes"));
    }

    public function create()
    {
        $producte = new Producte;
        $title = "Afegir producte";
        $textButton = "Afegir";
        $route = route("producte.store");
        $categories = Categoria::all();
        return view("producte.create", compact("producte", "title", "textButton", "route", "categories"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "nom" => "required",
            "descripcio" => "required",
            "preu" => "required|numeric|min:0.01",
            "stock" => "required|integer|min:0",
            "categoria_id" => "required",
        ]);
        Producte::create($request->all());
        return redirect(route("producte.index"))
            ->with("success", "El producte " . $request->nom . " ha estat creat correctament");
    }

    public function show(Producte $producte)
    {
        return view("producte.show", compact("producte"));
    }

    public function edit(Producte $producte)
    {
        $update = true;
        $title = "Editar producte";
        $textButton = "Actualitzar";
        $route = route("producte.update", ["producte" => $producte]);
        $categories = Categoria::all();
        return view("producte.edit", compact("producte", "update", "title", "textButton", "route", "categories"));
    }

    public function update(Request $request, Producte $producte)
    {
        $request->validate([
            "nom" => "required",
            "descripcio" => "required",
            "preu" => "required|numeric|min:0.01",
            "stock" => "required|integer|min:0",
            "categoria_id" => "required",
        ]);
        $producte->update($request->all());
        return back()->with("success", "El producte " . $request->nom . " ha estat actualitzat correctament");
    }

    public function destroy(Producte $producte)
    {
        $producte->delete();
        return back()->with("success", "El producte " . $producte->nom . " ha estat eliminat correctament");
    }
}