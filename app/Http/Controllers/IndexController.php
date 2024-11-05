<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Javob;
use App\Models\LikeOrDislike;
use App\Models\Post;
use App\Models\Question;
use App\Models\Variant;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $javoblar = Javob::all();
        $savollar = Question::all();
        $variantlar = Variant::all();
        $models = Post::orderBy('id', 'asc')->paginate(10);
        return view('index', ['models' => $models,'savollar' => $savollar, 'variantlar' => $variantlar,'javoblar' => $javoblar]);
    }
    public function post(Request $request, Post $post)
    {
        $ip = $request->ip();
        $view = View::where('post_id',$post->id)
            ->where('user_ip',$ip)
            ->first();
        if(!$view)
        {
            $new = Post::findOrFail($request->id);
            $new->increment('view');

            $views = new View();
            $views->post_id = $request->id;
            $views->user_ip = $ip;
            $views->save();
        }
        $likes = LikeOrDislike::where('post_id', $post->id)->first();
        $comments = Comment::where('post_id', $post->id)->get();
        $models = Post::findOrFail($post->id);
        return view('posts', ['models' => $models, 'comments' => $comments, 'likes' => $likes]);
    }
    public function comment(Request $request)
    {
        $request->validate([
            'post_id' => 'required',
            'body' => 'required|max:300',
            'user_id' => 'required',
        ]);
        $data = $request->all();

        Comment::create($data);

        return redirect()->back();
    }
    public function like(Request $request)
    {
        $post = Post::findOrFail($request->post_id);

        $check = LikeOrDislike::where('user_id', Auth::id())->where('post_id', $request->post_id)->first();

        if ($check != null) {
            switch ($check->value) {
                case 0:
                    $check->value = 1;
                    $post->like++;
                    break;
                case 1:
                    $check->value = 0;
                    $post->like--;
                    break;
                default:
                    $check->value = 1;
                    $post->like++;
                    $post->dislike--;
            }
        } else {
            $like = new LikeOrDislike();
            $like->value = 1;
            $like->post_id = $request->post_id;
            $like->user_id = Auth::id();
            $post->like++;
            $like->save();
        }
        $post->save();
        return redirect()->back();
    }
    public function dislike(Request $request)
    {
        $post = Post::findOrFail($request->post_id);

        $check = LikeOrDislike::where('user_id', Auth::id())->where('post_id', $request->post_id)->first();

        if ($check != null) {
            switch ($check->value) {
                case 0:
                    $check->value = 2;
                    $post->dislike++;
                    break;
                case 1:
                    $check->value = 0;
                    $post->dislike--;
                    break;
                default:
                    $check->value = 2;
                    $post->dislike++;
                    $post->like--;
            }
        } else {
            $dislike = new LikeOrDislike();
            $dislike->value = 2;
            $dislike->post_id = $request->post_id;
            $dislike->user_id = Auth::id();
            $post->dislike++;
            $dislike->save();
        }
        $post->save();
        return redirect()->back();
    }
}
