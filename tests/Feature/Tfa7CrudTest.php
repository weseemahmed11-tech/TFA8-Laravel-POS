<?php

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    $this->actingAs(User::factory()->create());
});

test('guests are redirected from customer and user resources', function () {
    auth()->logout();

    $this->get(route('customers.index'))->assertRedirect(route('login'));
    $this->get(route('users.index'))->assertRedirect(route('login'));
});

test('resource routes expose the standard customer and user names', function () {
    expect(route('customers.index'))->toEndWith('/customers')
        ->and(route('customers.create'))->toEndWith('/customers/create')
        ->and(route('customers.show', 1))->toEndWith('/customers/1')
        ->and(route('customers.edit', 1))->toEndWith('/customers/1/edit')
        ->and(route('users.index'))->toEndWith('/users')
        ->and(route('users.create'))->toEndWith('/users/create')
        ->and(route('users.show', 1))->toEndWith('/users/1')
        ->and(route('users.edit', 1))->toEndWith('/users/1/edit');
});

test('customer can be created and edited with validation', function () {
    $this->post(route('customers.store'), ['full_name' => '', 'email' => 'not-an-email'])
        ->assertSessionHasErrors(['full_name', 'email'])
        ->assertSessionHasInput('email', 'not-an-email');

    $this->post(route('customers.store'), ['full_name' => 'New Customer', 'email' => 'new@example.com'])
        ->assertRedirect(route('customers.index'));

    $customer = Customer::where('email', 'new@example.com')->firstOrFail();

    $this->get(route('customers.edit', $customer))->assertOk()->assertSee('New Customer');
    $this->put(route('customers.update', $customer), ['full_name' => 'Updated Customer', 'email' => 'updated@example.com'])
        ->assertRedirect(route('customers.index'));

    expect($customer->fresh()->full_name)->toBe('Updated Customer');
});

test('user can be created and edited while keeping its username', function () {
    $this->post(route('users.store'), ['username' => '', 'full_name' => ''])
        ->assertSessionHasErrors(['username', 'full_name']);

    $this->post(route('users.store'), ['username' => 'new.user', 'full_name' => 'New User'])
        ->assertRedirect(route('users.index'));

    $user = User::where('username', 'new.user')->firstOrFail();

    $this->put(route('users.update', $user), ['username' => 'new.user', 'full_name' => 'Updated User'])
        ->assertRedirect(route('users.index'));

    expect($user->fresh()->full_name)->toBe('Updated User');
});

test('user creation rejects duplicate usernames and invalid avatars', function () {
    User::factory()->create(['username' => 'taken.user']);

    $this->post(route('users.store'), ['username' => 'taken.user', 'full_name' => 'Another User'])
        ->assertSessionHasErrors('username');

    $this->post(route('users.store'), ['username' => 'file.user', 'full_name' => 'File User', 'avatar' => UploadedFile::fake()->create('avatar.txt', 10, 'text/plain')])
        ->assertSessionHasErrors('avatar');

    $this->post(route('users.store'), ['username' => 'large.user', 'full_name' => 'Large User', 'avatar' => UploadedFile::fake()->create('avatar.png', 2049, 'image/png')])
        ->assertSessionHasErrors('avatar');
});

test('valid user avatar is prepared, stored, and displayed with a placeholder fallback', function () {
    Storage::fake('public');

    $this->post(route('users.store'), ['username' => 'avatar.user', 'full_name' => 'Avatar User', 'avatar' => UploadedFile::fake()->image('avatar.png', 400, 300)])
        ->assertRedirect(route('users.index'));

    $user = User::where('username', 'avatar.user')->firstOrFail();
    User::create(['username' => 'placeholder.user', 'full_name' => 'Placeholder User', 'name' => 'Placeholder User', 'email' => 'placeholder.user@example.com', 'password' => 'password']);
    expect($user->avatar)->toStartWith('avatars/')->and($user->avatar)->toEndWith('.jpg');
    Storage::disk('public')->assertExists($user->avatar);

    $this->get(route('users.index'))->assertOk()->assertSee('Avatar User')->assertSee('storage/'.$user->avatar, false)->assertSee('Placeholder User');
});

test('customers and users can be deleted through their resource routes', function () {
    $customer = Customer::create(['full_name' => 'Delete Customer', 'email' => 'delete@example.com', 'phone' => '123']);
    $user = User::factory()->create(['username' => 'delete.user']);

    $this->delete(route('customers.destroy', $customer))->assertRedirect(route('customers.index'));
    $this->delete(route('users.destroy', $user))->assertRedirect(route('users.index'));

    expect(Customer::find($customer->id))->toBeNull()
        ->and(User::find($user->id))->toBeNull();
});
