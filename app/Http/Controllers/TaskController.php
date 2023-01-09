<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return 'tasks.index';
    }

    public function show(int $taskId)
    {
        return 'tasks.show';
    }

    public function store()
    {
        return redirect()->route('tasks.show', ['taskId' => 1]);
    }

    public function edit(int $taskId)
    {
        return 'tasks.edit';
    }

    public function update(int $taskId)
    {
        return redirect()->route('tasks.edit', ['taskId' => 1]);
    }

    public function done(int $taskId)
    {
        return 'tasks.show.done';
    }

    public function updateDone(int $taskId)
    {
        return redirect()->route('mypage');
    }

}
