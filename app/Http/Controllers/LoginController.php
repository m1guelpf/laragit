<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use SocialNorm\Exceptions\ApplicationRejectedException;
use SocialNorm\Exceptions\InvalidAuthorizationCodeException;
use Auth;
use SocialAuth;

class LoginController extends Controller
{
    public function authorizeUser(){
      return SocialAuth::authorize('github');
    }


    public function loginUser(Request $request){
      try {
        SocialAuth::login('github', function ($user, $details) {
            $user->email = $details->email;
            $user->name = $details->full_name;
            $user->token = $details->access_token;
            $user->save();
        });
    } catch (ApplicationRejectedException $e) {
        return redirect('login');
    } catch (InvalidAuthorizationCodeException $e) {
        return redirect('login');
    }

    // Current user is now available via Auth facade
    $user = Auth::user();

    return Redirect::intended();
}
}
