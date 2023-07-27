<?php

namespace App\Http\Controllers;

use App\Helpers\Layouts;
use App\Models\Blog;
use App\Models\License;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MainController extends Controller
{
    use DispatchesJobs;
    public function index(Request $request){
        $data['seo'] = (object)[
            'title'=> 'VELIXS',
        ];
        $data['blog_latest'] = Blog::orderBy('id', 'desc')->limit(3)->get();
        return Layouts::view('main/landing',$data);
    }

    public function sus(Request $request){
        if(!auth()->check()) return redirect()->route('main');
        if(!auth()->user()->suspended) return redirect()->route('main');
        return view('main.sus',[
            'message' => auth()->user()->suspended,
        ]);
    }

    public function contact(){
        return Layouts::view('main/contact',[
            'seo' => (object)[
                'title'=> 'Contact Us',
            ]
        ]);
    }

    public function search(Request $request) {
        $search = $request->get('q');
        $result = null;
        $result['for'] = 'lol';
        $result['result'] = null;
        $result['error'] = false;
        if($search){
            if(Str::startsWith($search, '#')){
                $result['for'] = 'license';
                if (RateLimiter::tooManyAttempts('search-license:'.$request->ip(), 5)) {
                    $result['error'] = '<span class="font-semibold" style="color:#f30c0cba">Spam detected</span>, please try again later.';
                }else{
                    $search = substr(str_replace(" ","",$search), 1);
                    if(strlen($search) >= 1){
                        RateLimiter::hit('search-license:'.$request->ip());
                        $getlicense = License::where('license_key', $search)->first();
                        if($getlicense){
                            $result['result'] = [
                                'url'=> route('dash.license', $getlicense->id),
                                'item'=> $getlicense->_item->title,
                            ];
                        } else {
                            $result['error'] = 'The license you entered does not match.';
                        }
                    } else {
                        $result['error'] = 'Example: #LICENSE-XXX-XXX-XXX-XXX';
                    }
                }
            } else {
                $result['for'] = 'search';
                $result['result'] = [];
                $product = Product::where('title', 'like', '%'.$search.'%')->limit(5)->get();
                foreach($product as $p){
                    $result['result'][] = [
                        'title' => $p->title,
                        'url' => route('product.detail', $p->slug),
                        'type' => 'item',
                    ];
                }
                $blog = Blog::where('title', 'like', '%'.$search.'%')->limit(5)->get();
                foreach($blog as $b){
                    $result['result'][] = [
                        'title' => $b->title,
                        'url' => route('blog.detail', $b->slug),
                        'type' => 'blog',
                    ];
                }
            }
        }
        return response()->json($result);
    }


    public function profile($username){
        $getuser = User::where('username', $username)->first();
        if(!$getuser) return redirect()->route('main')->with('info', 'User not found');
        return Layouts::view('main.profile',[
            'seo' => (object)[
                'title'=> $getuser->name,
                'description'=> '@username: '.$getuser->username. ' - '.$getuser->title_profile,
                'image'=> $getuser->_avatar(),
            ],
            'user' => $getuser,
        ]);
    }

    public function sitemap(){
        $xml = Storage::disk('public')->get('sitemap.xml');
        return response($xml, 200)->header('Content-Type', 'text/xml');
    }
}
