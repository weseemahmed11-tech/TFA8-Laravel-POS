@extends('layouts.app')

@section('content')
<section class="page-intro"><div class="eyebrow">Customer accounts</div><h1>{{ $customer->full_name }}.</h1><p>Customer account details.</p></section>
<div class="form-card">
    <dl class="details"><div><dt>Email</dt><dd>{{ $customer->email }}</dd></div><div><dt>Phone</dt><dd>{{ $customer->phone }}</dd></div></dl>
    <div class="form-actions"><a class="button" href="{{ route('customers.edit', $customer) }}">Edit customer</a><a class="button secondary" href="{{ route('customers.index') }}">Back to customers</a></div>
</div>
@endsection
