@extends('admin.layouts.index')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/admin/pages/dashboard/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/admin/pages/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/toastr/toastr.min.css') }}">
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('title')
    index dashboard
@endsection

@section('content')
<!-- vehicle table -->
<div class="row">
    <div class="col-12">
        <div class="card">
            
            <div class="card-body">
                <div class="cart-header">
                    <h4 class="card-title">在庫車両</h4>
                </div>
                <div class="table-responsive">
                    <table class="display table table-bordered dt-responsive  nowrap w-100">
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
                                <th>会社名</th>
                                <th>削除</th>
                                <!-- <th width="5%">特記</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($vehicles as $vehicle)
                            <tr>
                                <td align="center"><a href="{!! route('vehicle.details', ['id' => $vehicle->id]) !!}">
                                    @if($vehicle->car_path)
                                        <img class="img-thumbnail" src="{{$vehicle->car_path}}" alt="" width="100">
                                    @else
                                        <img class="img-thumbnail" src="{{URL::asset('images/photo.png')}}" alt="" width="100">
                                    @endif
                                </a></td>
                                <td><a href="{!! route('vehicle.details', ['id' => $vehicle->id]) !!}">ID: {{prefix_word($vehicle->id, 3)}}</a></td>
                                <td>{{$vehicle->car_category}}</td>
                                <td>{{$vehicle->car_name}}</td>
                                <td>{{$vehicle->model}}</td>
                                <td>{{$vehicle->start_year.$vehicle->start_month}}</td>
                                <td>{{$vehicle->end_year.$vehicle->end_month}}</td>
                                <!-- <td>{{$vehicle->body_number}}</td> -->
                                <td>{{number_format($vehicle->mileage).' Km'}}</td>
                                <td>{{$vehicle->taxExc_price.' 万円'}}</td>
                                <td class="tax-inc">{{number_format($vehicle->taxInc_price).' 万円'}}</td>
                                <td>{{$vehicle->company_name}}</td>
                                <td align="center">
                                        <a href="javascript:void(0);" class="text-danger confirm_vehicle" data-id="{{ $vehicle->id }}" data-bs-toggle="modal"
                                                data-bs-target="#vehicleDelete"><i
                                                class="mdi mdi-delete font-size-18"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td align="center" colspan="13">データが存在しません</p>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<!-- sample modal content -->
<div id="vehicleDelete" class="modal fade" tabindex="-1" aria-labelledby="vehicleDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="vehicleDeleteLabel">本気ですか？</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>これらのレコードを本当に削除しますか？ このプロセスは元に戻せません。</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect"
                    data-bs-dismiss="modal">閉じる</button>
                <button type="button" class="btn btn-primary waves-effect waves-light vehicle_delete">削除</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- bulletin table -->
<div class="row">
    <div class="col-12">
        <div class="card">
            
        <div class="card-body">
            <div class="cart-header">
                <h4 class="card-title">掲示板</h4>
            </div>
            <div class="table-responsive">
                <table class="display table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                        <tr>
                            <th width="10%">NO</th>
                            <th width="10%">日付</th>
                            <th width="10%">カテゴリー</th>
                            <th width="10%">タイトル</th>
                            <th width="50%">内容</th>
                            <th width="10%">削除</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bulletins as $key=>$bulletin)
                        <tr>
                            <td align="center">{{$key+=1}}</td>
                            <td>{{$bulletin->deadline_date}}</td>
                            <td>{{$bulletin->category}}</td>
                            <td>{{$bulletin->title}}</td>
                            <td>
                                <p>{{$bulletin->content}}</p>
                            </td>
                            <td align="center">
                                    <a href="javascript:void(0);" class="text-danger confirm_delete" data-id="{{ $bulletin->id }}" data-bs-toggle="modal"
                            data-bs-target="#myModal"><i class="mdi mdi-delete font-size-18"></i></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td align="center" colspan="6">データが存在しません</p>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<!-- sample modal content -->
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
                <button type="button" class="btn btn-primary waves-effect waves-light delete">削除</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    var bulletin_destroy = "{{route('bulletin.destroy')}}"
    var vehicle_destroy = "{{route('vehicle.destroy')}}"
</script>
</script>
    @section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
     <!-- toastr plugin -->
     <script src="{{ URL::asset('/assets/libs/toastr/toastr.min.js') }}"></script>
        <!-- toastr init -->
    <script src="{{ URL::asset('/assets/js/pages/toastr.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/admin/pages/dashboard/index.js') }}"></script>
    @endsection
@endsection
