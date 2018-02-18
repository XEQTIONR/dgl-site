<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Gamer;
use App\GamerMeta;

class VerificationController extends Controller
{
    //
    public function verifyEmail($code)
    {
        $meta = GamerMeta::where(['meta_key'=> 'email_verification_code'],
                                 ['meta_value'=> $code])->first();

        $gamer = $meta->gamer;
        $gamer->status = 'normal';
        $gamer->save();

        $meta->delete();

        echo "YOU HAVE BEEN VERIFIED";
    }
}
