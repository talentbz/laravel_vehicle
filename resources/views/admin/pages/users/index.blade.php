@extends('admin.layouts.index')

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/toastr/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/admin/pages/style.css') }}">
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
                    <div class="cart-header">
                        <h4 class="card-title">ユーザーリスト</h4>
                        <button type="button" class="btn btn-outline-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myModal">
                            <i class="fas fa-plus"></i> 追加
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <!-- <th style="width: 20px;" class="align-middle">
                                    <div class="form-check font-size-16">
                                        <input class="form-check-input" type="checkbox" id="checkAll">
                                        <label class="form-check-label" for="checkAll"></label>
                                    </div>
                                </th> -->
                                <th width="5%">会員NO</th>
                                <th width="5%">写真</th>
                                <th width="10%">ID(Email)</th>
                                <th width="20%">会社名</th>
                                <th width="10%">電話番号</th>
                                <th width="20%">所在地</th>
                                <th width="10%">状態</th>
                                <th width="10%">更新日</th>
                                <th width="10%">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $key=>$user)
                            <tr class="data-row">
                                <!-- <td>
                                    <div class="form-check font-size-16">
                                        <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                        <label class="form-check-label" for="orderidcheck01"></label>
                                    </div>
                                </td> -->
                                <td align="center">{{$key+=1}}</td>
                                <td align="center">
                                    @if($user->avatar)
                                        <img class="rounded-circle avatar-xs" src="{{$user->avatar}}" alt="">
                                    @else
                                        <img class="rounded-circle avatar-xs" src="{{URL::asset('images/default.jpg')}}">    
                                    @endif
                                </td>
                                <td class="email">{{$user->email}}</td>
                                <td class="company_name">{{$user->company_name}}</td>
                                <td class="phone">{{$user->phone}}</td>
                                <td class="location">{{$user->location}}</td>
                                <td>{{$user->status}}</td>
                                <td>{{$user->updated_at}}</td>
                                <td align="center">
                                        <a href="javascript:void(0);" class="text-success edit" data-id="{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#editModal"><i
                                                class="mdi mdi-pencil font-size-18"></i></a>
                                        <a href="javascript:void(0);" class="text-danger confirm_delete" data-id="{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                                           class="mdi mdi-delete font-size-18"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td align="center" colspan="10">データが存在しません</p>
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
    @include('admin.pages.users.edit')
    <!-- delete modal content -->
    <div id="deleteModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">本気ですか？</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>これらのレコードを本当に削除しますか？ このプロセスは元に戻せません。</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect"
                        data-bs-dismiss="modal">閉じる</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light delete">削除</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script>
        var add_url = "{{ route('userlists.create') }}";
        var edit_url = "{{ route('userlists.edit') }}";
        var delete_url = "{{ route('userlists.delete') }}";
    </script>
    @section('script')
        <!-- Required datatable js -->
        <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
        <!-- <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script> -->
        <!-- toastr plugin -->
        <script src="{{ URL::asset('/assets/libs/toastr/toastr.min.js') }}"></script>
        <!-- toastr init -->
        <script src="{{ URL::asset('/assets/js/pages/toastr.init.js') }}"></script>
        <script src="{{ URL::asset('/assets/admin/pages/user/index.js') }}"></script>
    @endsection
@endsection
