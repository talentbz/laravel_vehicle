@extends('admin.layouts.index')

@section('css')
    <link src="https://plugins.krajee.com/assets/prod/all-krajee.min.css" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/admin/pages/company/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/toastr/toastr.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.min.css" rel="stylesheet" type="text/css">  
@endsection
@section('title')
    company create
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">会社情報</h4>
                <table class="table table-bordered table-striped table-nowrap mb-0">
                    <tr>
                        <th class="text-nowrap" scope="row">会社写真</th>
                        <td colspan="6">
                            <form id="imageForm" class="custom-validation" method="post" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <div class="file-loading">
                                        <input id="input-711" name="file" type="file" multiple>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                </table>
                <form id="myForm" class="custom-validation" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-nowrap mb-0">
                            <thead>
                            
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="text-nowrap" scope="row">所在地</th>
                                    <td colspan="6">
                                        <input parsley-type="location" type="text" name="name" class="form-control" required placeholder="Enter name" id="name"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap" scope="row">所在地</th>
                                    <td colspan="6">
                                        <input parsley-type="location" type="text" name="location" class="form-control" required placeholder="Enter location" id="location"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap" scope="row">電話番号</th>
                                    <td colspan="6">
                                        <input parsley-type="phone" type="text" name="phone" class="form-control" required placeholder="Enter phone number" id="phone"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap" scope="row">ホームページURL</th>
                                    <td colspan="6">
                                        <input parsley-type="url" type="url" name="site_url" class="form-control"  placeholder="URL" id="site_url"/>  
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap" scope="row">会社説明</th>
                                    <td colspan="6">
                                         <textarea id="elm1" name="description"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="company_save">
                        <input type="submit" class="btn btn-outline-primary waves-effect waves-light" value="セーブ" />
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
<script>
    var add_url = "{{ route('company.store') }}";
    var add_photo_url = "{{ route('company.photo_store') }}";
</script>
</div> <!-- end row -->
    @section('script')
    
    <script src="https://plugins.krajee.com/assets/prod/all-krajee.min.js"></script>
    <script src="https://plugins.krajee.com/assets/7cdef544/js/plugins/piexif.min.js" type="text/javascript"></script>
    <script src="https://plugins.krajee.com/assets/7cdef544/js/plugins/sortable.min.js" type="text/javascript"></script>

    <script src="{{ URL::asset('assets/js/pages/file-input.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>
    <!--tinymce js-->
    <script src="{{ URL::asset('assets/libs/tinymce/tinymce.min.js') }}"></script>
    <!-- init js -->
    <script src="{{ URL::asset('assets/js/pages/form-editor.init.js') }}"></script>
     <!-- toastr plugin -->
     <script src="{{ URL::asset('/assets/libs/toastr/toastr.min.js') }}"></script>
        <!-- toastr init -->
    <script src="{{ URL::asset('/assets/js/pages/toastr.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/admin/pages/company/create.js') }}"></script>
    @endsection
@endsection
