<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $models = Category::orderBy('id', 'asc')->paginate(10);
        return view('Category.index', ['models' => $models]);
    }
    public function create()
    {
        return view('Category.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'tr' => 'required',
        ]);
        $data = $request->all();

        Category::create($data);

        return redirect('/category')->with('create', 'Created');
    }
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'tr' => 'required'
        ]);

        $category->update($data);

        return redirect('/category')->with('update', 'Updated');
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        $destroy = Category::findOrFail($id);
        $destroy->delete();
        return redirect('/category')->with('delete', 'deleted');
    }
    public function search(Request $request)
    {
        $models = Category::where('name', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->paginate(5);
        return response()->json($models);
    }
    public function active(Request $request, Category $category)
    {
        $category
            ->where('id', $request->id)
            ->update(['is_active' => $request->active]);
        return redirect('/category')->with('update', 'Updated');
    }
}
