<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{

    public function show(): UserResource
    {
        $user = User::with(['avatar'])->findOrFail(Auth::id());
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @throws AuthorizationException
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);
        $user->update($request->all());
        if ($request->has('checkedCategories')) {
           $user->categories()->sync($request->input('checkedCategories'));
        }
    }

    /**
     * Upload the user's avatar image.
     *
     * @param Request $request
     * @param Integer $id
     * @return JsonResponse
     * @throws ValidationException
     */
    public function uploadAvatar(Request $request, int $id): JsonResponse
    {
        if ($request->user()->id !== $id) {
            return response()->json(['error' => 'You can only change your own avatar'], 403);
        }

        $rules = [
            'avatar' => 'required|image',
        ];
        $this->validate($request, $rules);

        $img = Image::make($request->file('avatar'));
        $img->fit(300, null, function ($constraint) {
            $constraint->upsize();
        })->encode(null, 75);

        $path = 'avatars/' . $request->file('avatar')->hashName();
        Storage::disk('public')->put($path, $img);
        $oldAvatar = Auth::user()->avatar()->first();

        if($oldAvatar) {
            Storage::disk('public')->delete($oldAvatar->path);
            $oldAvatar->delete();
        }

        Auth::user()->avatar()->create([
            'path' => $path,
        ]);

        return response()->json('/storage/' . $path);
    }
}
