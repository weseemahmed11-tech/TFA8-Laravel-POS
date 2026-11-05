@if ($errors->any())
    <div class="alert alert-error"><strong>Please correct the highlighted fields.</strong><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
@endif
<form class="record-form" method="POST" action="{{ $action }}">
    @csrf
    @if ($method)<input type="hidden" name="_method" value="{{ $method }}">@endif
    <div class="form-grid">
        <label>Full name<input name="full_name" value="{{ old('full_name', $customer->full_name ?? '') }}" required>@error('full_name')<span class="field-error">{{ $message }}</span>@enderror</label>
        <label>Email<input type="email" name="email" value="{{ old('email', $customer->email ?? '') }}" required>@error('email')<span class="field-error">{{ $message }}</span>@enderror</label>
        <label>Phone <span class="muted">(optional)</span><input name="phone" value="{{ old('phone', $customer->phone ?? '') }}">@error('phone')<span class="field-error">{{ $message }}</span>@enderror</label>
    </div>
    <div class="form-actions"><button class="button" type="submit">{{ $submitLabel }}</button><a class="button secondary" href="{{ route('customers.index') }}">Cancel</a></div>
</form>
