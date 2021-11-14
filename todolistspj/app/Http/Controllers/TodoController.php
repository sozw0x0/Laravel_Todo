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
        ];
        $validate_rule = [
            'content' => 'required|max:20'
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
        ];
        DB::table('todos')->where('id', $request->id)->update($param);
        return redirect('/todo');
    }

    public function delete(Request $request)
    {
        $item = DB::table('todos')->where('id', $request->id)->first();
        redirect()->route('todos.index');
    }

    public function remove(Request $request)
    {
        $param = ['id' => $request->id];
        DB::table('todos')->where('id', $request->id)->delete();
        return redirect('/todo');
    }

}
