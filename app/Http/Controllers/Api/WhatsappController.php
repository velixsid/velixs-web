<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class WhatsappController extends Controller
{
    public function resetPassword(Request $request){
        $request->validate([
            'whatsapp' => 'required'
        ]);

        $user = User::where('whatsapp', $request->whatsapp)->first();
        if(!$user) return response()->json(['message' => 'Whatsapp not registered in any account.' ], 404);

        // create token in table password_resets

        return response()->json([
            'message' => 'Reset password sent to your whatsapp.',
        ]);
    }
}
