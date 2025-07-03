<?php

namespace App\Services\Impl;

use App\Services\TodoListService;
use Illuminate\Support\Facades\Session;

class TodoListServiceImpl implements TodoListService
{
    function saveTodo(string $id, string $todo): void
    {
        if (!Session::exists("todolist")) {
            Session::put("todolist", []);
        }

        Session::push("todolist", [
            "id" => $id,
            "todolist" => $todo
        ]);
    }

    function getTodo(): array
    {
        return Session::get("todolist", []);
    }

    function deleteTodo(string $id): bool
    {
        $todoLists = Session::get("todolist", []);

        foreach ($todoLists as $key => $value) {
            if ($value["id"] == $id) {
                unset($todoLists[$key]);
                break;
            }
        }

        // return dd(array_values($todoLists));
        Session::put("todolist", array_values($todoLists));
        return true;
    }
}
