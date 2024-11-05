<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    public function index()
    {
        $datas = Question::all();
        $models = Variant::orderBy('id', 'asc')->paginate(10);
        return view('Variant.index', ['models' => $models,'datas' => $datas]);
    }
    public function create()
    {
        $datas = Question::all();
        return view('Variant.add',['datas' => $datas]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'variant' => 'required|max:255',
            'savol_id' => 'required',
        ]);
        $data = $request->all();

        Variant::create($data);

        return redirect('/variant')->with('create', 'Created');
    }
    public function update(Request $request, Variant $variant)
    {
        $data = $request->validate([
            'variant' => 'required|max:255',
            'savol_id' => 'required'
        ]);

        $variant->update($data);

        return redirect('/variant')->with('update', 'Updated');
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        $destroy = Variant::findOrFail($id);
        $destroy->delete();
        return redirect('/variant')->with('delete', 'deleted');
    }
    public function search(Request $request)
    {
        $models = Variant::where('variant', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->paginate(5);
        return response()->json($models);
    }
}
