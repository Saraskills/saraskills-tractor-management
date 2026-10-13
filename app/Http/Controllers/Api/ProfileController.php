<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Services\ApiResponseService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        return ApiResponseService::success('Profile retrieved successfully', [
            'user' => $request->user(),
        ]);
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = $request->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $user->profile_photo = $path;
        }

        $user->save();

        return ApiResponseService::success('Profile updated successfully', [
            'user' => $user,
        ]);
    }
}
