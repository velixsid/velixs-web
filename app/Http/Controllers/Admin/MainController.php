<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Layouts;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\OwnedLicense;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $data['count_product'] = $this->formatShort(Product::count());
        $data['count_blog'] = $this->formatShort(Blog::count());
        $data['count_purchases'] = $this->formatShort(OwnedLicense::count());
        $data['count_users'] = $this->formatShort(User::count());
        return Layouts::view('admin.main.index',$data);
    }

    function formatShort($number){
        $number = (int) $number;
        if($number < 1000){
            return $number;
        }else if($number < 1000000){
            return round($number/1000,1).'K';
        }else if($number < 1000000000){
            return round($number/1000000,1).'M';
        }else if($number < 1000000000000){
            return round($number/1000000000,1).'B';
        }else{
            return round($number/1000000000000,1).'T';
        }
    }
}
