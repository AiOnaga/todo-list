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
        $dir = 'profile';
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/' . $dir, $file_name);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');


    }

    //
    public function updateImage(Request $request)
    {
        $user = Auth::user();

        $dir = 'profile/';

        // dd('public/' . $dir);

        // リクエストのファイルと元のファイル名を取得する
        $file_name = $request->file('image')->getClientOriginalName();
        // ファイルを保存する(storage/app/XXX/YYY/ みたいな位置)
        $request->file('image')->storeAs('public/' . $dir, $file_name);
        // 配置したファイルのstorage/app/public以下のパスでDBに保存
        $user->profile()->update([
            'image_path' => 'storage/'. $dir. $file_name// 'storage/profie/画像名'
        ]);
        // エイリアス : public/storage のパスで読めるようにする
        // [配置場所]storage/app/public/n1194.png　→ [使う時]public/storage/n1194.pngで使えるようになる
        
        return redirect()->route('profile.edit', ['userId' => $user->id]);
    }

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
