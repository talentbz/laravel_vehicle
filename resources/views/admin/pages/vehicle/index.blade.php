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
                <div class="cart-header">
                    <h4 class="card-title">在庫車両</h4>
                    @if(!empty($vehicle_infos || $company))
                        <a href="{{route('vehicle.create')}}" class="btn btn-outline-primary waves-effect waves-light" ><i class="fas fa-plus"></i> 追加</a>
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>PHOTO</th>
                                <th>登録NO</th>
                                <th>メーカー</th>
                                <th>車名</th>
                                <th>型式</th>
                                <!-- <th>排気量</th> -->
                                <th>年式</th>
                                <th>車検有効期限</th>
                                <!-- <th>車体番号</th> -->
                                <th>走行距離</th>
                                <th>販売価格(税抜)</th>
                                <th>販売価格(税込）</th>
                                <!-- <th width="5%">特記</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($vehicle_infos as $vehicle_info)
                            <tr>
                                <td align="center"><a href="{!! route('vehicle.details', ['id' => $vehicle_info->id]) !!}">
                                    @if($vehicle_info->car_path)
                                        <img class="img-thumbnail" src="{{$vehicle_info->car_path}}" alt="" width="100">
                                    @else
                                        <img class="img-thumbnail" src="{{URL::asset('images/photo.png')}}" alt="" width="100">
                                    @endif
                                </a></td>
                                <td><a href="{!! route('vehicle.details', ['id' => $vehicle_info->id]) !!}">ID: {{'00'.$vehicle_info->id}}</a></td>
                                <td>{{$vehicle_info->car_category}}</td>
                                <td>{{$vehicle_info->car_name}}</td>
                                <td>{{$vehicle_info->model}}</td>
                                <!-- <td>{{number_format($vehicle_info->displacement).' L'}}</td> -->
                                <td>{{$vehicle_info->start_year.$vehicle_info->start_month}}</td>
                                <td>{{$vehicle_info->end_year.$vehicle_info->end_month}}</td>
                                <!-- <td>{{$vehicle_info->body_number}}</td> -->
                                <td>{{number_format($vehicle_info->mileage).' Km'}}</td>
                                <td>{{$vehicle_info->taxExc_price.' 万円'}}</td>
                                <td class="tax-inc">{{number_format($vehicle_info->taxInc_price).' 万円'}}</td>
                                <!-- <td>{{$vehicle_info->note}}</td> -->
                            </tr>
                            @empty
                            <tr>
                                @if(empty($vehicle_infos))
                                    <td align="center" colspan="13">会社を作ってください。</p>
                                @else
                                    <td align="center" colspan="13">データはありません。</p>
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
    @section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
     <!-- toastr plugin -->
     <script src="{{ URL::asset('/assets/libs/toastr/toastr.min.js') }}"></script>
        <!-- toastr init -->
    <script src="{{ URL::asset('/assets/js/pages/toastr.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/admin/pages/vehicle/index.js') }}"></script>
    <script src="{{ URL::asset('/assets/admin/pages/vehicle/list.js') }}"></script>
    @endsection
@endsection
