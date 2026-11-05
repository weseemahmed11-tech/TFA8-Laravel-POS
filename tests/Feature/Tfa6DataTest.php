<?php

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('customer page displays seeded eloquent records', function () {
    $this->actingAs(User::factory()->create());
    $this->seed(DatabaseSeeder::class);

    $this->get('/customers')
        ->assertOk()
        ->assertSee(['Ava Martinez', 'Liam Chen', 'Sofia Patel', 'Noah Williams', 'Mia Thompson']);
});

test('user page displays seeded eloquent records', function () {
    $this->actingAs(User::factory()->create());
    $this->seed(DatabaseSeeder::class);

    $this->get('/users')
        ->assertOk()
        ->assertSee(['Jordan Lee', 'Casey Rivera', 'Taylor Brooks', 'Morgan Kim', 'Riley Adams']);
});
