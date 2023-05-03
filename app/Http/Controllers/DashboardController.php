<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Post;
use App\Models\User;
use App\Models\Role;
use Auth;




class DashboardController extends Controller
{
    public function dashboard()
{
    $tasksCount = Task::where('user_id', Auth::id())->count();
    $usersCount = Auth::user()->count();
    $ticketsCount = Post::where('user_id', Auth::id())->count();

    return view('dashboard', compact('tasksCount','ticketsCount','usersCount'));
}

}
