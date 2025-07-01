<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testLoginPage()
    {
        $this->get('/login')->assertSeeText('Aplikasi TodoList');
    }

    public function testDoLogin()
    {
        $this->post('/login', [
            "user" => "Aryaveda",
            "password" => "Rahasia"
        ])->assertRedirect('/');
    }

    public function testemptyformLogin()
    {
        $this->post("/login", [])
            ->assertSeeText("username atau password masih kosong");
    }

    public function testWrongUsernamePassword()
    {
        $this->post("/login", [
            "user" => "salah",
            "password" => "salah"
        ])
            ->assertSeeText("user atau password salah");
    }
}
