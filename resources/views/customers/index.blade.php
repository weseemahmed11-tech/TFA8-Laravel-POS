@extends('layouts.app')

@section('content')
    <div class="section-heading"><section class="page-intro"><div class="eyebrow">Customer accounts</div><h1>People behind every purchase.</h1><p>These customer accounts are loaded from the database through an Eloquent model and displayed with a Blade loop.</p></section><a class="button" href="{{ route('customers.create') }}">Add customer</a></div>
    @if (session('status'))<div class="alert alert-success">{{ session('status') }}</div>@endif
    <div class="cards">
        @foreach ($customers as $customer)
            <article class="card">
                <div class="card-header"><div><h3><a href="{{ route('customers.show', $customer) }}">{{ $customer->full_name }}</a></h3><div class="record-id">Customer #{{ $customer->id }}</div></div><a class="text-action" href="{{ route('customers.edit', $customer) }}">Edit</a></div>
                <dl class="details"><div><dt>Email</dt><dd>{{ $customer->email }}</dd></div><div><dt>Phone</dt><dd>{{ $customer->phone }}</dd></div></dl>
                <form method="POST" action="{{ route('customers.destroy', $customer) }}" class="form-actions">@csrf @method('DELETE')<button class="delete-action" type="submit">Delete</button></form>
            </article>
        @endforeach
    </div>
@endsection
