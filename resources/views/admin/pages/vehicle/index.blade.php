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
                                <th>削除</th>
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
                                <td><a href="{!! route('vehicle.details', ['id' => $vehicle_info->id]) !!}">{{prefix_word($vehicle_info->id, 3)}}</a></td>
                                <td>{{$vehicle_info->car_category}}</td>
                                <td>{{$vehicle_info->car_name}}</td>
                                <td>{{$vehicle_info->model}}</td>
                                <td>{{$vehicle_info->start_year.$vehicle_info->start_month}}</td>
                                <td>{{$vehicle_info->end_year.$vehicle_info->end_month}}</td>
                                <!-- <td>{{$vehicle_info->body_number}}</td> -->
                                <td>{{number_format($vehicle_info->mileage).' Km'}}</td>
                                <td>{{$vehicle_info->taxExc_price.' 万円'}}</td>
                                <td class="tax-inc">{{number_format($vehicle_info->taxInc_price).' 万円'}}</td>
                                <td align="center">
                                        <a href="{!! route('vehicle.edit', ['id' => $vehicle_info->id]) !!}" class="text-success edit" data-id="{{ $vehicle_info->id }}"><i
                                                class="mdi mdi-pencil font-size-18"></i></a>
                                        <a href="javascript:void(0);" class="text-danger confirm_delete" data-id="{{ $vehicle_info->id }}" data-bs-toggle="modal"
                                                data-bs-target="#myModal"><i
                                                class="mdi mdi-delete font-size-18"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                @if(empty($vehicle_infos))
                                    <td align="center" colspan="13">まずは、会社を登録してください。</p>
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
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <button type="button" class="btn btn-primary waves-effect waves-light delete_button">削除</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    vehicle_destroy = "{{route('vehicle.destroy')}}";
</script>
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
