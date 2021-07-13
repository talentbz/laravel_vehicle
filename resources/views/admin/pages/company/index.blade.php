@extends('admin.layouts.index')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/admin/pages/company/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/toastr/toastr.min.css') }}">
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/admin/pages/style.css') }}">
@endsection
@section('title')
    index bulletin
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">ユーザーリスト(詳細)</h4>
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th width="5%">PHOTO</th>
                                <th width="10%">会社名</th>
                                <th width="10%">担当者</th>
                                <th width="10%">所在地</th>
                                <th width="10%">ID(Email)</th>
                                <th width="10%">phone</th>
                                <th width="10%">説明</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($company_infos as $key=>$company_info)
                            <tr>
                                <td align="center">
                                    <a href="{!! route('company.details', ['id' => $company_info->id]) !!}">
                                        @if($company_info)
                                            <img class="img-thumbnail" src="{{$company_info->path}}" alt="" width="100">
                                        @else
                                            <img class="img-thumbnail" src="{{URL::asset('images/photo.png')}}" alt="" width="100">
                                        @endif
                                    </a>
                                </td>
                                <td><a href="{!! route('company.details', ['id' => $company_info->id]) !!}">{{$company_info->name}}</a></td>
                                <td>{{$company_info->company_name}}</td>
                                <td>{{$company_info->location}}</td>
                                <td>{{$company_info->email}}</td>
                                <td>{{$company_info->phone}}</td>
                                <td>{!!$company_info->description!!}</td>
                            </tr>
                            @empty
                            <tr>
                                <td align="center" colspan="7">データが存在しません</p>
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
