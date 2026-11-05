@extends('layouts.app')
@section('content')
<section class="page-intro"><div class="eyebrow">Customer accounts</div><h1>Edit customer.</h1><p>Update the details for {{ $customer->full_name }}.</p></section>
<div class="form-card">@include('customers._form', ['action' => route('customers.update', $customer), 'method' => 'PUT', 'submitLabel' => 'Save changes'])</div>
@endsection
