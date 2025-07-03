<?php

namespace Tests\Feature;

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
}
