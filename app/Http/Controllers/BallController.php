<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ball;

class BallController extends Controller
{
    // Show a list of all balls
    public function index()
    {
        $balls = Ball::all();
        return view('balls.index', compact('balls'));
    }

    // Store a newly created ball in the database
    public function store(Request $request)
    {
        // Validate the input
        $this->validate($request, [
            'color' => 'required|string|max:255',
            'size' => 'required|string|max:100',
        ]);

        Ball::create([
            'color' => $request->input('color'),
            'size' => $request->input('size'),
        ]);

        // Redirect to the list of balls
        return redirect()->route('balls.index')->with('success', 'Ball created successfully.');
    }

}
