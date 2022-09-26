<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiToken extends Model
{
    use HasFactory;

    const Mobile = 1;
    public static function mobileToken(){
        # code
        $token = ApiToken::findOrNew(ApiToken::Mobile);
        if (!$token->id){
            $token->id = ApiToken::Mobile;
            $token->name = 'MobilnaAplikacija';
            $token->token = base64_encode('otorinolaringologija');
            $token->save();
        }
        return $token;
    }
}
