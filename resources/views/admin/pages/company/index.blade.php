@extends('admin.layouts.index')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/admin/pages/company/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/toastr/toastr.min.css') }}">
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('title')
    index bulletin
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">掲示板情報</h4>
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Company Name</th>
                                <th>Location</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($companie_infos as $key=>$companie_info)
                            <tr>
                                <td>{{$key+=1}}</td>
                                <td><a href="{!! route('company.details', ['id' => $companie_info->id]) !!}">{{$companie_info->name}}</a></td>
                                <td>{{$companie_info->location}}</td>
                                <td>{{$companie_info->email}}</td>
                                <td>{{$companie_info->phone}}</td>
                                <td>{!!$companie_info->description!!}</td>
                            </tr>
                            @empty
                            <tr>
                                <td align="center" colspan="5">There is no data</p>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<script>
    // var delete_url = "{{route('bulletin.destroy')}}"
</script>
    @section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
     <!-- toastr plugin -->
     <script src="{{ URL::asset('/assets/libs/toastr/toastr.min.js') }}"></script>
        <!-- toastr init -->
    <script src="{{ URL::asset('/assets/js/pages/toastr.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/admin/pages/company/index.js') }}"></script>
    @endsection
@endsection
