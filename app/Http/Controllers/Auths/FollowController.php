<?php

namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
use App\Http\Requests\Follows\FollowRequest;
use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function follow(FollowRequest $request)
    {

        $follow = Follow::query()->create([
            'user_id' => auth()->user()->id,
            'followed_id' => $request->followed_id
        ]);

        return response()->json([
            'success' => true,
            'error' => 'successfully followed'
        ]);
    }

    public function getFollowers()
    {
        $user = Follow::query()
            ->with(['followerUser'])
            ->where('followed_id', auth()->user()->id)->get();

      return  response()->json([
         'data' => $user
        ]);
    }
}
