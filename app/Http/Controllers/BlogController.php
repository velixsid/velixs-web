<?php

namespace App\Http\Controllers;

use App\Helpers\Layouts;
use App\Jobs\InsertVisitorBlogJob;
use App\Models\Blog;
use App\Models\BlogView;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use DispatchesJobs;
    public function index(){
        $data['sort'] = request()->segment(3);
        $data['tags'] = request()->query('tags');
        $data['seo'] = (object)[
            'title' => 'Blog Articles',
            'description' => 'We provide some interesting aticles that you may find useful. Read on to fill your free time.',
        ];
        return Layouts::view('blog.index',$data);
    }

    public function show(Request $request, $slug) {
        $row = Blog::where('slug', $slug)
            ->where('is_published', '!=', '0')
            ->first();
        if(!$row) return redirect()->route('blog')->with('bug', 'Article not found.');
        $data['row'] = $row;
        // hit visitor
        $user_id = auth()->check() ? auth()->id() : null;
        $ip = $request->ip();
        $visitor = null;
        if($user_id) {
            $visitor = BlogView::where('blog_id',$row->id)->where('user_id', $user_id);
        } else {
            $visitor = BlogView::where('blog_id',$row->id)->where('ip_address', $ip);
        }

        if(!$visitor->exists()){
            $this->dispatch(new InsertVisitorBlogJob([
                'ip_address' => $ip,
                'user_id' => $user_id,
                'blog_id' => $row->id,
            ]));
        }


        $data['seo'] = (object)[
            'title' => $row->title,
            'description' => $row->meta_description,
            'image' => $row->_image(),
            'type' => 'article'
        ];
        return Layouts::view('blog.show',$data);
    }
}
