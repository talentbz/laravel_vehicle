@extends('admin.layouts.index')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/admin/pages/bulletin/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/admin/pages/style.css') }}">
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
                <div class="cart-header">
                    <h4 class="card-title">掲示板</h4>
                    @if(!empty($bulletins))
                        <a href="{{route('bulletin.add')}}" class="btn btn-outline-primary waves-effect waves-light" ><i class="fas fa-plus"></i> 追加</a>
                    @endif    
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>日付</th>
                                <th>カテゴリー</th>
                                <th>タイトル</th>
                                <th align="left">内容</th>
                                <th>修正・削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bulletins as $key=>$bulletin)
                            <tr>
                                <td align="center">{{$key+=1}}</td>
                                <td align="center">{{$bulletin->deadline_date}}</td>
                                <td align="center">{{$bulletin->category}}</td>
                                <td align="center">{{$bulletin->title}}</td>
                                <td>
                                    <p>{{$bulletin->content}}</p>
                                </td>
                                <td align="center">
                                        <a href="{!! route('bulletin.edit', ['id' => $bulletin->id]) !!}" class="text-success edit" data-id="{{ $bulletin->id }}"><i
                                                class="mdi mdi-pencil font-size-18"></i></a>
                                        <a href="javascript:void(0);" class="text-danger delete" data-id="{{ $bulletin->id }}"><i
                                                class="mdi mdi-delete font-size-18"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                @if(empty($bulletins))
                                    <td align="center" colspan="6">
                                        <a href="{{route('company.create')}}" class="btn btn-outline-primary waves-effect waves-light">
                                        会社を作る</a>
                                    </td>
                                @else
                                    <td align="center" colspan="6">データが存在しません</p>
                                @endif
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
    <!-- <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script> -->
     <!-- toastr plugin -->
     <script src="{{ URL::asset('/assets/libs/toastr/toastr.min.js') }}"></script>
        <!-- toastr init -->
    <script src="{{ URL::asset('/assets/js/pages/toastr.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/admin/pages/bulletin/index.js') }}"></script>
    @endsection
@endsection
