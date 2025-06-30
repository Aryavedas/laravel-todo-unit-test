<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    private UserService $userService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userService = $this->app->make(UserService::class);
    }

    public function testSample()
    {
        self::assertTrue(true);
    }

    // Login success test
    public function testLoginSuccess()
    {
        self::assertTrue($this->userService->login('Aryaveda', 'Rahasia'));
    }

    // Login failed test
    public function testLoginFailed(): bool
    {
        self::assertFalse($this->userService->login('salah', 'SAlah'));
        return true;
    }
}
