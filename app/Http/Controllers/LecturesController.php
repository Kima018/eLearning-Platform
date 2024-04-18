<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LecturesController extends Controller
{
    public function addNewLecture()
    {
        return view('admin.addLecture');
    }

}
