<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminRoutesTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_access_admin_routes()
    {
        // Create admin user
        $admin = User::factory()->create([
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Login as admin
        $this->actingAs($admin);

        // Test admin routes
        $this->get('/admin')->assertStatus(302); // Redirects to admin.dashboard
        $this->get('/admin/dashboard')->assertStatus(200);
        $this->get('/products')->assertStatus(200);
        $this->get('/products/index')->assertStatus(200); // AJAX endpoint
    }

    public function test_non_admin_cannot_access_admin_routes()
    {
        // Create regular user
        $user = User::factory()->create([
            'role' => 'buyer',
            'email_verified_at' => now(),
        ]);

        // Login as regular user
        $this->actingAs($user);

        // Test admin routes are blocked
        $this->get('/admin')->assertRedirect('/');
        $this->get('/admin/dashboard')->assertRedirect('/');
        $this->get('/products')->assertRedirect('/');
        $this->get('/products/index')->assertRedirect('/'); // Should redirect, not 401
    }

    public function test_unauthenticated_user_cannot_access_admin_routes()
    {
        // No login
        $this->get('/admin')->assertRedirect('/login');
        $this->get('/admin/dashboard')->assertRedirect('/login');
        $this->get('/products')->assertRedirect('/login');
        $this->get('/products/index')->assertRedirect('/login'); // Should redirect to login
    }
}
