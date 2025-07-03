<?php

namespace Tests\Feature;

use App\Services\TodoListService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class TodoListServiceTest extends TestCase
{

    private TodoListService $todoListService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->todoListService = $this->app->make(TodoListService::class);
    }

    public function testTodoListNotNull()
    {
        self::assertNotNull($this->todoListService);
    }

    public function testSaveTodo()
    {
        $this->todoListService->saveTodo("1", "Memakai Baju");
        $todolist = Session::get("todolist");
        foreach ($todolist as $value) {
            $this->assertEquals("1", $value["id"]);
            $this->assertEquals("Memakai Baju", $value["todolist"]);
        }
    }

    public function testGetTodolistsEmpty()
    {
        // $this->todoListService->saveTodo("1", "Mamakai Kaos Kaki");
        // $this->todoListService->saveTodo("1", "Berangkat Sekolah");

        $this->assertEquals([], $this->todoListService->getTodo());
    }

    public function testGetTodolistsNotEmpty()
    {
        $expected = [
            [
                "id" => "1",
                "todolist" => "Memakai Kaos Kaki"
            ],
            [
                "id" => "2",
                "todolist" => "Berangkat Sekolah"
            ]
        ];

        $this->todoListService->saveTodo("1", "Memakai Kaos Kaki");
        $this->todoListService->saveTodo("2", "Berangkat Sekolah");

        $this->assertEquals($expected, $this->todoListService->getTodo());
    }

    public function testDeleteTodo()
    {
        $id = "1";
        $this->todoListService->saveTodo("1", "Memakai Kaos Kaki");
        $this->todoListService->saveTodo("2", "Berangkat Sekolah");

        $expected = [
            // [
            //     "id" => "1",
            //     "todolist" => "Memakai Kaos Kaki"
            // ],
            [
                "id" => "2",
                "todolist" => "Berangkat Sekolah"
            ]
        ];

        $this->todoListService->deleteTodo($id);
        self::assertEquals($expected, $this->todoListService->getTodo());
    }
}
