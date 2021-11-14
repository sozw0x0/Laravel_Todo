<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Todocontroller extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todolist.index',['todos' => $todos]);
    }

    public function create(Request $request)
    {
        $param = [
            'content' => $request->content,
            'created_at' => now(),
        ];
        $validate_rule = [
            'content' => 'required|max:20',
        ];
        $this->validate($request,$validate_rule);
        DB::table('todos')->insert($param);
        return redirect('/todo');
    }

    public function edit(Request $request)
    {
        $item = DB::table('todos')->where('id', $request->id)->first();
        return redirect('/todo');
    }

    public function update(Request $request)
    {
        $param = [
            'content' => $request->content,
            'updated_at' => now(),
        ];
        DB::table('todos')->where('id', $request->id)->update($param);
        return redirect('/todo');
    }

    public function delete(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/todo');
    }
}
