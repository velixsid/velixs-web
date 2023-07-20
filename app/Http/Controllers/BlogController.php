<?php

namespace App\Http\Controllers;

use App\Helpers\Layouts;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $data['sort'] = request()->segment(3);
        $data['tags'] = request()->query('tags');
        $data['seo'] = (object)[
            'title' => 'Blog Articles',
            'description' => 'We provide some interesting aticles that you may find useful. Read on to fill your free time.',
        ];
        return Layouts::view('blog.index',$data);
    }

    public function show($slug) {
        $row = Blog::where('slug', $slug)->first();
        if(!$row) return abort(404, 'Content not found.');
        $data['row'] = $row;
        $row->recordView();
        $data['seo'] = (object)[
            'title' => $row->title,
            'description' => $row->meta_description,
            'image' => $row->_image(),
            'type' => 'article'
        ];
        return Layouts::view('blog.show',$data);
    }
}
