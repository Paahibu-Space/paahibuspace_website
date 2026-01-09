<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        
        // Check if already subscribed
        if (Newsletter::where('email', $request->email)->exists()) {
             return response()->json([
                'success' => true, // Return true so frontend shows success message (or change to false if you want error UI)
                'message' => 'You are already subscribed to our newsletter.'
            ], 200);
        }

        Newsletter::create([
            'email' => $request->email,
            'verified' => 1,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Subscribed successfully.'
        ], 201);
    }
}
