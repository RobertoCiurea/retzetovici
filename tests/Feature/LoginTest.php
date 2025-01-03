<?php

it("returns the login view", function(){
    $response = $this->get('/login');

    $response->assertStatus(200);
    $response->assertViewIs('auth.login');
});

it("letting user to log in with valid form data", function(){
    // Mock user creation

   $user = \App\Models\User::factory()->create([
    "name"=>"TestUser",
    "password"=>bcrypt("password123"),
   ]);


    // Mock valid form data

    $formData =[
        "name"=>"TestUser",
        "password"=>"password123",
    ];

    $this->withSession(['_token' => csrf_token()]);
       // Assert that the user is not yet authenticated
    $this->assertGuest();

    $response = $this->post('/login', $formData);
      // Assert user authenticated
     $this->assertAuthenticatedAs($user);  

     // Assert redirect to route with requested parameters
     $response->assertRedirect(route('my-account', ['content' => 'account-details']));

     // Assert no validation errors
     $response->assertSessionHasNoErrors(); 
     

});


it("fails to log in with an invalid name", function(){
    // Create the user as before
    $user = \App\Models\User::factory()->create([
        "name" => "TestUser",
        "password" => bcrypt("password123"),
    ]);

    // Mock invalid form data with an incorrect 'name'
    $formData = [
        "name" => "InvalidUser",  // Invalid name
        "password" => "password123",  // Correct password
    ];

    $response = $this->post('/login', $formData);

    // Assert the user is not authenticated
    $this->assertGuest();  

    // Assert redirect back to the login page
    $response->assertRedirect('/login');

    // Assert the session has the login error message
    $response->assertSessionHas('login_error', 'Nume sau parola gresita. Incearca din nou!');
});

it("fails to log in with an incorrect password", function(){
    // Create the user as before
    $user = \App\Models\User::factory()->create([
        "name" => "TestUser",
        "password" => bcrypt("password123"),
    ]);

    // Mock invalid form data with an incorrect 'password'
    $formData = [
        "name" => "TestUser",  // Correct name
        "password" => "wrongpassword",  // Incorrect password
    ];

    $response = $this->post('/login', $formData);

    // Assert the user is not authenticated
    $this->assertGuest();

    // Assert redirect back to the login page
    $response->assertRedirect('/login');

    // Assert the session has the login error message
    $response->assertSessionHas('login_error', 'Nume sau parola gresita. Incearca din nou!');
});
