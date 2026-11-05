@extends('layouts.app')
@section('content')
<section class="page-intro"><div class="eyebrow">Customer accounts</div><h1>Add a customer.</h1><p>Create a new customer profile for the counter.</p></section>
<div class="form-card">@include('customers._form', ['action' => route('customers.store'), 'method' => null, 'submitLabel' => 'Create customer'])</div>
@endsection
