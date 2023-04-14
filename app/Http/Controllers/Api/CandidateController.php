<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidates = Candidate::all();
        return response()->json($candidates, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $candidate = new Candidate();

        $candidate->name = $request->name;
        $candidate->education = $request->education;
        $candidate->birthday = $request->birthday;
        $candidate->experience = $request->experience;
        $candidate->last_position = $request->last_position;
        $candidate->applied_position = $request->applied_position;
        $candidate->top_5_skills = $request->top_5_skills;
        $candidate->email = $request->email;
        $candidate->phone = $request->phone;
        // $candidate->resume = $request->file('resume')->store('resumes');
        $candidate->save();
        return response()->json($candidate, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidate $candidate)
    {
        $data = Candidate::findOrFail($candidate->id);
        if ($data) {
            $data->name = $request->name;
            $data->education = $request->education;
            $data->birthday = $request->birthday;
            $data->experience = $request->experience;
            $data->last_position = $request->last_position;
            $data->applied_position = $request->applied_position;
            $data->top_5_skills = $request->top_5_skills;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->save();
            return response()->json($candidate, 201);
        } else {
            return response()->json([
                'status' => 'failure',
                'message' => 'data unknown!'
            ], 402);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        $data = Candidate::findOrFail($candidate->id);
        if ($data) {
            $data->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'data has been deleted!'
            ], 204);
        } else {
            return response()->json([
                'status' => 'failure',
                'message' => 'data unknown!'
            ], 402);
        }
    }
}
