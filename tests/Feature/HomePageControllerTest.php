<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRedirectTodolistHomepage()
    {
        $this->withSession([
            "user" => "Aryaveda"
        ])->get("/")->assertRedirect("/todolist");
    }
}
