<?php

namespace App\Helper;

use Illuminate\Support\Facades\File;

trait ImageHelper {

    // insert mult Image
    public function multImage($request,$item,$path){

        $i = $item->media()->count() + 1;

        foreach($request->images as $cover){

            $file_size = $cover->getSize();
            $file_type = $cover->getMimeType();
            $file_image = time(). $i . $cover->getClientOriginalName();

            // picture move
            $cover->storeAs($path, $file_image,'upload');

            $item->media()->create([
                'file_name' => $file_image ,
                'file_size' => $file_size,
                'file_type' => $file_type,
                'file_status' => true,
                'file_sort' => $i,
            ]);

            $i++;
        }
    }

    // delete mult Image
    public function multImageDelete($item,$path){
        foreach($item->media as $media){

            if(File::exists('assets/upload/'.$path.'/'.$media->file_name)){
                unlink('assets/upload/'.$path.'/'. $media->file_name);
            }

            $media->delete();

        }
    }

    //  transfer album
    public function transformAlbumImage($albums,$item){

        $i = $item->media()->count() + 1;

        foreach($albums as $cover){

            $item->media()->create([
                'file_name' => $cover['file_name'] ,
                'file_size' => $cover['file_size'],
                'file_type' => $cover['file_type'],
                'file_status' => true,
                'file_sort' => $i,
            ]);

            $i++;
        }
    }

}



