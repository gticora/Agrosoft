<?php

namespace Agrososft\Http\Controllers;

use Agrososft\Cargo;

class CargoController extends Controller
{
    public function index()
    {
        $cargos = Cargo::query()
            ->withCount('profiles')
            ->orderBy('title')
            ->get();

        return view('cargos.index', [
            'cargos' => $cargos,
        ]);
    }

    public function destroy(Cargo $cargo)
    {
        abort_if($cargo->profiles()->exists(), 400, 'Cannot delete a cargo linked to a profile.');

        $cargo->delete();

        return redirect('cargos');
    }
}
