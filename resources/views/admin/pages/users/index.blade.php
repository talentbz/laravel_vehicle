@extends('admin.layouts.index')

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/toastr/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/admin/pages/user/style.css') }}">
@endsection
@section('title')
    userlist
@endsection

@section('content')
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Default Datatable</h4>
                    <div class="lnb-new-schedule float-sm-end ms-sm-3 mt-4 mt-sm-0">
                        <button type="button" class="btn btn-outline-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myModal">Add New</button>
                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <!-- <th style="width: 20px;" class="align-middle">
                                    <div class="form-check font-size-16">
                                        <input class="form-check-input" type="checkbox" id="checkAll">
                                        <label class="form-check-label" for="checkAll"></label>
                                    </div>
                                </th> -->
                                <th>No</th>
                                <th>Avatar</th>
                                <th>email</th>
                                <th>password</th>
                                <th>compamy name</th>
                                <th>phone</th>
                                <th>location</th>
                                <th>status</th>
                                <th>created at</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;?>
                            @forelse ($users as $user)
                            <tr>
                                <!-- <td>
                                    <div class="form-check font-size-16">
                                        <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                        <label class="form-check-label" for="orderidcheck01"></label>
                                    </div>
                                </td> -->
                                <td>{{$i++}}</td>
                                <td>
                                    @if($user->avatar)
                                        <img class="rounded-circle avatar-xs" src="{{$user->avatar}}" alt="">
                                    @else
                                        <img class="rounded-circle avatar-xs" src="{{URL::asset('images/default.jpg')}}">    
                                    @endif
                                </td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->password}}</td>
                                <td>{{$user->company_name}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->location}}</td>
                                <td>{{$user->status}}</td>
                                <td>{{$user->updated_at}}</td>
                                <td>
                                    <div class="d-flex gap-3">
                                        <a href="javascript:void(0);" class="text-success edit" data-id="{{ $user->id }}"><i
                                                class="mdi mdi-pencil font-size-18"></i></a>
                                        <a href="javascript:void(0);" class="text-danger delete" data-id="{{ $user->id }}"><i
                                                class="mdi mdi-delete font-size-18"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td align="center" colspan="10">There is no data</p>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <div>
    @include('admin.pages.users.create')
    <script>
        var add_url = "{{ route('userlists.create') }}";
        var edit_url = "{{ route('userlists.edit') }}";
        var delete_url = "{{ route('userlists.delete') }}";
    </script>
    @section('script')
        <!-- Required datatable js -->
        <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
        <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
        <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
        <!-- Datatable init js -->
        <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
        <!-- toastr plugin -->
        <script src="{{ URL::asset('/assets/libs/toastr/toastr.min.js') }}"></script>
        <!-- toastr init -->
        <script src="{{ URL::asset('/assets/js/pages/toastr.init.js') }}"></script>
        <script src="{{ URL::asset('/assets/admin/pages/user/index.js') }}"></script>
    @endsection
@endsection
