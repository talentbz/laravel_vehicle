@extends('admin.layouts.index')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/admin/pages/bulletin/style.css') }}">
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
                <div class="lnb-new-schedule float-sm-end ms-sm-3 mt-4 mt-sm-0">
                    <a href="{{route('bulletin.add')}}" class="btn btn-outline-primary waves-effect waves-light" >Add New</a>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;?>
                            @forelse ($bulletins as $bulletin)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$bulletin->deadline_date}}</td>
                                <td>{{$bulletin->category}}</td>
                                <td>{{$bulletin->title}}</td>
                                <td>{{$bulletin->content}}</td>
                                <td>
                                    <div class="d-flex gap-3">
                                        <a href="{!! route('bulletin.edit', ['id' => $bulletin->id]) !!}" class="text-success edit" data-id="{{ $bulletin->id }}"><i
                                                class="mdi mdi-pencil font-size-18"></i></a>
                                        <a href="javascript:void(0);" class="text-danger delete" data-id="{{ $bulletin->id }}"><i
                                                class="mdi mdi-delete font-size-18"></i></a>
                                    </div>
                                </td>
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
    var delete_url = "{{route('bulletin.destroy')}}"
</script>
    @section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
     <!-- toastr plugin -->
     <script src="{{ URL::asset('/assets/libs/toastr/toastr.min.js') }}"></script>
        <!-- toastr init -->
    <script src="{{ URL::asset('/assets/js/pages/toastr.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/admin/pages/bulletin/index.js') }}"></script>
    @endsection
@endsection
