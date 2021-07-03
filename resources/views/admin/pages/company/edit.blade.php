@extends('admin.layouts.index')

@section('css')
    <link src="https://plugins.krajee.com/assets/prod/all-krajee.min.css" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/admin/pages/company/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/toastr/toastr.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.min.css" rel="stylesheet" type="text/css">  
@endsection
@section('title')
    company edit
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">会社情報</h4>
                <form id="myForm" class="custom-validation" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-nowrap mb-0">
                            <thead>
                            
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="text-nowrap" scope="row">担当者</th>
                                    <td colspan="6">
                                        <input parsley-type="member" type="text" name="member" class="form-control" required value="{{$company->member}}" placeholder="Enter member name" id="member"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap" scope="row">所在地</th>
                                    <td colspan="6">
                                        <input parsley-type="location" type="text" name="location" class="form-control" required value="{{$users->location}}" placeholder="Enter location" id="location"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap" scope="row">電話番号</th>
                                    <td colspan="6">
                                        <input parsley-type="phone" type="text" name="phone" class="form-control" required value="{{$users->phone}}" placeholder="Enter phone number" id="phone"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap" scope="row">ホームページURL</th>
                                    <td colspan="6">
                                        <input parsley-type="url" type="url" name="site_url" class="form-control" value="{{$company->site_url}}" placeholder="URL" id="site_url"/>  
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap" scope="row">会社説明</th>
                                    <td colspan="6">
                                         <textarea id="textarea" name="description" class="form-control" maxlength="1000" rows="3"
                                        placeholder="This textarea has a limit of 1000 chars.">{{$company->description}}</textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="company_save">
                        <button class="btn btn-outline-primary waves-effect waves-light back">
                            <i class="fas fa-long-arrow-alt-left"></i>back
                        </button>

                        <button type="submit" class="btn btn-outline-primary waves-effect waves-light">
                        <i class="fas fa-save"></i> 保存</button>
                    </div>
                </form>
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
            </div>
        </div>
    </div> <!-- end col -->
<script>
    var add_url = "{{ route('company.store') }}";
    var add_photo_url = "{{ route('company.photo_store') }}";
    var remove_photo = "{{ route('company.photo_destroy') }}";
    var image_paths = @json($image_paths);
    var id_array = @json($id_array);
</script>
</div> <!-- end row -->
    @section('script')
    
    <script src="https://plugins.krajee.com/assets/prod/all-krajee.min.js"></script>
    <script src="https://plugins.krajee.com/assets/7cdef544/js/plugins/piexif.min.js" type="text/javascript"></script>
    <script src="https://plugins.krajee.com/assets/7cdef544/js/plugins/sortable.min.js" type="text/javascript"></script>

    <script src="{{ URL::asset('assets/js/pages/file-input.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/spectrum-colorpicker/spectrum-colorpicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/datepicker/datepicker.min.js') }}"></script>
    <!--tinymce js-->
    <script src="{{ URL::asset('assets/libs/tinymce/tinymce.min.js') }}"></script>
    <!-- init js -->
    <script src="{{ URL::asset('assets/js/pages/form-editor.init.js') }}"></script>
     <!-- toastr plugin -->
     <script src="{{ URL::asset('/assets/libs/toastr/toastr.min.js') }}"></script>
    <!-- toastr init -->
    <script src="{{ URL::asset('/assets/js/pages/toastr.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/admin/pages/company/index.js') }}"></script>
    @endsection
@endsection
