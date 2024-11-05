<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $models = Question::orderBy('id', 'asc')->paginate(10);
        return view('Question.index', ['models' => $models]);
    }
    public function create()
    {
        return view('Question.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $data = $request->all();

        Question::create($data);

        return redirect('/question')->with('create', 'Created');
    }
    public function update(Request $request, Question $question)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
        ]);

        $question->update($data);

        return redirect('/question')->with('update', 'Updated');
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        $destroy = Question::findOrFail($id);
        $destroy->delete();
        return redirect('/question')->with('delete', 'deleted');
    }
    public function search(Request $request)
    {
        $models = Question::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->paginate(5);
        return response()->json($models);
    }
}
