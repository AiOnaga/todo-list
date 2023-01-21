<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\UserProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user(); 
        
        // $profile = $user->profile()
        //     ->where('id', $profileId)
        //     ->first();

        $profile = $user->profile;
        // dd($profile);

        return view('profile.index')
            ->with('profile', $profile);

    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // プロフィール画像取得する

        return view('profile.edit', [
            'user' => $request->user(),
            'profile' => $request->user()->profile
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        //画像の保存の処理
        $dir = 'plofile';
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/' . $dir, $file_name);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');


    }

    //

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
