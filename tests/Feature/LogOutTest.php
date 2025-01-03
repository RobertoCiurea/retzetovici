<?php

use Illuminate\Support\Facades\Auth;

it('logs the user out and redirects to login', function() {
    // Create a user
    $user = \App\Models\User::factory()->create([
        'name' => 'TestUser',
        'password' => bcrypt('password123'),
    ]);

    // Log in the user
    $this->actingAs($user);

    // Ensure the user is authenticated before logout
    $this->assertAuthenticatedAs($user);

    $this->withSession(['_token' => csrf_token()]);

    // Perform a GET request to log out
    $response = $this->post('/logout');
       
    // Assert the user is logged out
    $this->assertGuest();
  
    // Assert the user is not authenticated (no longer has a session)
    $this->assertFalse(Auth::check());

    // Assert the user is redirected to the login page
    $response->assertRedirect('/login');
});
