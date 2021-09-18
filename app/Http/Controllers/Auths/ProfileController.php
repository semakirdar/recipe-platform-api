<?php

namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateRequest;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update(UpdateRequest $request)
    {
        $profile = Profile::query()->where('user_id', auth()->user()->id)->first();

        $profile->update([
            'bio' => $request->bio,
            'website' => $request->website,
            'location' => $request->location
        ]);

        if ($request->has('avatar') && !empty($request->avatar)) {
            foreach ($profile->getMedia() as $media) {
                $media->delete();
            }
            $profile->addMediaFromRequest('avatar')->tomediaCollection();
        }

        return response()->json([
            'success' => true,
            'error' => 'Your profile updated'
        ]);
    }
}
