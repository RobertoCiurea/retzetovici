<?php

use App\Models\User;

it('returns the register view when accessing the create method', function () {
    $response = $this->get('/register'); 

    $response->assertStatus(200); 
    $response->assertViewIs('auth.register'); 
});


it('can successfully register with valid details', function () {
 // Mock the necessary reCAPTCHA validation
    \Anhskohbo\NoCaptcha\Facades\NoCaptcha::shouldReceive('verifyResponse')->andReturn(true);
    \Anhskohbo\NoCaptcha\Facades\NoCaptcha::shouldReceive('display')->andReturn('<div>captcha</div>');

    //Mock valid form data
    $formData=[
        'name'=>'Test user',
        'email'=>'testuser@test.com',
        'password'=>'Password123!',
        'password_confirmation'=>'Password123!',
        'g-recaptcha-response'=>'dummy-response',
    ];
       $this->withSession(['_token' => csrf_token()]);
       // Assert that the user is not yet authenticated
       $this->assertGuest();

    $response = $this->post('/register', $formData);
    // Assert redirect to route with requested parameters
    $response->assertRedirect(route('my-account', ['content' => 'account-details']));

    // Assert no validation errors
    $response->assertSessionHasNoErrors(); 
    
    // Assert user authenticated
    $this->assertAuthenticated($guard = null);

});


it('fails to register a user with invalid details', function () {
   // Mock the necessary reCAPTCHA validation
   \Anhskohbo\NoCaptcha\Facades\NoCaptcha::shouldReceive('verifyResponse')->andReturn(true);
   \Anhskohbo\NoCaptcha\Facades\NoCaptcha::shouldReceive('display')->andReturn('<div>captcha</div>');

    // Mock invalid form data
    $formData = [
        'name' => '',  // Invalid: name is required
        'email' => 'invalid-email',  // Invalid: email is not a valid email format
        'password' => 'password123',  // Valid
        'password_confirmation' => 'password123',  // Valid
        'g-recaptcha-response' => 'valid-recaptcha-token', // Valid reCAPTCHA token
    ];

    // Ensure the session is started and CSRF token is available
    $this->withSession(['_token' => csrf_token()]);

    // Perform the POST request to store the user
    $response = $this->post('/register', $formData); 

    // Assert the user was not redirected (because validation failed)
    $response->assertStatus(302); 
    $response->assertSessionHasErrors(); 

    // Assert the validation errors for specific fields
    $response->assertSessionHasErrors(['name', 'email']); 



    $this->assertGuest();  
});

it("fails to register a user with invalid password confirmation", function(){
       // Mock the necessary reCAPTCHA validation
   \Anhskohbo\NoCaptcha\Facades\NoCaptcha::shouldReceive('verifyResponse')->andReturn(true);
   \Anhskohbo\NoCaptcha\Facades\NoCaptcha::shouldReceive('display')->andReturn('<div>captcha</div>');

    // Mock data with invalid password confirmation
   $formData=[
    'name'=>'Test user',
    'email'=>'testuser@test.com',
    'password'=>'Password123!',
    'password_confirmation'=>'password',
    'g-recaptcha-response'=>'dummy-response',
];
      // Ensure the session is started and CSRF token is available
      $this->withSession(['_token' => csrf_token()]);

    $response = $this->post('/register', $formData);
    $response->assertStatus(302);
    $response->assertSessionHasErrors();
    $response->assertSessionHasErrors(['password']);

    // Assert that the user is still a guest
    $this->assertGuest();

});

it('fails to register a user with invalid captcha', function () {
    // Mock NoCaptcha's verifyResponse method to return false (invalid captcha)
    \Anhskohbo\NoCaptcha\Facades\NoCaptcha::shouldReceive('verifyResponse')->andReturn(false);

    // Mock NoCaptcha's display method (optional)
    \Anhskohbo\NoCaptcha\Facades\NoCaptcha::shouldReceive('display')->andReturn('<div>captcha</div>');

    // Mock valid registration data with invalid captcha
    $formData = [
        'name' => 'testuser',
        'email' => 'testuser@example.com',
        'password' => 'password123',
        'password_confirmation' => 'password123',
        'g-recaptcha-response' => 'invalid-recaptcha-token', // Invalid reCAPTCHA token (mocked)
    ];

    // Ensure the session is started and CSRF token is available
    $this->withSession(['_token' => csrf_token()]);

    // Perform the POST request to store the user
    $response = $this->post('/register', $formData);

    // Assert the status is 302 (redirect) because validation failed due to invalid captcha
    $response->assertStatus(302); 
    $response->assertSessionHasErrors(['g-recaptcha-response']); 

   
    $this->assertGuest();
});
