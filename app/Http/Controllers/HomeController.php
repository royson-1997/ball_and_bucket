<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bucket;
use App\Models\Ball;
use App\Models\Suggestion;

class HomeController extends Controller
{
    // Display the home page
    public function index()
    {
        $buckets = Bucket::all();
        $balls = Ball::all();
        return view('home', compact('buckets', 'balls'));
    }

    public function resultSuggestion()
    {

        $buckets = Bucket::all();
        $balls = Ball::all();

        foreach ($buckets as $bucket) {

            $bucket_id = $bucket->id;
            $bucketWiseSuggestion = Suggestion::select('ball_id', Suggestion::raw('COUNT(ball_id) as count'))
            ->where('bucket_id', $bucket_id)
            ->orderBy('id', 'asc')
            ->groupBy('ball_id')
            ->get();

        }

        $extraBallsMessage = "Ball(s) cannot be accommodated in any bucket";

        return view('suggestion-result', compact('bucketWiseSuggestion', 'extraBallsMessage'));
    }

    // Suggest buckets to accommodate balls
    public function suggestBuckets(Request $request)
    {
        // Validate the input
        $this->validate($request, [
            'pink_balls' => 'required|integer|min:0',
            'red_balls' => 'required|integer|min:0',
            'blue_balls' => 'required|integer|min:0',
            'orange_balls' => 'required|integer|min:0',
            'yellow_balls' => 'required|integer|min:0'
        ]);

        $inputBalls = [
            'PINK' => $request->input('pink_balls'),
            'RED' => $request->input('red_balls'),
            'BLUE' => $request->input('blue_balls'),
            'ORANGE' => $request->input('orange_balls'),
            'YELLOW' => $request->input('yellow_balls'),
        ];

        // Loop through each color of balls and create a suggestion entry for each ball
        foreach ($inputBalls as $color => $count) {
            $ball_id = $this->getBallID($color);
            if (isset($ball_id) && !empty($ball_id)){
                for ($i = 0; $i < $count; $i++) {
                    Suggestion::create([
                        'ball_id' => $ball_id
                    ]);
                }
            }
        }

        // Filter & Retrieve all the records with a null 'bucket_id'
        $suggestions = Suggestion::whereNull('bucket_id')
        ->orderBy('id', 'asc')
        ->get();
        $i = 0;
        
        if (isset($suggestions) && !empty($suggestions)){
            foreach ($suggestions as $suggest) {
                
                $suggestID = $suggest->id;
                $ballID = $suggest->ball_id;
                $ballData = Ball::find($ballID);
                $ballCapacity = $ballData->size;

                $buckets = Bucket::all();
                if ($buckets[$i]->empty_volume == 0) {
                    $i++;
                }
                // Check if the bucket's empty_volume is not 0
                if ($buckets[$i]->empty_volume > 0 && $buckets[$i]->empty_volume >= $ballCapacity) {
                    $empty_volume = $buckets[$i]->empty_volume - $ballCapacity;
                    Bucket::where('id', $buckets[$i]->id)->update(['empty_volume' => $empty_volume]);
                    Suggestion::where('id', $suggestID)->update(['bucket_id' => $buckets[$i]->id]);
                }
    
            }
        }

        return redirect()->route('result.data')->with('success', 'Suggestion created successfully.');
    }

    public function getBallID($color)
    {
        // Find the ball by color and return its ID
        $ball = Ball::where('color', $color)->first();

        // Check if the ball was found
        if ($ball) {
            return $ball->id;
        } else {
            // Ball not found, return null or handle the error as needed
            return null;
        }
    }

}
