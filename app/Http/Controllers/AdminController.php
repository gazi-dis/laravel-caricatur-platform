<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Setting;
use App\Post;
use Auth;
use Cache;
use Redirect;
use Session;
use Validator;



class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard')
            ->with('posts_count', Post::all()->count())
            ->with('users_count', User::all()->count());
    }

    public function profilIndex()
    {
        $user = Auth::user();
        return view('admin.profil')
        ->with('user',$user);
    }

    public function profileUpdate()
    {
        $model = new \App\User();
        return $model->profileUpdate(request()->all());
    }

    public function settingsIndex()
    {
        return view('admin.settings');
    }

    public function settingsUpdate()
    {
        $model = new \App\Setting();
        return $model->settingUpdate(request()->all());
    }

    public function postsIndex()
    {
        return view('admin.posts')->with('posts', Post::orderBy('id', 'DESC')->get());
    }

    public function addPost()
    {
        $inp  = request()->all();
        $validator = Validator::make($inp, [ // <---
            'baslik' => 'required',
            'resim' => 'required|image',
        ]);
        if($validator->fails()){
            $message = 'Lütfen eksik alan bırakmayın.';
            return response()->json([
                'msg' => $message
            ],422);
        }else{
            $featured = request()->file('resim');
            $featuerd_new = time().$featured->getClientoriginalName();
            $featured->move('uploads/posts', $featuerd_new);

            $post = Post::create([
                    'title' => $inp['baslik'],
                    'slug'=> \Str::slug($inp['baslik']),
                    'featured' =>   'uploads/posts/'. $featuerd_new,
                    'user_id'=>Auth::id()
            ]);
            $message = 'İçerik başarılı bir şekilde eklendi.';
            return response()->json([
                'msg' => $message,
                'title' => $inp['baslik'],
                'src' => 'uploads/posts/'. $featuerd_new,
            ],200);
        }
    }

    public function deletePost($id)
    {
        if (is_null($id)) {
            $message = 'İçerik silinemedi.';
            return response()->json([
                'msg' => $message
            ],422);
        } else {
            DB::table('posts')->where('id', $id)->delete();
            Cache::flush();
            $message = 'İçerik başarılı bir şekilde silindi.';
            return response()->json([
                'msg' => $message
            ],200);
        }
    }

    public function updatePostIndex($id)
    {
        $post = Post::find($id);
        return view('admin.post-update')->with('post',$post);
    }

    public function updatePost($id)
    {
        if (is_null($id)) {
            $message = 'İçerik bulunamadı.';
            return response()->json([
                'msg' => $message
            ],422);
        }else{
            $inp  = request()->all();
            $validator = Validator::make($inp, [ // <---
                'baslik' => 'required',
            ]);
            if($validator->fails()){
                $message = 'Lütfen eksik alan bırakmayın.';
                return response()->json([
                    'msg' => $message
                ],422);
            }else{
                $post = Post::find($id);
                if (isset($inp['resim'])) {
                    $featured = request()->file('resim');
                    $featuerd_new = time().$featured->getClientoriginalName();
                    $featured->move('uploads/posts', $featuerd_new);
                    $post->featured = 'uploads/posts/'. $featuerd_new;
                }
                $post->title = $inp['baslik'];
                $post->slug = \Str::slug($inp['baslik']);
                $post->user_id = Auth::id();
                $post->save();
                $message = 'İçerik başarılı bir şekilde güncellendi.';
                return response()->json([
                    'msg' => $message,
                ],200);
            }
        }
    }

}
