<?php

namespace App\Repository\Album;


interface AlbumInterfaceRepository {

    public function index($request);

    public function create();

    public function store($request);

    public function edit($product);

    public function update($request, $product);

    public function destroy($request);

    public function remove_images($request);

    public function searchAlbum($request);

    public function transferAlbum($request);

}
