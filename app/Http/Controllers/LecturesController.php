<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class LecturesController extends Controller
{
    public function addNewLecture():View
    {
        return view('admin.addLecture');
    }

    public function allLectures():View
    {
        return view('admin.allLectures');
    }

}
