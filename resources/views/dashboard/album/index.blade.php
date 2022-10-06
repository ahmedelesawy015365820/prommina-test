@extends('layouts.adminLayout')

@section('title')
    Album List
@endsection

@section("content")
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Album List
                        <small>Bigdeal Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">Album List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Albums Details</h5>
        </div>
        <div class="card-body">

            <div class="row justify-content-between">
                <div class="col-xl-6 col-md-4 row align-items-center">
                    <form class="form-inline" action="{{ route('album.index') }}" method="GET">
                        <div class="form-group mb-2">
                          <input type="text"
                            name="search"
                            class="form-control form-control"
                            value="{{ request()->search }}"
                            placeholder="search"
                          >
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <select name="status" class="form-control form-control">
                                <option value="">-Status-</option>
                                <option value="1" {{request()->status == 1 ? 'selected' : ''}}>Active</option>
                                <option value="0" {{request()->status == 0 ? 'selected' : ''}}>Inactive</option>
                            </select>
                          </div>
                        <button type="submit" class="btn btn-sm btn-primary mb-2">search</button>
                    </form>
                </div>
                <div class="col-xl-3 btn-popup pull-right">
                    <a href="{{route('album.create')}}" class="btn btn-secondary">Create Album</a>
                </div>
            </div>

            <div style="overflow-x: scroll; width:100%; margin-bottom:20px;">
                <table class="table">
                    <thead>
                      <tr>
                        <th class="wd-10p border-bottom-0">#</th>
                        <th class="wd-15p border-bottom-0">Name</th>
                        <th class="wd-15p border-bottom-0">Status</th>
                        <th class="wd-15p border-bottom-0">Image</th>
                        <th class="wd-10p border-bottom-0">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse ($albums as $key => $album)

                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $album->name }}</td>
                            <td>{{ $album->status() }}</td>
                            <td>
                                <img
                                src="{{asset('assets/upload/album/'.$album->firstMedia->file_name) }}"
                                onerror="src='{{ asset('assets/images/dashboard/man.png') }}'"
                                alt="profile"
                                class="img-thumbnail"
                                width="100px"
                                >
                            </td>
                            <td>

                                <a href="{{ route('album.edit', $album->id) }}"
                                    class="btn btn-sm btn-info"
                                    title="edit"
                                    >
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>

                                <button type="button"
                                        class="btn btn-sm btn-secondary"
                                        data-toggle="modal"
                                        data-original-title="test"
                                        data-target="#transform-{{$album->id}}"
                                >
                                    <i class="fa fa-ambulance" aria-hidden="true"></i>
                                </button>

                                <button type="button"
                                    class="btn btn-sm btn-danger"
                                    data-toggle="modal"
                                    data-original-title="test"
                                    data-target="#exampleModal-{{$album->id}}"
                                >
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>

                            </td>

                            {{-- start transform model --}}
                            <div class="modal fade" id="transform-{{$album->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title f-w-600" id="exampleModalLabel">Transfer Album</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('transferAlbum') }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group col-12">
                                                        <label for="validationCustom01" class="mb-1">Name :</label>
                                                        <input class="form-control" value="{{ $album->name }}"  readonly id="validationCustom01" type="text">
                                                        <input class="form-control" value="{{ $album->id }}" type="hidden" name="album_id">
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label for="exampleFormControlSelect1">Transfer Album</label>
                                                        <select class="form-control" id="id_transfer_{{ $album->id }}" name="id_transfer">
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label for="validationCustom01" class="mb-1">search :</label>
                                                        <input
                                                            data-album="{{ $album->id }}"
                                                            class="form-control search-transfer"
                                                            value=""
                                                            type="text"
                                                        >
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="submit">Transfer</button>
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end transform model --}}

                            {{-- start delete model --}}
                            <div class="modal fade" id="exampleModal-{{$album->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title f-w-600" id="exampleModalLabel">Delete User</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('album.destroy', $album->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <div class="form">
                                                    <div class="form-group">
                                                        <label for="validationCustom01" class="mb-1">Name :</label>
                                                        <input class="form-control" value="{{ $album->name }}"  readonly id="validationCustom01" type="text">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="submit">Delete</button>
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end delete model --}}

                        </tr>

                        @empty
                            <th class="text-center" colspan="8">No Data Found</th>
                        @endforelse
                    </tbody>
                  </table>
            </div>
            {{ $albums->appends( request()->query() )->onEachSide(1)->links() }}
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

@endsection

