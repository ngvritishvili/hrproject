<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * TaskController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (Auth::user()->role == 'Manager') {

            return view('tasks.create');
        } else {

            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Task::create($request->all());
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thisTask = Task::find($id);
        $author = User::find($thisTask->user_id);

        return view('tasks.show', compact('thisTask', 'author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if (request('delete') == 'godelete'){

            Task::find($id)->delete();

            return redirect('tasks');
        } else {
            $task = Task::find($id);
            $task->name = request('name');
            $task->description = request('description');
            $task->task_date = request('task_date');
            $task->save();

        }

        return redirect('tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        if (request('editButton')){
            redirect(route('tasks.update'));
        }
        Task::find($id)->delete();

        return redirect('tasks');
    }
}
