@extends('layouts.adminLayout')

@section('title')
    Create  Album
@endsection

@section("style")
<link rel="stylesheet" href="{{ asset('assets/js/photo/css/fileinput.min.css') }}">
<style>
    .subcategory_id,.child_id,.subchild_id{
        display: none;
    }
</style>
@endsection

@section("content")
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3> Create  Album
                        <small>Bigdeal Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('album.index')}}">Album</a></li>
                    <li class="breadcrumb-item active">Create  Album</li>
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
            <h5>Add Album</h5>
        </div>
        <div class="card-body">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                    <form  method="POST" action="{{route('album.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form col-6">
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1">Name:</label>
                                    <input class="form-control name-ar" name="name" value="{{old('name')}}"  id="validationCustom01" type="text">
                                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="images" class="mb-1">Images:</label>
                                <input
                                    id="images"
                                    name="images[]"
                                    multiple
                                    type="file"
                                    accept="image/*"
                                >
                                @error('images')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary mt-3">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection

@section('js')
<!-- ckeditor js-->
<script src="{{ asset('assets/js/editor/ckeditor/ckeditor.js')}}"></script>
<script src="{{ asset('assets/js/editor/ckeditor/styles.js')}}"></script>
<script src="{{ asset('assets/js/editor/ckeditor/adapters/jquery.js')}}"></script>
<script src="{{ asset('assets/js/editor/ckeditor/ckeditor.custom.js')}}"></script>
<!-- photo -->
<script src="{{ asset('assets/js/photo/js/plugins/piexif.min.js')}}"></script>
<script src="{{ asset('assets/js/photo/js/plugins/sortable.min.js')}}"></script>
<script src="{{ asset('assets/js/photo/js/fileinput.min.js')}}"></script>
<script src="{{ asset('assets/js/photo/themes/fa/theme.min.js')}}"></script>

<script>
    $(function () {

        $('#feature').fileinput({
            theme: 'fa',
            maxFileCount: 1,
            allowedFileTypes: ['image'],
            allowedFileExtensions: ['jpg', 'png','jpeg','svg'],
            showCancel: true,
            showRemove: true,
            showUpload: false,
            initialPreviewAsData: true,
        });

        $('#images').fileinput({
            theme: 'fa',
            maxFileCount: 10,
            allowedFileTypes: ['image'],
            allowedFileExtensions: ['jpg', 'png','jpeg','svg'],
            showCancel: true,
            showRemove: true,
            showUpload: false,
            initialPreviewAsData: true,
        });

    });
</script>



@endsection
