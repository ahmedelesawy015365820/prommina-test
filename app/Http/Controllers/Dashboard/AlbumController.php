<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AlbumRequest;
use App\Models\Album;
use App\Repository\Album\AlbumInterfaceRepository;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    protected $album;

    function __construct(AlbumInterfaceRepository $album){

        $this->album = $album;

    }

    public function index(Request $request)
    {
        return $this->album->index($request);
    }

    public function create()
    {
        return $this->album->create();
    }

    public function store(AlbumRequest $request)
    {
        return $this->album->store($request);
    }

    public function edit(Album $album)
    {
        return $this->album->edit($album);
    }


    public function update(AlbumRequest $request, Album $album)
    {
        return $this->album->update($request,$album);
    }


    public function destroy(Album $album)
    {
        return $this->album->destroy($album);
    }

    //  remove more than images
    public function remove_images(Request $request)
    {
        return $this->album->remove_images($request);
    }

    public function searchAlbum(Request $request)
    {
        return $this->album->searchAlbum($request);
    }// search in albums

    public function transferAlbum(Request $request)
    {
        return $this->album->transferAlbum($request);
    }// search in albums

}
