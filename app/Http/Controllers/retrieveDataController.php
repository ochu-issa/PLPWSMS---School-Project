<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class retrieveDataController extends Controller
{
    //re

    public function Profile()
    {
        return view('profile');
    }

    public function Usermgt()
    {
        return view('usermgt');
    }

    // retrieve topic
    public function retrieveSubject()
    {
        return view('subject');
    }

    //retrieve topics
    public function retrieveTopic()
    {
        return view('topic');
    }

    //retrieve working 
    public function workingScheme()
    {
        return view('workingscheme');
    }
}

