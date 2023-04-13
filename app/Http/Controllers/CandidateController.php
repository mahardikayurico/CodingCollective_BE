<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidates = Candidate::all();
        return view('candidates.index', ['candidates' => $candidates]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('isSeniorHrd')) {
            abort(403, 'Anda tidak memiliki hak akses ');
        }
        return view('candidates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Gate::allows('isSeniorHrd')) {
            abort(403, 'Anda tidak memiliki hak akses ');
        }
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

        return redirect()->route('candidates.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        if (!Gate::allows('isSeniorHrd')) {
            abort(403, 'Anda tidak memiliki hak akses ');
        }
        $data = Candidate::findOrFail($candidate->id);
        return view('candidates.edit')->with([
            'data' => $data
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidate $candidate)
    {
        if (!Gate::allows('isSeniorHrd')) {
            abort(403, 'Anda tidak memiliki hak akses ');
        }
        $data = Candidate::findOrFail($candidate->id);
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

        // $request->session()->flash('status', 'Room has been updated !');
        return redirect()->route('candidates.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate, Request $request)
    {
        if (!Gate::allows('isSeniorHrd')) {
            abort(403, 'Anda tidak memiliki hak akses ');
        }
        $data = Candidate::findOrFail($candidate->id);
        $data->delete();

        // $request->session()->flash('statusDelete', 'Room has been deleted !');
        return redirect()->route('candidates.index');
    }
}
