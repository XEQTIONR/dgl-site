<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmailAddress;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Gamer;
use App\GamerMeta;

use DB;

class VerificationController extends Controller
{
    //
    public function verifyEmail($code, Request $request)
    {
        $meta = GamerMeta::where('meta_key', 'email_verification_code')
                          ->where('meta_value', $code)->first();
        $gamer = $meta->gamer;
        $gamer->status = 'normal';
        $gamer->save();

        $meta->delete();

        $notification = "Email address verified. Well done!";
        $type = 'success';
        $request->session()->flash('notification', $notification);
        $request->session()->flash('notification_type', $type);
        return redirect('/');
    }

    public function resendVerificationEmail(Gamer $gamer)
    {

      $meta_value = uniqid();
      $now = Carbon::now()->toDateTimeString();
      DB::table('gamer_metas')
          ->where('gamer_id', $gamer->id)
          ->where('meta_key','email_verification_code')
          ->update(['meta_value' => $meta_value,
                    'updated_at' => $now]);

      $email = new VerifyEmailAddress($gamer->email, $meta_value);

      Mail::to($gamer->email)->send($email);

      return redirect('/settings');
    }
}
