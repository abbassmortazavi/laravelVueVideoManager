<?php


namespace App\Services;

use App\User;
use App\Mail\ActivationUserAccount;
use Illuminate\Support\Facades\Mail;

class AccountActivation
{
    private function generateToken()
    {
        return mt_rand().time();
    }

    public function handle($registreUser)
    {
        $user = User::find($registreUser->user->id);
        $user->activation_token = $this->generateToken();
        $user->save();

        Mail::to($user)->queue(new ActivationUserAccount($user));
    }
}