<?php

namespace App\Http\Controllers;

use App\Helpers\Layouts;
use Illuminate\Http\Request;

class RapiController extends Controller
{
    public function index(){
        $data['seo'] = (object)[
            'title'=> 'API Hub - Public Rest APIs',
            'description'=> 'Browse Public Rest APIs in the Velixs API API Hub - API directory. Register today Free!'
        ];
        return Layouts::view('rapi.index',$data);
    }

}
