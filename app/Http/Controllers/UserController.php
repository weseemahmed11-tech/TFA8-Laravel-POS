<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Encoders\JpegEncoder;
use Intervention\Image\ImageManager;

class UserController extends Controller
{
    public function index(): View
    {
        return view('users.index', ['users' => User::all()]);
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function show(User $user): View
    {
        return view('users.show', compact('user'));
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $user = User::create(['username' => $validated['username'], 'full_name' => $validated['full_name'], 'name' => $validated['full_name'], 'email' => $validated['username'].'@example.com', 'password' => Hash::make(Str::random(32))]);
        $this->storeAvatar($user, $request->file('avatar'));

        return redirect()->route('users.index')->with('status', 'User account created.');
    }

    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $validated = $request->validated();
        $user->update(['username' => $validated['username'], 'full_name' => $validated['full_name'], 'name' => $validated['full_name']]);
        $this->storeAvatar($user, $request->file('avatar'));

        return redirect()->route('users.index')->with('status', 'User account updated.');
    }

    public function destroy(User $user): RedirectResponse
    {
        if ($user->avatar !== null) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->delete();

        return redirect()->route('users.index')->with('status', 'User account deleted.');
    }

    private function storeAvatar(User $user, ?UploadedFile $avatar): void
    {
        if ($avatar === null) {
            return;
        }
        $image = ImageManager::gd()->read($avatar->getRealPath())->cover(240, 240);
        $path = 'avatars/'.Str::uuid().'.jpg';
        Storage::disk('public')->put($path, $image->encode(new JpegEncoder(85))->toString());
        $user->update(['avatar' => $path]);
    }
}
