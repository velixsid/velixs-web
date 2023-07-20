<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Layouts;
use App\Http\Controllers\Controller;
use App\Models\Websettings;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    public function settings(){
        $ws = Websettings::find(1);
        return Layouts::view('admin.other.settings',[
            'socials' => $ws->_social_links(),
        ]);
    }


    public function settings_meta(Request $request){
        if(!$request->ajax()) return redirect()->route('admin.settings');

        $ws = Websettings::find(1);
        $ws->meta_title = $request->meta_title;
        $ws->meta_description = $request->meta_description;
        $ws->meta_keywords = $request->meta_keywords;
        $ws->meta_thumbnail = $request->meta_thumbnail;
        $ws->favicon = $request->favicon;
        $ws->logo = $request->logo;

        if($ws->save()){
            return response()->json([
                'status' => 'success',
                'message' => 'Meta settings updated successfully'
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Meta settings failed to update'
            ],500);
        }
    }

    public function settings_social(Request $request){
        if(!$request->ajax()) return redirect()->route('admin.settings');

        $ws = Websettings::find(1);

        $data = [];
        foreach($request->name as $index => $name){
            if(empty($name)) continue;
            if(empty($request->svg[$index])) continue;
            if(empty($request->url[$index])) continue;

            $data[] = array(
                'name' => $name,
                'svg' => $request->svg[$index],
                'url' => $request->url[$index],
            );
        }
        $ws->social_links = json_encode($data);
        $ws->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Social settings updated successfully',
        ]);
    }

    public function settings_contact(Request $request){
        if(!$request->ajax()) return redirect()->route('admin.settings');

        $ws = Websettings::find(1);
        $ws->payment_whatsapp = $request->payment_whatsapp;
        $ws->bot_whatsapp = $request->bot_whatsapp;
        $ws->contact_whatsapp = $request->contact_whatsapp;
        $ws->contact_email = $request->contact_email;
        $ws->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Contact settings updated successfully',
        ]);
    }
}
