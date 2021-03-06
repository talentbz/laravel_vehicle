@extends('admin.layouts.index')

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.min.css" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/spectrum-colorpicker/spectrum-colorpicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/datepicker/datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/toastr/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/admin/pages/vehicle/style.css') }}">
@endsection
@section('title')
    vehicle edit
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form id="myForm" class="custom-validation" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <input type="hidden" name="vehicle_id" value="{{$vehilce_details->id}}">
                    <!-- vehicle details -->
                    <h4 class="card-title">詳細情報</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-nowrap mb-0">
                            <thead>
                                
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="table-light" >登録番号</td>
                                    <td >{{prefix_word($vehilce_details->id, 3)}}</td>
                                    <td class="table-light" >地域(保管場所)</td>
                                    <td >
                                        <div class="templating-select">
                                            <select class="select2 form-control" name="area">
                                                <optgroup label="地域選択">
                                                    @foreach($areas as $area)
                                                    <option value="{{$area}}">{{$area}}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-light" >メーカー</td>
                                    <td >
                                        <div class="templating-select">
                                            <select class="select2 form-control select-category" data-placeholder="Choose ..." name="category_name">    
                                            <optgroup label="メーカー選択">
                                                    @foreach($manufactures as $manufacture)
                                                        <option value="{{$manufacture['category_name']}}" {{ $vehilce_details->car_category == $manufacture['category_name'] ? "selected" :""}}  >{{$manufacture['category_name']}}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                    </td>
                                    <td class="table-light" >車名</td>
                                    <td >
                                        <div class="templating-select">
                                            <select id="subcategory" class="select2 form-control" name="vehicle_type">
                                                @if(!is_null($vehilce_details->car_name))
                                                    <option value="{{$vehilce_details->car_name}}" selected>{{$vehilce_details->car_name}}</option>
                                                @endif
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-light" >年式</td>
                                    <td >
                                        <div class="select-date-year">
                                            <div class="templating-select">
                                                <select class="select2 form-control" name="start_year">
                                                    @foreach($years as $year)
                                                        <option value='{{$year}}' {{$vehilce_details->start_year==$year ? 'selected':''}}>{{$year}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="select-date-month">
                                            <div class="templating-select">
                                                <select class="select2 form-control" name="start_month">
                                                    @foreach($months as $month)
                                                        <option value='{{$month}}' {{$vehilce_details->start_month==$month?'selected':''}}>{{$month}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="table-light" >乗車定員</td>
                                    <td >
                                        <div class="templating-select">
                                            <select class="select2 form-control" name="quota">
                                                @foreach($quotas as $quota)
                                                    <option value='{{$quota}}' {{$vehilce_details->max_capacity==$quota?'selected':''}}>{{$quota}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-light" >型式</td>
                                    <td ><input parsley-type="model" type="text" name="model" class="form-control" required value="{{$vehilce_details->model}}" placeholder="Enter model" id="model"></td>
                                    <td class="table-light" >車体番号</td>
                                    <td ><input parsley-type="body-number" type="text" name="body_number" class="form-control" requireds value="{{$vehilce_details->body_number}}" placeholder="Enter body number" id="body_number"></td>
                                </tr>
                                <tr>
                                    <td class="table-light" >エンジン型式</td>
                                    <td ><input parsley-type="engine-model" type="text" name="engine_model" class="form-control" requireds value="{{$vehilce_details->engine_model}}" placeholder="Enter engine model" id="engine-model"></td>
                                    <td class="table-light" >排気量</td>
                                    <td ><input parsley-type="displacement" type="text" name="displacement" class="form-control" requireds value="{{$vehilce_details->displacement}}" placeholder="Enter displacement " id="displacement"></td>
                                </tr>
                                <tr>
                                    <td class="table-light" >燃料</td>
                                    <td >
                                        <div class="templating-select">
                                            <select class="select2 form-control" name="fule_list">
                                                @foreach($fule_lists as $fule_list)
                                                    <option value='{{$fule_list}}' {{$vehilce_details->fule ==$fule_list?'selected':''}}>{{$fule_list}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td class="table-light" >ミッション</td>
                                    <td >
                                        <select class="select2 form-control" name="mission">
                                            @foreach($missions as $mission)
                                                <option value='{{$mission}}' {{$vehilce_details->mission ==$mission?'selected':''}}>{{$mission}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-light" >形状</td>
                                    <td >
                                        <div class="templating-select">
                                            <select class="select2 form-control" name="shape">
                                                @foreach($shapes as $shape)
                                                    <option value='{{$shape}}' {{$vehilce_details->shape ==$shape?'selected':''}}>{{$shape}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td class="table-light" >クラス</td>
                                    <td >
                                        <select class="select2 form-control" name="class">
                                            @foreach($classes as $class)
                                                <option value='{{$class}}' {{$vehilce_details->class ==$class?'selected':''}}>{{$class}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-light" >最大積載量</td>
                                    <td >
                                        <input parsley-type="max-capacity" type="number" name="loading_capacity" class="form-control" requireds value="{{$vehilce_details->loading_capacity}}" placeholder="Enter max capacity" id="max-capacity">
                                        <p class="details-list">kg</p>
                                    </td>
                                    <td class="table-light" >走行距離</td>
                                    <td >
                                        <input parsley-type="mileage" type="number" name="mileage" class="form-control" requireds value="{{$vehilce_details->mileage}}" placeholder="Enter mileage " id="mileage">
                                        <p class="details-list">km</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-light" >車検有効期限</td>
                                    <td >
                                        <label>
                                            <input type="checkbox" class="form-check-input equip-check radio expiration-hide" value="1" name="fooby[1][]" />無し</label>
                                        <label>
                                            <input type="checkbox" class="form-check-input equip-check radio expiration-show" value="1" name="fooby[1][]" />有り</label>
                                    </td>
                                    <td class="table-light" >車検有効期限有りの場合</td>
                                    <td class="expiration">
                                        <div class="select-date-year">
                                            <div class="templating-select">
                                                <select class="select2 form-control end_year" name="end_year">
                                                    @foreach($expiration_years as $expiration_year)
                                                        <option value='{{$expiration_year}}' {{$vehilce_details->end_year== $expiration_year ? 'selected':''}}>{{$expiration_year}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="select-date-month">
                                            <div class="templating-select">
                                                <select class="select2 form-control end_month" name="end_month">
                                                    @foreach($months as $month)
                                                        <option value='{{$month}}' {{$vehilce_details->end_month==$month ? 'selected':''}}>{{$month}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- special details -->
                    <h4 class="card-title vehicle-list">装備</h4>
                    <table class="table table-bordered table-striped table-nowrap mb-0">
                        <thead>
                            
                        </thead>
                        <tbody>
                            <tr>
                                <td class="table-light" >リサイクル料金</td>
                                <td >
                                    <input parsley-type="recycling-fee" type="number" name="recycling_fee" class="form-control" requireds value="{{$vehilce_fee->fee}}" placeholder="Enter recycling fee" id="recycling-fee">
                                    <p class="details-list">円</p>
                                    </td>
                                <td class="table-light" ></td>
                                <td >
                                    
                                </td>
                            </tr>
                            <tr>
                                <td class="table-light" >販売価格(税抜)</td>
                                <td >
                                    <input parsley-type="excluding-tax" type="number" name="excluding_tax" class="form-control" requireds value="{{$vehilce_fee->taxExc_price}}" placeholder="Enter excluding tax" id="excluding-tax">
                                    <p class="details-list">万円</p>
                                    </td>
                                <td class="table-light" >販売価格(税込)</td>
                                <td >
                                    <input parsley-type="including-tax" type="number" name="including_tax" class="form-control" requireds value="{{$vehilce_fee->taxInc_price}}" placeholder="Enter including tax" id="including-tax">
                                    <p class="details-list">万円</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-light" >特記</td>
                                <td colspan="3">
                                    <textarea id="textarea" class="form-control" maxlength="225" rows="3"
                                    placeholder="This textarea has a limit of 225 chars." name="specail_note">{{$vehilce_fee->note}}</textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- requirement image -->
                    <h4 class="card-title vehicle-list">必須画像</h4>
                    <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm"><!-- Upload image input-->
                        @if($vehilce_details->require_path)
                            <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0" name="file"> 
                        @else
                            <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0" name="file" required>
                        @endif
                        <label id="upload-label" for="upload" class="font-weight-light text-muted">画像選択</label>
                        <div class="input-group-append">
                            <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">画像選択</small></label>
                        </div>
                    </div>
                    <p class="font-italic text-white text-center">The image uploaded will be rendered inside the box below.</p><!-- Uploaded image area-->
                    <div class="image-area mt-4"><img id="imageResult" src="{{$vehilce_details->require_path ? $vehilce_details->require_path: '#'}}" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>

                    <!-- vehicle equipement -->
                    <h4 class="card-title vehicle-list">装備</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-nowrap mb-0">
                            <thead>
                                
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input equip-check" name="power_steering" {{$vehicle_equipment->power_set == 1? 'checked':''}}  />
                                        <p class="equip-list">パワーステアリング</p>
                                    </td>
                                    <td >
                                        <input type="checkbox" class="form-check-input equip-check" name="power_window" {{$vehicle_equipment->power_window == 1? 'checked':''}} />
                                        <p class="equip-list">パワーウィンドウ</p>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input equip-check" name="air_condition" {{$vehicle_equipment->air_set == 1? 'checked':''}} />
                                        <p class="equip-list">エアコン</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input equip-check" name="door_lock" {{$vehicle_equipment->door_set == 1? 'checked':''}} />
                                        <p class="equip-list">集中ドアロック</p>
                                    </td>
                                    <td >
                                        <input type="checkbox" class="form-check-input equip-check" name="etc" {{$vehicle_equipment->etc_set == 1? 'checked':''}} />
                                        <p class="equip-list">ETC</p>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input equip-check" name="tacho_graph"{{$vehicle_equipment->tacograph_set == 1? 'checked':''}}  />
                                        <p class="equip-list">タコグラフ</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input equip-check" name="ad_blue" {{$vehicle_equipment->adblue_set == 1? 'checked':''}} />
                                        <p class="equip-list">AdBlue</p>
                                    </td>
                                    <td >
                                        
                                    </td>
                                    <td>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input equip-check" name="air_suspension" {{$vehicle_equipment->air_sus_set == 1? 'checked':''}} />
                                        <p class="equip-list">エアサスペンション</p>
                                    </td>
                                    <td >
                                        <input type="checkbox" class="form-check-input equip-check" name="leaf_suspension" {{$vehicle_equipment->leaf_sus_set == 1? 'checked':''}} />
                                        <p class="equip-list">リーフサスペンション</p>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input equip-check" name="retarder" {{$vehicle_equipment->redtarder_set == 1? 'checked':''}} />
                                        <p class="equip-list">リターダ</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input equip-check" name="cruise_control" {{$vehicle_equipment->cruise_set == 1? 'checked':''}} />
                                        <p class="equip-list">クルーズコントロール</p>
                                    </td>
                                    <td >
                                        <input type="checkbox" class="form-check-input equip-check" name="hill_start" {{$vehicle_equipment->adblue_set == 1? 'checked':''}} />
                                        <p class="equip-list">坂道発進補助</p>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input equip-check" name="lane_keep" {{$vehicle_equipment->lane_set == 1? 'checked':''}} />
                                        <p class="equip-list">レーンキープアシスト</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input equip-check" name="disc_brake" {{$vehicle_equipment->disc_set == 1? 'checked':''}} />
                                        <p class="equip-list">ディスクブレーキ</p>
                                    </td>
                                    <td >
                                    
                                    </td>
                                    <td>
                                    
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input equip-check" name="air_bag" {{$vehicle_equipment->air_bag_set == 1? 'checked':''}} />
                                        <p class="equip-list">エアバッグ</p>
                                    </td>
                                    <td >
                                        <input type="checkbox" class="form-check-input equip-check" name="abs" {{$vehicle_equipment->abs_set == 1? 'checked':''}} />
                                        <p class="equip-list">ABS</p>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input equip-check" name="asr" {{$vehicle_equipment->asr_set == 1? 'checked':''}} />
                                        <p class="equip-list">ASR</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input equip-check" name="back_camera" {{$vehicle_equipment->camera_set == 1? 'checked':''}} />
                                        <p class="equip-list">バックカメラ</p>
                                    </td>
                                    <td >
                                        <input type="checkbox" class="form-check-input equip-check" name="immobilizer" {{$vehicle_equipment->immobilizer_set == 1? 'checked':''}} />
                                        <p class="equip-list">イモビライザー</p>
                                    </td>
                                    <td>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input equip-check" name="dvd" {{$vehicle_equipment->dvd_set == 1? 'checked':''}} />
                                        <p class="equip-list">DVD再生</p>
                                    </td>
                                    <td >
                                        <input type="checkbox" class="form-check-input equip-check" name="cd" {{$vehicle_equipment->cd_set == 1? 'checked':''}} />
                                        <p class="equip-list">CD再生</p>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input equip-check" name="md" {{$vehicle_equipment->md_set == 1? 'checked':''}} />
                                        <p class="equip-list">MD再生</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input equip-check" name="radio" {{$vehicle_equipment->radio_set == 1? 'checked':''}} />
                                        <p class="equip-list">ラジオ</p>
                                    </td>
                                    <td >
                                        <input type="checkbox" class="form-check-input equip-check" name="navigation" {{$vehicle_equipment->navigation_set == 1? 'checked':''}} />
                                        <p class="equip-list">ナビ</p>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input equip-check" name="tv" {{$vehicle_equipment->tv_set == 1? 'checked':''}} />
                                        <p class="equip-list">TV</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input equip-check" name="repair_history" {{$vehicle_equipment->repaire_set == 1? 'checked':''}} />
                                        <p class="equip-list">修理歴</p>
                                    </td>
                                    <td >
                                        <input type="checkbox" class="form-check-input equip-check" name="owner" {{$vehicle_equipment->owner_set == 1? 'checked':''}} />
                                        <p class="equip-list">ワンオーナー</p>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input equip-check" name="unused_car" {{$vehicle_equipment->unused_set == 1? 'checked':''}} />
                                        <p class="equip-list">未使用車</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="vehicle_save">
                        <a href="{{URL::previous()}}">
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light back">
                                <i class="fas fa-long-arrow-alt-left"></i> 戻る
                            </button>    
                        </a>
                        <button type="submit" class="btn btn-outline-primary waves-effect waves-light">
                            <i class="fas far fa-save"></i> 保存
                        </button>
                    </div>
                </form>

                <!-- vehicle image upload -->
                <form id="imageForm" class="custom-validation" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <div class="file-loading">
                            <input id="input-711" name="file" type="file" multiple>
                        </div>
                    </div>
                </form>
                <div class="vehicle_save">
                    <a href="{{route('vehicle.index')}}" class="btn btn-outline-primary waves-effect waves-light"><i class="fas fa-long-arrow-alt-left"></i> 戻る</a>
                </div>
            </div>
        </div>
    </div> <!-- end col -->

</div> <!-- end row -->

<script>
    var manufactures = @json($manufactures);
    var edit_url = "{{ route('vehicle.edit_store') }}";
    var add_photo_url = "{!! route('vehicle.photo_store', ['id' => $vehilce_details->id]) !!}" ;
    var remove_photo = "{{ route('vehicle.photo_destroy') }}";
    var car_paths = @json($car_paths);
    var id_array = @json($id_array);
    var vehicle_details = @json($vehilce_details);
</script>
    @section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/spectrum-colorpicker/spectrum-colorpicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/datepicker/datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/file-input.js') }}"></script>

    <!-- form advanced init -->
    <script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js') }}"></script>
    <!-- init js -->
    <script src="{{ URL::asset('assets/js/pages/form-editor.init.js') }}"></script>
     <!-- toastr plugin -->
     <script src="{{ URL::asset('/assets/libs/toastr/toastr.min.js') }}"></script>
        <!-- toastr init -->
    <script src="{{ URL::asset('/assets/js/pages/toastr.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/admin/pages/vehicle/index.js') }}"></script>
    @endsection
@endsection
