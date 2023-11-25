<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Index;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;


class IndexController extends Controller
{
    public function new(){
        return view("welcome");
    }

    public function store(Request $request, Index $data)
    {
        $data->email = $request->email;
        $data->username = $request->username;        
        $data->save();
    
        $mess = [
            'subject' => 'Welcome user',
            'body' => 'All users are welcomed',
        ];
    
        try {
            Mail::to($request->email)->send(new WelcomeMail($mess));
            return response()->json('Check your email box');
        } catch (\Exception $e) {
            return response()->json('Sorry, something went wrong');
        }
    }
    
}
