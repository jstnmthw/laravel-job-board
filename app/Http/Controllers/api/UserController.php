<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(['success' => 'User account updated']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        if ($request->user()->id !== $id) {
            return response()->json(['error' => 'You can only edit your own account'], 403);
        }
        User::query()->findOrFail($id)->update($request->all());
        return response()->json(['success' => 'User account updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id): Response
    {
        //
    }

    /**
     * Upload the user's avatar image.
     */
    public function uploadAvatar(Request $request, $id): JsonResponse
    {
        if ($request->user()->id !== (int) $id) {
            return response()->json(['error' => 'You can only change your own avatar'], 403);
        }
        $path = $request->file('avatar')->store('avatars');
        $oldAvatar = Auth::user()->avatar();
        $oldPath = $oldAvatar->first()->path;
        Storage::delete($oldPath);
        $oldAvatar->delete();
        Auth::user()->avatar()->create([
            'path' => $path,
        ]);
        return response()->json($path);
    }
}
