<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function index()
    {
    	$tasks = Task::all();
    	return $tasks;
    }

    // public function show($id)
    // {
    // 	$task = Task::find($id);
    // 	dd($task->body);
    // }

    // Example route model binding
    public function show(Task $task)
    {
        dd($task->body);
    }
}
