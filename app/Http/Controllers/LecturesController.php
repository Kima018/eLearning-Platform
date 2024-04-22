<?php

namespace App\Http\Controllers;

use App\Models\Lectures;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Intervention\Image\ImageManager;

class LecturesController extends Controller
{
//    protected function deleteCurrentImage($id)
//    {
//        $currImageName = Lectures::where(['id' => $id])->get('thumbnail_image');
//        Storage::delete("/storage/videoThumbnails/" . $currImageName);
//    }

    public function addNewLecture(): View
    {
        return view('admin.add-lecture');
    }

    public function allLectures(): View
    {
        $allLectures = Lectures::paginate(20);
        return view('all-lectures', compact('allLectures'));
    }

    public function saveNewLecture(Request $request): RedirectResponse
    {

        $request->validate([
            'lecture_name' => 'required|string|max:100',
            'lecture_description' => 'required|string',
            'lecture_link' => 'required|string',
            'image' => 'file|max:2048|mimes:jpg,jpeg,png,webp',
        ]);

        $file = $request->file('image');
        $fileName = rand(0, 100) . time();
//        Storage::putFileAs('public/videoThumbnails/', $file, $fileName);
        $path = Storage::disk('public')->path('videoThumbnails') . "/$fileName.webp";
        ImageManager::gd()->read($file)->save($path);

        Lectures::create([
            'name' => $request->get('lecture_name'),
            'description' => $request->get('lecture_description'),
            'lecture_link' => $request->get('lecture_link'),
            'thumbnail_image' => $fileName . '.webp',
            'user_id' => Auth::id(),
        ]);

        return redirect()->back();
    }

    public function editLectures(): View
    {
        $allLectures = Lectures::all();
        return view('admin.edit-lectures', compact('allLectures'));
    }

    public function deleteLecture(Request $request):RedirectResponse
    {
        Lectures::where(['id' => $request->get('lecture_id')])->delete();
        return redirect()->route('lecture.edit');
    }

    public function singleLecture(Lectures $lecture):View
    {
        return view('admin.single-lecture-edit', compact('lecture'));
    }

    public function updateLecture(Request $request):RedirectResponse
    {
        $request->validate([
            'lecture_name' => 'required|string|max:100',
            'lecture_description' => 'required|string',
            'lecture_link' => 'required|string',
            'image' => 'file|max:2048|mimes:jpg,jpeg,png,webp',
        ]);

        $lecture = Lectures::where(['id' => $request->get('lecture_id')])->first();

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $fileName = rand(0, 100) . time();
            $path = Storage::disk('public')->path('videoThumbnails') . "/$fileName.webp";
            ImageManager::gd()->read($file)->save($path);

            $oldImageName = Lectures::where(['id' => $request->get('lecture_id')])->value('thumbnail_image');
            if (Storage::exists("/public/videoThumbnails/" . $oldImageName)) {
                Storage::delete("/public/videoThumbnails/" . $oldImageName);
            }
            $lecture->update([
                'thumbnail_image' => $fileName . '.webp',
            ]);
        }

        $lecture->update([
            'name' => $request->get('lecture_name'),
            'description' => $request->get('lecture_description'),
            'lecture_link' => $request->get('lecture_link'),
        ]);

        return redirect()->route('lecture.edit');

    }

    public function watchSingleLecture(Lectures $lecture):View
    {
        return view('watch-single-lecture',compact('lecture'));
    }

}


/*
 * Zasto u falidaciju mi ne pusta => 'image|'
 *
 * Da pojasnimo malo path za public/ Storage
 */
