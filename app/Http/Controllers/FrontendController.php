<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use App\Post;

class FrontendController extends Controller
{
    public function index()
    {
        $posts = Cache::get('bilgiler-posts', function () {
            return Post::orderBy('id', 'DESC')->limit(6)->get();
        });
        return view('frontend.homepage')
        ->with('posts', $posts);
    }
    
    public function contactIndex()
    {
        return view('frontend.contact');
    }

    public function loadmoredata(Request $request)
    {
        $output = '';
        $id = $request->id;
        $posts = Post::where('id','<',$id)->orderBy('id', 'desc')->limit(6)->get();
        if(!$posts->isEmpty())
        {
        $output .= '<section class="portfolio ">
        <div class="container">
        <div class="row shuffle-wrapper portfolio-gallery">';
        foreach($posts as $post)
        {
        $id = $post->id;
        $title = $post->title;
        $image = $post->featured;
        $output .= ' <div class="col-lg-4 col-6 mb-4 shuffle-item">
        <div class="position-relative inner-box">
            <div class="image position-relative ">
                <img src="'.$image.'"';
        $output .= 'alt="'.$title.'" class="img-fluid w-100 d-block">
                <a href="'.$image.'" data-lightbox="posts" data-title="'.$title.'">
                    <div class="overlay-box">
                        <div class="overlay-inner">
                            <div class="overlay-content">
                                <h5 class="mb-0">'.$title.'</h5>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        </div>';
        }
        $output .= ' </div>
        </div>
        </section>';
        $output .= '<div id="remove-row" class="text-center mb-5">
        <button id="btn-more"  class="btn btn-info text-center"  onclick="loadmoredata('.$id.')">Daha Fazla Yükle</button>
        </div>';
        return response()->json([
            'posts' => $output
        ],200);
        } else{
            return response()->json([
            ],422);
        }
    }
}
