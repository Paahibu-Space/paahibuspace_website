<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProgramResource;
use App\Models\Program;
use App\Models\ProgramRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::where('is_active', true)->get();
        return ProgramResource::collection($programs);
    }

    public function show($slug)
    {
        $program = Program::where('is_active', true)->where('slug', $slug)->firstOrFail();
        return new ProgramResource($program);
    }

    public function joinWaitlist(Request $request, $slug)
    {
        $program = Program::where('is_active', true)->where('slug', $slug)->firstOrFail();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'nullable|string|max:191',
            'location' => 'nullable|string|max:191',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        ProgramRegistration::create([
            'program_id' => $program->id,
            'program_name' => $program->name, // Storing name for easier export, although redundant
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'location' => $request->location,
            'notes' => $request->notes,
            'status' => 'pending',
        ]);

        return response()->json([
            'message' => 'You have been added to the waitlist successfully.',
            'success' => true
        ], 201)->header('Access-Control-Allow-Origin', '*')
              ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS')
              ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }
}
