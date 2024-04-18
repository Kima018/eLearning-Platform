<?php

namespace App\Http\Controllers;

use App\Models\Lectures;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function saveNewLecture(Request $request):RedirectResponse
    {
        $request->validate([
            'lecture_name'=>'required|string|max:100',
            'lecture_description'=>'required|string',
            'lecture_link'=>'required|string'
        ]);

        Lectures::create([
            'name'=>$request->get('lecture_name'),
            'description'=>$request->get('lecture_name'),
            'lecture_link'=>$request->get('lecture_name'),
            'user_id'=> Auth::id(),
        ]);

        return redirect()->back();
    }

}
