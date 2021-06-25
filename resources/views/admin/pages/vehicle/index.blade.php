@extends('admin.layouts.index')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/admin/pages/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/admin/pages/vehicle/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/toastr/toastr.min.css') }}">
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        table.dataTable tbody td {
            vertical-align: initial;
        }
    </style>
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
                @if(!empty($vehicle_infos || $company))
                <div class="lnb-new-schedule float-sm-end ms-sm-3 mt-4 mt-sm-0">
                    <a href="{{route('vehicle.create')}}" class="btn btn-outline-primary waves-effect waves-light" >Add New</a>
                </div>
                @endif
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>image</th>
                                <th>ID</th>
                                <th>メーカー</th>
                                <th>車名</th>
                                <th>型式</th>
                                <th>排気量</th>
                                <th>年式</th>
                                <th>車検</th>
                                <th>車体番号</th>
                                <th>走行距離</th>
                                <th>価格(抜き)</th>
                                <th>価格(税込）</th>
                                <th>特記</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($vehicle_infos as $vehicle_info)
                            <tr>
                                <td><a href="{!! route('vehicle.details', ['id' => $vehicle_info->vehicle_id]) !!}"><img class="img-thumbnail" src="{{$vehicle_info->car_path}}" alt="" width="100"></a></td>
                                <td><a href="{!! route('vehicle.details', ['id' => $vehicle_info->vehicle_id]) !!}">ID:{{$vehicle_info->vehicle_id}}</a></td>
                                <td>{{$vehicle_info->car_category}}</td>
                                <td>{{$vehicle_info->car_name}}</td>
                                <td>{{$vehicle_info->model}}</td>
                                <td>{{$vehicle_info->displacement.' L'}}</td>
                                <td>{{$vehicle_info->start_year.$vehicle_info->start_month}}</td>
                                <td>{{$vehicle_info->end_year.$vehicle_info->end_month}}</td>
                                <td>{{$vehicle_info->body_number}}</td>
                                <td>{{$vehicle_info->displacement.' Km'}}</td>
                                <td>{{$vehicle_info->taxExc_price.' 円'}}</td>
                                <td class="tax-inc">{{$vehicle_info->taxInc_price.' 円'}}</td>
                                <td>{{$vehicle_info->note}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td align="center" colspan="13">Please create company.</p>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
    @section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
     <!-- toastr plugin -->
     <script src="{{ URL::asset('/assets/libs/toastr/toastr.min.js') }}"></script>
        <!-- toastr init -->
    <script src="{{ URL::asset('/assets/js/pages/toastr.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/admin/pages/vehicle/index.js') }}"></script>
    @endsection
@endsection
