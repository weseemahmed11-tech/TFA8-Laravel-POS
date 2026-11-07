@extends('layouts.app')

@section('content')
    <div class="section-heading"><section class="page-intro"><div class="eyebrow">Store users</div><h1>The team at the counter.</h1><p>Meet the store users loaded from the database through an Eloquent model and rendered with a Blade loop.</p></section><a class="button" href="{{ route('users.create') }}">Add user</a></div>
    @if (session('status'))<div class="alert alert-success">{{ session('status') }}</div>@endif
    <div class="cards">
        @foreach ($users as $user)
            <article class="card">
                <div class="card-header"><div class="user-heading"><div class="avatar">@if ($user->avatar)<img src="{{ asset('storage/'.$user->avatar) }}" alt="Avatar for {{ $user->full_name }}">@else<span>{{ strtoupper(substr($user->full_name, 0, 1)) }}</span>@endif</div><div><h3><a href="{{ route('users.show', $user) }}">{{ $user->full_name }}</a></h3><div class="record-id">{{ '@'.$user->username }}</div></div></div><a class="text-action" href="{{ route('users.edit', $user) }}">Edit</a></div>
                <dl class="details"><div><dt>Username</dt><dd>{{ $user->username }}</dd></div><div><dt>Email</dt><dd>{{ $user->email }}</dd></div></dl>
                <form method="POST" action="{{ route('users.destroy', $user) }}" class="form-actions">@csrf @method('DELETE')<button class="delete-action" type="submit">Delete</button></form>
            </article>
        @endforeach
    </div>
@endsection
