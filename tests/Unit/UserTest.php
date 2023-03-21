<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use Tests\TestCase;


class UserTest extends TestCase
{

    use RefreshDatabase;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_true_is_true(): void
    {
        $user = User::factory()->create();
        $this->assertDatabaseHas('users', [
            'name' => $user->name,
            'email' => $user->email
        ]);
    }
}
