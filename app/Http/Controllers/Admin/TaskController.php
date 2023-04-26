<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function __construct()
     {
         $this->middleware('role_or_permission:Task access|Task create|Task edit|Task delete', ['only' => ['index','show']]);
         $this->middleware('role_or_permission:Task create', ['only' => ['create','store']]);
         $this->middleware('role_or_permission:Task edit', ['only' => ['edit','update']]);
         $this->middleware('role_or_permission:Task delete', ['only' => ['destroy']]);
     }
 
     /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function index()
     {
         // $Post= Post::paginate(4);
         // return view('post.index',['posts'=>$Post]);$user = Auth::user();
         $user = Auth::user();
    if ($user->hasRole('Admin')) {
        $tasks = Task::paginate(5);
    } else {
        $tasks = Task::where('user_id', $user->id)->paginate(5);
    }

    return view('task.index', compact('user', 'tasks'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request->all();
        $data['user_id'] = Auth::user()->id;
        $Task = Task::create($data);
        return redirect()->back()->withSuccess('Task created !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
       return view('task.edit',['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return redirect()->back()->withSuccess('Task updated !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back()->withSuccess('Task deleted !!!');
    }
}
