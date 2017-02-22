<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Tweet;

class twitterController extends Controller
{
    public function index() {
    	// $tweets = DB::table('tweets')
    	// -> select('id', 'tweet')
    	// -> orderBy('id', 'desc')
    	// -> get();

        // with Eloquent:
        $tweets = Tweet::orderBy('id')->get();

    	return view('tweets.index', [
    		'tweets' => $tweets
    	]);
    }

    public function store(Request $request) {
    	$validation = Validator::make($request->all(), [
    		'tweet' => 'required|max:140'
    	]);

    	if($validation->passes()) {
	  //   	DB::table('tweets')-> insert([
			// 	'tweet' => request('tweet'),
			// ]);

            // with Eloquent:
            $tweet = new Tweet();
            $tweet->tweet = request('tweet');
            $tweet->save();

			return redirect('/')
				->with('successStatus', 'Tweet was created successfully!');
    	}
    	else {
    		return redirect('/')
            ->withInput() // to accommodate for old input
    		->withErrors($validation);
    	}
    }

    public function destroy($tweetID) {
    	// DB::table('tweets')
    	// ->where('id', '=', $tweetID)
    	// ->delete();

        // with Eloquent:
        $tweet = Tweet::find($tweetID);
        $tweet->delete();

    	return redirect('/')
    	->with('successStatus', 'Tweet was successfully deleted!');
    }

    public function view($tweetID) {
    	// $tweet = DB::table('tweets')
    	// ->select('id', 'tweet')
    	// ->where('id', '=', $tweetID)
    	// ->first();

        // with Eloquent:
        $tweet = Tweet::find($tweetID);
        return view('tweets.view', [
            'tweet' => $tweet
        ]);
    }

    public function edit($tweetID) {
        // $tweet = DB::table('tweets')
        // ->select('id', 'tweet')
        // ->where('id', '=', $tweetID)
        // ->first();

        // with Eloquent:
        $tweet = Tweet::find($tweetID);
        return view('tweets.edit', [
            'tweet' => $tweet
        ]);
    }

    public function update($tweetID) {
        // $tweet = DB::table('tweets')
        // ->select('id', 'tweet')
        // ->where('id', '=', $tweetID)
        // ->first();

        // with Eloquent:
        $validation = Validator::make([
            'tweet' => request('tweet')
                ],[
            'tweet' => 'required|max:140'
        ]);

        if($validation->passes()) {
            $tweet = Tweet::find($tweetID);
            $tweet->tweet = request('tweet');
            $tweet->save();
            return redirect('/')
            ->with('successStatus', 'Tweet was successfully edited!');
        }
        else {
            return redirect("/tweets/$tweetID/edit")
            ->withInput() // to accommodate for old input
            ->withErrors($validation);
        }
    }
}
