@extends('admin.layouts.index')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/admin/pages/bulletin/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/toastr/toastr.min.css') }}">
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/spectrum-colorpicker/spectrum-colorpicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/datepicker/datepicker.min.css') }}">
@endsection
@section('title')
    add bulletin
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">登掲示板</h4>
                <form id="myForm" class="custom-validation" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-nowrap mb-0">
                            <thead>
                                
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="table-light" >カテゴリー</td>
                                    <td >
                                        <input type="hidden" name='id' value="{{$bulletin->id}}" />
                                        <div class="templating-select">
                                            <select class="select2 form-control" name="category">
                                                @foreach($categories as $category)
                                                    <option value="{{$category}}" {{$bulletin->category==$category ? 'selected':''}}>{{$category}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-light" >〆切日時</td>
                                    <td >
                                        <input class="form-control" type="datetime-local" value="{{$bulletin->deadline_date}}" id="example-datetime-local-input" name="deadline" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-light" >タイトル</td>
                                    <td >
                                        <input parsley-type="title" type="text" name="title" value="{{$bulletin->title}}" class="form-control" required  placeholder="Enter title" id="title"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-light" >内容</td>
                                    <td >
                                        <textarea id="textarea" class="form-control" maxlength="225" rows="3"
                                        placeholder="This textarea has a limit of 225 chars." name="content" required>{{$bulletin->content}}</textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="bulletin_save">
                        <input type="submit" class="btn btn-outline-primary waves-effect waves-light" value="登録する" />
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<script>
    var add_url = "{{ route('bulletin.store') }}"
</script>
    @section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/spectrum-colorpicker/spectrum-colorpicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/datepicker/datepicker.min.js') }}"></script>

    <!-- form advanced init -->
    <script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js') }}"></script>
     <!-- toastr plugin -->
     <script src="{{ URL::asset('/assets/libs/toastr/toastr.min.js') }}"></script>
        <!-- toastr init -->
    <script src="{{ URL::asset('/assets/js/pages/toastr.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/admin/pages/bulletin/index.js') }}"></script>
    @endsection
@endsection
