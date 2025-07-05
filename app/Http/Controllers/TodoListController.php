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
        $todo = $request->input("todo");

        if (empty($todo)) {
            $todolist = $this->todoListService->getTodo();

            return response()->view("todolist.todolist", [
                "title" => "Homepage Todolist",
                "todolist" => $todolist,
                "error" => "Isian Kosong",
            ]);
        }

        $this->todoListService->saveTodo(uniqid(), $todo);

        return redirect('/todolist');
    }

    public function removeTodo(Request $request, $id)
    {
        $this->todoListService->deleteTodo($id);

        return redirect("/todolist");
    }
}
