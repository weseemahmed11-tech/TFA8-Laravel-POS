@extends('layouts.app')

@section('content')
<section class="page-intro"><div class="eyebrow">Store users</div><h1>{{ $user->full_name }}.</h1><p>Store user account details.</p></section>
<div class="form-card">
    <dl class="details"><div><dt>Username</dt><dd>{{ $user->username }}</dd></div><div><dt>Email</dt><dd>{{ $user->email }}</dd></div></dl>
    <div class="form-actions"><a class="button" href="{{ route('users.edit', $user) }}">Edit user</a><a class="button secondary" href="{{ route('users.index') }}">Back to users</a></div>
</div>
@endsection
