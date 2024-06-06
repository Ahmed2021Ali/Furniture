<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\UpdateUser;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /* Get  user  has been Authenticated */
    public function getCurrentUser(Request $request)
    {
        $user = $request->user();
        return shoeMessage(null, $user,'UserResource', false);
    }

    /* Update  user */
    public function update(UpdateUser $request)
    {
        $user = $request->user();
        $user->update($request->validated());
        if ($request['images']) {
            updateImage($request['images'], $user, 'userImages');
        }
        return response()->json([ 'message' => 'User Update Successfully', 'user' => new UserResource($user)]);
    }

    /* Log out Account   */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'user logged out',]);
    }

    /* delete Account */
    public function delete(Request $request)
    {
        $request->user()->delete();
        return response()->json(['status' => true, 'message' => 'delete account successfully']);
    }
}
