<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Show user screen can be rendered
     *
     * @return void
     */
    public function test_show_user_screen_can_be_rendered(): void
    {
        $user = User::factory()->create([
            'role' => 'admin',
        ]);

        $response = $this->actingAs($user)
            ->get(route('admin.users.show', $user));

        $response->assertOk();
    }

    /**
     * Not admin user cant see users 
     *
     * @return void
     */
    public function test_not_admin_user_cant_see_users(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('admin.users.show', $user));

        $response->assertForbidden();
    }
}
