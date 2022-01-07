<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;
use Session;
use Hash;
use Validator;
use Redirect;
use Image;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profileUpdate()
    {
        $inp = request()->all();
        $user = Auth::user();
        if(!isset($inp['yeniParola'])){
            $validator = Validator::make($inp, [ // <---
                'isim' =>   'required|max:100',
                'eskiParola' =>   'required|max:100'
            ]);
            if($validator->fails()){
                $message = 'Lütfen eksik alan bırakmayın.';
                return response()->json([
                    'msg' => $message
                ],422);
            }else{
                if(!password_verify($inp['eskiParola'], $user->password)){
                    $message = 'Eski parolanızı yanlış girdiniz.';
                    return response()->json([
                        'msg' => $message
                    ],422);
                }else{
                    $hashed = \Hash::make($inp['eskiParola']);
                    $user->name = $inp['isim'];
                    $user->email = $inp['eposta'];
                    $user->password = $hashed;
                    $user->save();
                    $message = 'Profil başarılı bir şekilde güncellendi.';
                    return response()->json([
                        'msg' => $message
                    ],200);
                }
            }
        }else{
            $validator = Validator::make($inp, [ // <---
                'isim' =>   'required|max:100',
                'eposta' =>   'required|max:100',
                'eskiParola' =>   'required|max:100',
                'yeniParola' =>   'required|max:100|different:eskiParola'
            ]);
            if($validator->fails()){
                $message = 'Lütfen eksik alan bırakmayın.';
                return response()->json([
                    'msg' => $message
                ],422);
            }else{
                if(!password_verify($inp['eskiParola'], $user->password)){
                    $message = 'Eski parolanızı yanlış girdiniz.';
                    return response()->json([
                        'msg' => $message
                    ],422);
                }else{
                    $hashed = \Hash::make($inp['yeniParola']);
                    $user->name = $inp['isim'];
                    $user->email = $inp['eposta'];
                    $user->password = $hashed;
                    $user->save();
                    $message = 'Profil başarılı bir şekilde güncellendi.';
                    return response()->json([
                        'msg' => $message
                    ],200);
                }
            }
        }
    }
}
