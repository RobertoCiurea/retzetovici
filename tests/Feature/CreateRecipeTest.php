<?php

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\assertTrue;

beforeEach(function () {
    Storage::fake('public');
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
    
});

it('stores a recipe with valid data', function () {

    $data = [
        'title' => 'Test Recipe',
        'description' => 'This is a test recipe.',
        'category' => 'Dessert',
        'ingredients' => ['Sugar', 'Flour'],
        'steps' => ['Mix ingredients', 'Bake for 30 minutes'],
        'duration' => 45,
        'difficulty' => 'Easy',
        'image' => UploadedFile::fake()->image('recipe.jpg'),
        'tags' => ['sweet', 'dessert'],
    ];
    $this->withSession(['_token' => csrf_token()]);
    $response = $this->post('/create-recipe',);

    $response->assertRedirect()->assertSessionHas('success', 'Rețeta a fost salvată cu succes!');
    $this->assertDatabaseHas('recipes', [
        'title' => $data['title'],
        'description' => $data['description'],
        'category' => $data['category'],
        'duration' => $data['duration'],
        'difficulty' => $data['difficulty'],
        "username"=>$this->user->name,
        'user_id' => $this->user->id,
    ]);
    // Assert that there is a file in public storage
    $document = Storage::disk('public')->exists('images/' . $data['image']->hashName());
    $this->assertTrue($document);
});

it('fails when required fields are missing', function () {
    $data = [];
    $this->withSession(['_token' => csrf_token()]);
    $response = $this->post('/create-recipe', $data);

    $response->assertSessionHasErrors([
        'title',
        'description',
        'category',
        'ingredients',
        'steps',
        'duration',
        'difficulty',
        'image',
    ]);
});

it('fails when ingredients are not an array', function () {
    $data = [
        'title' => 'Test Recipe',
        'description' => 'Test',
        'category' => 'Dessert',
        'ingredients' => 'Not an array',
        'steps' => ['Step 1'],
        'duration' => 30,
        'difficulty' => 'Easy',
        'image' => UploadedFile::fake()->image('recipe.jpg'),
    ];
    $this->withSession(['_token' => csrf_token()]);
    $response = $this->post('/create-recipe', $data);

    $response->assertSessionHasErrors(['ingredients']);
});

it('fails when steps are not an array', function () {
    $data = [
        'title' => 'Test Recipe',
        'description' => 'Test',
        'category' => 'Dessert',
        'ingredients' => ['Flour', 'Water'],
        'steps' => 'Not an array',
        'duration' => 30,
        'difficulty' => 'Easy',
        'image' => UploadedFile::fake()->image('recipe.jpg'),
    ];
    $this->withSession(['_token' => csrf_token()]);
    $response = $this->post('/create-recipe', $data);

    $response->assertSessionHasErrors(['steps']);
});

it('fails when image is not valid', function () {
    $data = [
        'title' => 'Test Recipe',
        'description' => 'Test',
        'category' => 'Dessert',
        'ingredients' => ['Flour', 'Water'],
        'steps' => ['Step 1'],
        'duration' => 30,
        'difficulty' => 'Easy',
        'image' => 'Not an image',
    ];
    $this->withSession(['_token' => csrf_token()]);
    $response = $this->post('/create-recipe', $data);

    $response->assertSessionHasErrors(['image']);
});

it('allows nullable tags', function () {
    $data = [
        'title' => 'Test Recipe',
        'description' => 'Test',
        'category' => 'Dessert',
        'ingredients' => ['Sugar', 'Flour'],
        'steps' => ['Mix', 'Bake'],
        'duration' => 30,
        'difficulty' => 'Easy',
        'image' => UploadedFile::fake()->image('recipe.jpg'),
        'tags' => null,
    ];
    $this->withSession(['_token' => csrf_token()]);
    $response = $this->post('/create-recipe', $data);

    $response->assertRedirect()->assertSessionHas('success');

    $this->assertDatabaseHas('recipes', [
        'title' => $data['title'],
        'tags' => '[]', 
    ]);
});
