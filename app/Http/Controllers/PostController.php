<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $datas = Category::all();
        $models = Post::orderBy('id', 'asc')->paginate(10);
        return view('Post.index', ['models' => $models, 'datas' => $datas]);
    }
    public function create()
    {
        $models = Category::all();
        return view('Post.add', ['models' => $models]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'text' => 'required|max:300',
            'img' => 'required|max:255',
            'category_id' => 'required'
        ]);

        $data = $request->all();
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = date('Y-m-d') . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img_uploaded'), $filename); // public_path bilan yuklash

            $data['img'] = 'img_uploaded/' . $filename;
        };

        Post::create($data);

        return redirect('/post')->with('text', 'Saved');
    }
    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        $post->update($data);

        return redirect('/post')->with('update', 'Updated');
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        $destroy = Post::findOrFail($id);
        $destroy->delete();
        return redirect('/post')->with('delete', 'deleted');
    }
    public function search(Request $request)
    {
        $models = Post::where('title', 'like', '%' . $request->search . '%')->orderBy('id', 'asc')->paginate(5);
        return response()->json($models);
    }
}
