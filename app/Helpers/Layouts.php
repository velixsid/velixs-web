<?php

namespace App\Helpers;

use App\Models\Blog;
use App\Models\OwnedLicense;
use App\Models\Websettings;

class Layouts
{
    public static function view($view, $data = [], $mergeData = []){
        $data['ws'] = Websettings::getWebsiteSettings();
        $data['auth'] = auth()->user();
        $data['recent_posts'] = Blog::RecentPosts();
        return view($view, $data, $mergeData);
    }

    public static function meta_title($title){
        return $title.' | Velixs';
    }


    public static function MakeLicense($for = 'digital-product'){
        if($for=='digital-product'){
            // like VELIXS-DIPG-0001-SD22-SW34-WDAA
            do{
                $license = 'VELIXS-DIPG-'.rand(1000,9999).'-'.strtoupper(substr(md5(rand(1000,9999)), 0, 4)).'-'.strtoupper(substr(md5(rand(1000,9999)), 0, 4)).'-'.strtoupper(substr(md5(rand(1000,9999)), 0, 4));
                $check = OwnedLicense::where([
                    'item' => 'digital-product',
                    'license_key' => $license,
                ]);
            }while($check->exists());
            return $license;
        }else{
            return false;
        }
    }
}
