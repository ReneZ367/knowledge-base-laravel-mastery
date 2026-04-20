<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ideas = Idea::all();

        return view('ideas.index', [
            'ideas' => $ideas,
            'title' => 'Home'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ideas.create', [
            'title' => 'Home'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Idea::create([
            'description' => request('description'),
            'state' => 'pending'
        ]);

        return redirect(route('ideas.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        return view('ideas.show', [
            'idea' => $idea,
            'title' => 'Home'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        return view('ideas.edit', [
            'idea' => $idea,
            'title' => 'Home'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Idea $idea)
    {
        $idea->update([
            'description' => request('description'),
        ]);

        return redirect(route('ideas.show', $idea));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        $idea->delete();

        return redirect(route('ideas.index'));
    }
}
