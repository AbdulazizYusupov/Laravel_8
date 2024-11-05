<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Javob;
use Illuminate\Http\Request;

class JavobController extends Controller
{
    public function index()
    {
        $models = Javob::orderBy('id', 'asc')->paginate(10);
        return view('Javob.index', ['models' => $models]);
    }
    public function store(Request $request)
    {
        $ip = $request->ip();
        $savol_id = $request->savol_id;
        $variant_id = $request->variant_id;
        $data = [
            'savol_id' => $savol_id,
            'variant_id' => $variant_id,
            'user_ip' => $ip,
        ];

        $javob = Javob::where('savol_id',$savol_id)
            ->where('user_ip',$ip)
            ->first();

        if(!$javob)
        {
            Javob::create($data);
        };

        return redirect()->back();
    }
    public function count(Request $request)
    {
        dd(123);
        $datas = Javob::where('savol_id',$request->savol_id)
            ->count('variant_id');
        dd($datas);
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        $destroy = Javob::findOrFail($id);
        $destroy->delete();
        return redirect('/javob')->with('delete', 'deleted');
    }
}
