@extends('layouts.app')

@section('content')
    <section class="page-intro"><div class="eyebrow">About the project</div><h1>Four pages, one clear foundation.</h1><p>This IT0049 activity is a compact Laravel application that demonstrates routes, controllers, Eloquent models, database seeders, and Blade templates working together in a POS-themed interface.</p></section>
    <div class="about-grid">
        <div class="card"><strong>Routes</strong><h3>Four destinations</h3><p>Each page has a named route so navigation stays readable and easy to maintain.</p></div>
        <div class="card"><strong>Views</strong><h3>Shared presentation</h3><p>A shared layout keeps the navigation, typography, spacing, and responsive styling consistent.</p></div>
        <div class="card"><strong>Data</strong><h3>Database-backed</h3><p>Customer and user records are retrieved from MySQL through Eloquent models and passed to the Blade views.</p></div>
    </div>
@endsection
