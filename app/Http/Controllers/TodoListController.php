<?php

namespace App\Http\Controllers;

use App\Services\TodoListService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TodoListController extends Controller
{
    private TodoListService $todoListService;

    public function __construct(TodoListService $todoListService)
    {
        $this->todoListService = $todoListService;
    }
    public function todolist(Request $request)
    {
        return view("todolist.todolist", [
            "title" => "Homepage Todolist",
            "todolist" => $this->todoListService->getTodo()
        ]);
    }

    public function addTodo(Request $request)
    {
        // $todolist = $request->input("todo");
        // $this->todoListService->saveTodo($todolist);
    }

    public function removeodo(Request $request, $id) {}
}
