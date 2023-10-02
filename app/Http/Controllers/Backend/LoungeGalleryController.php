<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\LoungeGalleryDataTable;
use App\Http\Controllers\Controller;
use App\Models\LoungeGallery;
use App\Models\Lounges;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class LoungeGalleryController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, LoungeGalleryDataTable $dataTable)
    {
        $lounge = Lounges::findOrFail($request->lounge);
        return $dataTable->render('backend.lounges.image_gallery.index', compact('lounge'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image.*' => ['required', 'image', 'max:4192']
        ]);

        // handle image uploads
        $imagePaths = $this->uploadMulImage($request, 'image', 'uploads');
        if ($imagePaths == null) {
            $notification = array(
                'message' => 'You Should Select Images!!',
                'alert-type' => 'error',
            );

            return redirect()->back()->with($notification);
        } else {
            foreach ($imagePaths as $path) {
                $loungeImageGallery = new LoungeGallery();
                $loungeImageGallery->image = $path;
                $loungeImageGallery->lounge_id = $request->lounge;
                $loungeImageGallery->save();
            }

            $notification = array(
                'message' => 'Images Uploaded Successfully!!',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $LoungeImage = LoungeGallery::findOrFail($id);
        $this->deleteImage($LoungeImage->image);
        $LoungeImage->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
