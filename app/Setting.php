<?php

namespace App;

use App\Http\Controllers\Redirect;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Session;
use \Cache;

class Setting extends Model
{
    protected $table = "settings";
    public $primaryKey = "id";
    public $timestamps = false;

    protected $fillable = [
        "option",
        "slug",
        "value",
    ];

    public function settingUpdate()
    {
        $inp = request()->all();
        if (isset($inp['favicon'])) {
            $favicon_image = request()->file('favicon');
            $favicon_name = 'favicon_'.$favicon_image->getClientoriginalName();
            $favicon_image->move('uploads/favicon',$favicon_name);
        } else {
            $favicon_name = config('settings.favicon');
        }
        if (isset($inp['logo'])) {
            $logo_image = request()->file('logo');
            $logo_name = 'logo_'.$logo_image->getClientoriginalName();
            $logo_image->move('uploads/logo',$logo_name);
        } else {
            $logo_name = config('settings.logo');
        }
        $settings = array(
            [
                'name' => 'title',
                'value' => isset($inp['title']) ? $inp['title'] : '',
            ],
            [
                'name' => 'face-link',
                'value' => isset($inp['face-link']) ? $inp['face-link'] : '#',
            ],
            [
                'name' => 'ig-link',
                'value' => isset($inp['ig-link']) ? $inp['ig-link'] : '#',
            ],
            [
                'name' => 'twitter-link',
                'value' => isset($inp['twitter-link']) ? $inp['twitter-link'] : '#',
            ],
            [
                'name' => 'email',
                'value' => isset($inp['email']) ? $inp['email'] : '',
            ],
            [
                'name' => 'phone',
                'value' => isset($inp['phone']) ? $inp['phone'] : '',
            ],
            [
                'name' => 'adress',
                'value' => isset($inp['adress']) ? $inp['adress'] : '',
            ],
            [
                'name' => 'contact-info',
                'value' => isset($inp['contact-info']) ? $inp['contact-info'] : '',
            ],
            [
                'name' => 'favicon',
                'value' => $favicon_name,
            ],
            [
                'name' => 'logo',
                'value' => $logo_name,
            ],
        );
        foreach ($settings as $setting) {
            DB::table('settings')
                ->where('slug', $setting['name'])
                ->update(['value' => $setting['value']]);
        }
        \Cache::forget('settings');
        $message = 'Ayarlar başarılı bir şekilde güncellendi.';
        return response()->json([
            'msg' => $message
        ],200);
    }

}
