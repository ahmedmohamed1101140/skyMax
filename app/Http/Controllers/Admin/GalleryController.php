<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    //

    public function addMedia($id){
        return view('admin.products.albums.create')->with('gallery_id',$id);


    }


    public function postMedia(Request $request){

        dd($request->all());
        $productId = $request->input('gallery_id');

        // images uploads to gallery
        if($request->hasFile('file')){
            $dir = public_path().'/images/product/';

            // check if gallery exist or not
            if($request->hasFile('file') ){
                $files = $request->file('file');

                // looping on uploaded images
                foreach ($files as $file) {
                    $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
                    $file->move($dir , $fileName);
                    $image = new Gallery();
                    $image->prod_id =  $productId;
                    $image->image = $fileName ;
                    $image->type = '0' ;
                    $image->view = '1';
                    $image->save();
                }
            }
            // video uploads to gallery
        }elseif(isset($request->video_url)){
            $video = new Gallery();
            $video->prod_id = $productId;
            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $request->video_url, $match);
            $video->image = $match[1] ;
            $video->type = '1' ;
            $video->save() ;
            return response()->json(['success'=>"Video Add successfully."]);

        }

    }



    public function showAlbum($id){

        dd('sss');
        $media = Gallery::where('prod_id','=',$id)->get();

        return view('admin.products.albums.show')->withMedia($media);


    }

    public function delete($id){

        dd(decrypt($id));

        Media::destroy(decrypt($id));

        return redirect()->back();
    }
}
