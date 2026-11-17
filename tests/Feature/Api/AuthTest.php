<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

test('a user can register and receives a token without exposing their password', function () {
    $response = $this->postJson('/api/register', [
        'name' => 'Taylor User',
        'email' => 'taylor@example.com',
        'password' => 'password123',
        'password_confirmation' => 'password123',
        'device_name' => 'web-app',
    ]);

    $response
        ->assertCreated()
        ->assertJsonPath('user.email', 'taylor@example.com')
        ->assertJsonStructure(['user' => ['id', 'name', 'email'], 'token'])
        ->assertJsonMissingPath('user.password');

    expect(Hash::check('password123', User::firstOrFail()->password))->toBeTrue();
});

test('a user can authenticate, access their profile, and revoke their token', function () {
    $user = User::factory()->create(['password' => 'password123']);

    $login = $this->postJson('/api/login', [
        'email' => $user->email,
        'password' => 'password123',
        'device_name' => 'test-device',
    ]);

    $login->assertOk()->assertJsonStructure(['user', 'token']);
    $token = $login->json('token');

    $this->withToken($token)
        ->getJson('/api/user')
        ->assertOk()
        ->assertJsonPath('user.id', $user->id);

    $this->withToken($token)
        ->postJson('/api/logout')
        ->assertOk();

    auth()->forgetGuards();
    $this->withToken($token)->getJson('/api/user')->assertUnauthorized();
});

test('invalid credentials and unauthenticated profile requests are rejected', function () {
    $user = User::factory()->create();

    $this->postJson('/api/login', [
        'email' => $user->email,
        'password' => 'incorrect',
    ])->assertUnprocessable();

    $this->getJson('/api/user')->assertUnauthorized();
});
