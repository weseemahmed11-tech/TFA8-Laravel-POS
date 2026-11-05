@extends('layouts.app')
@section('content')
<section class="page-intro"><div class="eyebrow">Store users</div><h1>Add a team member.</h1><p>Create a new account for the store counter.</p></section>
<div class="form-card">@include('users._form', ['action' => route('users.store'), 'method' => null, 'submitLabel' => 'Create user'])</div>
@endsection
