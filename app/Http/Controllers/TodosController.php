<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class TodosController extends Controller
{
//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
    public function index()
    {
        //
        return view('todos.index')->with('todos',Todo::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[

            'name' => 'required',
            'description' => 'required'

        ]);

        $input = $request->all();
        $input['completed'] = false;
        Todo::create($input);

        session()->flash('success','Todo created successfully!');

        return redirect('todos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::findorfail($id);
        return view('todos.show',compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $todo = Todo::findorfail($id);
        return view('todos.edit',compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = request()->all();
        $input['completed'] = false;
        Todo::find($id)->update($input);

        session()->flash('success','Todo updated successfully!');

        return redirect('todos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Todo::findorfail($id)->delete();

        session()->flash('success','Todo deleted successfully!');

        return redirect('todos');

    }

    public function complete(Todo $todo)
    {

       $todo->completed = true;
       $todo->save();
        return redirect('todos');

    }
}
