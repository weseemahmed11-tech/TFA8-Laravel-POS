@extends('layouts.app')

@section('content')
    <section class="hero">
        <div>
            <div class="eyebrow">Simple sales, clearer service</div>
            <h1>Your store, at a glance.</h1>
            <p>CounterPoint POS is a small, friendly starting point for exploring how a Laravel application connects routes, controllers, and Blade views.</p>
            <a class="button" href="{{ route('customers.index') }}">Explore customer accounts</a>
        </div>
        <div class="terminal-card" aria-label="Point of sale summary">
            <div class="terminal-top"><span></span><span></span><span></span></div>
            <div class="terminal-line"><span>Today’s focus</span><span class="terminal-value">People first</span></div>
            <div class="terminal-line"><span>Customer accounts</span><span class="terminal-value">05</span></div>
            <div class="terminal-line"><span>Team members</span><span class="terminal-value">05</span></div>
        </div>
    </section>

    <section>
        <div class="section-heading"><div><div class="eyebrow">Start here</div><h2>Everything in one small demo</h2></div><p>Use the navigation to move between each page.</p></div>
        <div class="about-grid">
            <a class="card" href="{{ route('about') }}"><strong>01</strong><h3>Learn the idea</h3><p>See what this beginner-friendly application is designed to demonstrate.</p></a>
            <a class="card" href="{{ route('customers.index') }}"><strong>02</strong><h3>Meet customers</h3><p>Browse sample customer account cards rendered with a Blade loop.</p></a>
            <a class="card" href="{{ route('users.index') }}"><strong>03</strong><h3>View the team</h3><p>See sample store users and their roles at a glance.</p></a>
        </div>
    </section>
@endsection
