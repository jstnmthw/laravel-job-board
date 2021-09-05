<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserUpdatePolicyTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_update_own_model() {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->put(
            route('users.update', $user), [
                'name' => 'User test'
            ]
        );
        $response->assertSuccessful();
        $user->refresh();
        $this->assertEquals('User test', $user->name);
    }

    public function test_user_cannot_update_foreign_user_model() {
        $user = User::factory()->create();
        $foreign_user = User::factory()->create([
            'name' => 'Foreign User'
        ]);
        $response = $this->actingAs($user)->put(route('users.update', $foreign_user), [
            'name' => $user->name
        ]);
        $response->assertForbidden();
        $foreign_user->refresh();
        $this->assertEquals('Foreign User', $foreign_user->name);
    }
}
