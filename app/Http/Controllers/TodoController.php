<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Todoリストを表示する
     *
     * @return view
     */

    public function index()
    {
        $todos = Todo::all();
        return view('index')->with('todos',$todos);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|max:20',
        ]);

        $todo = new Todo();
        $todo->create($request->all());

        return redirect('/');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|max:20',
        ]);

        $todo = Todo::find($request->id);
        $form = $request->all();
        $todo->fill($form)->save();
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $todo = Todo::find($request->id)->delete();
        return redirect('/');
    }
}
