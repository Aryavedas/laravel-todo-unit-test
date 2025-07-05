<?php

namespace Tests\Feature;

use App\Http\Controllers\TodoListController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListControllerTest extends TestCase
{
    function testShowTodolist()
    {
        $this->withSession([
            "user" => "Aryaveda",
            "todolist" =>
            [
                "id" => "1",
                "todolist" => "Memakai Sepatu"
            ],
            [
                "id" => "2",
                "todolist" => "Berangkat Sekolah"
            ]
        ])->get("/todolist")->assertSeeText("1")->assertSeeText("Memakai Sepatu")->assertSeeText("2")->assertSeeText("Berangkat Sekolah");
    }

    public function testAddEmptyTodo()
    {
        $this->withSession([
            "user" => "Aryaveda"
        ])->post("/todolist", [])->assertSeeText("Isian Kosong");
    }

    public function testAddTodo()
    {
        $this->withSession([
            "user" => "Aryaveda"
        ])->post("/todolist", ["todo" => "memakai baju"])
        ->assertRedirect("/todolist");

    }
}
