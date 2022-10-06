<?php

namespace App\Repository\Album;

use App\Helper\ImageHelper;
use App\Models\Album;
use App\Repository\Album\AlbumInterfaceRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class AlbumRepository implements AlbumInterfaceRepository {

    use ImageHelper;

    public function index($request)
    {

        $albums = Album::
        with(['firstMedia:file_name,mediable_id'])
        ->when($request->search,function ($q) use ($request){
            return $q->where('name','like',"%". $request->search ."%");
        })->when($request->status,function ($e) use($request){
            return $e->whereStatus($request->status);
        })->paginate(10);

        return view('dashboard.album.index',compact('albums'));

    }//*****end index

    public function create(){

        return view('dashboard.album.create');

    }//*****end create

    public function store($request)
    {
        try{
            DB::beginTransaction();

            // insert database
            $album = Album::create($request->only('name'));

            // insert Image
            $this->multImage($request,$album,'album');

            toastr()->success('Successfully added');
            DB::commit();
            return redirect()->route('album.index');

        }
        catch(\Exception $ex){

            toastr()->error($ex);
            DB::rollBack();
            return redirect()->route('album.index');
        }

    }//*****end store

    public function edit($album)
    {
        $item = Album::with('media')->find($album->id);
        return view('dashboard.album.edit',['album' => $item]);

    }//*****end edit

    public function update($request, $album)
    {
        try{
            DB::beginTransaction();

            // update database
            $album->update($request->only(['name','status']));

            // update Image
            if($request->images && count($request->images) > 0){
                $this->multImage($request,$album,'album');
            }

            toastr()->success('Edited successfully');
            DB::commit();
            return redirect()->route('album.index');

        }
        catch(\Exception $ex){

            toastr()->error($ex);
            DB::rollBack();
            return redirect()->route('album.index');
        }

    }//*****end update

    public function destroy($album)
    {
        try{

            DB::beginTransaction();

            if($album->media()->count() > 0){
                $this->multImageDelete($album,'album');
            }

            $album->delete();

            toastr()->success('Deleted successfully');
            DB::commit();
            return redirect()->route('album.index');

        }
        catch( \Exception $ex){

            toastr()->error($ex);
            DB::rollBack();
            return redirect()->route('album.index');
        }
    }//*****end destroy

    public function remove_images($request)
    {

        $album = Album::findOrFail($request->album_id);
        $image = $album->media()->whereId($request->image_id)->first();

        if(File::exists('assets/upload/album/'.$image->file_name)){
            unlink('assets/upload/album/'. $image->file_name);
        }

        $image->delete();

        return true;
    }// multDelete

    public function searchAlbum($request)
    {

        $albums = Album::select('id','name')
            ->where('id','!=',$request->album_id)
            ->where('name','like',"%". $request->search ."%")
            ->limit(10)
            ->get();

        return response()->json(['albums' => $albums]);

    }//*****end search album

    public function transferAlbum($request)
    {
        try{
            DB::beginTransaction();

            $album_id = Album::find($request->album_id);
            $transfer_id = Album::find($request->id_transfer);

            if($album_id && $transfer_id){

                if($album_id->media()->count() > 0){
                    // insert Image
                    $this->transformAlbumImage($album_id->media,$transfer_id,'album');
                }

                if($album_id->media()->count() > 0){
                    $this->multImageDelete($album_id,'album');
                }

                $album_id->delete();

                toastr()->success('Successfully added');
                DB::commit();
                return redirect()->route('album.index');
            }else{
                toastr()->error('There is an error in the album');
                return redirect()->route('album.index');
            }
        }
        catch(\Exception $ex){

            toastr()->error($ex);
            DB::rollBack();
            return redirect()->route('album.index');
        }
    }//*****end index

}
