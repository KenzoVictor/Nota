<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notaModel;

class notaController extends Controller
{
    public function index()
    {
        $resultado = [
            "nota" => "",
            "status" => ""
        ];

        return view("nota.index")->with('resultado', $resultado);
    }
    public function store(Request $request)
    {
        $data = $request->all();

        $aluno = $data["aluno"];
        $media = $data["media"];

        $nota = new notaModel();
        $nota->aluno = $aluno;
        $nota->nota = $media;

        $nota->save();

        return redirect()->route('nota.store', $data);
    }

    public function dispaly(Request $request)
    {
        $displayNota = notaModel::orderBy('id', 'asc')->get();

        return view('nota.display')->with('displayNota', $displayNota);
    }

    public function update(Request $request, $id)
    {
        $updateNota = notaModel::findOrFail($id);

        $updateNota->aluno = $request->novo_aluno;
        $updateNota->media = $request->novo_media;
    }

    public function delete(Request $request, $id)
    {

        $deleteNota = notaModel::findOrFail($id);
        $deleteNota->delete();

        return redirect('/nota/display');
    }

    public function status(Request $request)
    {
        $data = $request->all();
        $nota = $data["nota"];

        if ($nota >= 7) {
            $resultado["status"] = "Aprovado.";
        } else {
            $resultado["status"] = "Reprovado.";
        }
    }
}
