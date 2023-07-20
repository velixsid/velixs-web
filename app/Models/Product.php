<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    protected $casts = [
        'tags' => 'array',
        'price' => 'array',
        'release' => 'array',
    ];

    public function _route(){
        return route('product.detail', $this->slug);
    }

    public function _author()
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function _image()
    {
        return $this->image ? asset('storage/'.$this->image) : asset('storage/blogs/default.png');
    }

    public function _tags($col = null) {
        try {
            $tags_id = $this->tags;
            $tags = [];
            foreach ($tags_id as $tag_id) {
                $tag = ProductTags::find($tag_id);
                if ($tag) {
                    array_push($tags, $tag);
                }
            }
            if($col){
                $tags = collect($tags)->pluck($col);
            }
            return $tags;
        }catch (\Exception $e){
            return [];
        }
    }

    public function _hasWishlist($auth = null){
        if(!$auth) return null;
        return in_array($this->id, $auth->digital_product_wishlist);
    }

    public function _hasOwned($auth = null){
        if(!$auth) return null;
        return OwnedLicense::where([
            'user_id' => $auth->id,
            'item_id' => $this->id,
            'item' => 'digital-product'
        ])->exists();
    }

    public function _latestRelease(){
        $release = $this->release;
        if(!$release) return null;
        return isset($release['latest']) ? $release['latest'] : $release = null;
    }

    public function _archiveRelease(){
        $release = $this->release;
        if(!$release) return [];
        return isset($release['archive']) ? $release['archive'] : $release = [];
    }

    public function _display_price($currency = 'usd'){
        $price = $this->price;
        if($currency == 'idr') {
            if(isset($price['idr'])){
                if($price['idr'] == 0) return 'FREE';
                return 'Rp. '.number_format($price['idr'], 0, ',', '.');
            }
        }else if($currency == 'usd'){
            if(isset($price['usd'])){
                if($price['usd'] == 0) return 'FREE';
                return '$'.number_format($price['usd'], 2, ',', '.');
            }
        }
    }

    public function _price($currency){
        $price = $this->price;
        if($currency == 'idr') {
            if(isset($price['idr'])){
                return $price['idr'];
            }
        }else if($currency == 'usd'){
            if(isset($price['usd'])){
                return $price['usd'];
            }
        }
        return 0;
    }

    public function _isFree(){
        $price = $this->price;
        if(isset($price['idr'])){
            if($price['idr'] == 0) return true;
        }
        if(isset($price['usd'])){
            if($price['usd'] == 0) return true;
        }
        return false;
    }

    //
    public static function paidOnly(){
        return self::where("is_published", '!=', 0)
            ->whereJsonDoesntContain('price->usd', 0)
            ->whereJsonDoesntContain('price->idr', 0);
    }
}
