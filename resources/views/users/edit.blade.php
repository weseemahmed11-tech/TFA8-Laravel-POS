@extends('layouts.app')
@section('content')
<section class="page-intro"><div class="eyebrow">Store users</div><h1>Edit user.</h1><p>Update the account details for {{ $user->full_name }}.</p></section>
<div class="form-card">@include('users._form', ['action' => route('users.update', $user), 'method' => 'PUT', 'submitLabel' => 'Save changes'])</div>
@endsection
