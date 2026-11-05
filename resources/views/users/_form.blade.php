@if ($errors->any())
    <div class="alert alert-error"><strong>Please correct the highlighted fields.</strong><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
@endif
<form class="record-form" method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @if ($method)<input type="hidden" name="_method" value="{{ $method }}">@endif
    <div class="form-grid">
        <label>Username<input name="username" value="{{ old('username', $user->username ?? '') }}" required>@error('username')<span class="field-error">{{ $message }}</span>@enderror</label>
        <label>Full name<input name="full_name" value="{{ old('full_name', $user->full_name ?? '') }}" required>@error('full_name')<span class="field-error">{{ $message }}</span>@enderror</label>
        <label class="full-width">Avatar <span class="muted">JPG, JPEG or PNG up to 2 MB</span><input type="file" name="avatar" accept=".jpg,.jpeg,.png,image/jpeg,image/png">@error('avatar')<span class="field-error">{{ $message }}</span>@enderror</label>
    </div>
    <div class="form-actions"><button class="button" type="submit">{{ $submitLabel }}</button><a class="button secondary" href="{{ route('users.index') }}">Cancel</a></div>
</form>
