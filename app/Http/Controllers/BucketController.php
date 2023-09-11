<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bucket;
use App\Models\Suggestion;

class BucketController extends Controller
{
    // Show a list of all buckets
    public function index()
    {
        $buckets = Bucket::all();
        return view('buckets.index', compact('buckets'));
    }

    // Store a newly created bucket in the database
    public function store(Request $request)
    {
        // Validate the input
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
        ]);

        // Truncate the suggestion table
        Suggestion::truncate();

        Bucket::create([
            'name' => $request->input('name'),
            'capacity' => $request->input('capacity'),
            'empty_volume' => $request->input('capacity'),
        ]);

        // Get all the bucket records
        $buckets = Bucket::all();

        foreach ($buckets as $bucket) {
            // Update the 'empty_volume' with the 'capacity' for each bucket. This will rest the logic again.
            $bucket->update([
                'empty_volume' => $bucket->capacity,
            ]);
        }

        // Redirect to the list of buckets
        return redirect()->route('buckets.index')->with('success', 'Bucket created successfully.');
    }

}
