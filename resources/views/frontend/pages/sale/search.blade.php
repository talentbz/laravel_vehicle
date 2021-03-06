@extends('frontend.layouts.index')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/frontend/pages/homepage/style.css') }}">
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/spectrum-colorpicker/spectrum-colorpicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/datepicker/datepicker.min.css') }}">
@endsection
@section('title')
    sale
@endsection

@section('content')
    <div class="banner-image">
        <img src="{{asset('/images/frontend/home/banner_1.jpg')}}" class="img-fluid" alt="Responsive image">
        <div class="container home-search">
            <div class="row height d-flex justify-content-center align-items-center">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <p>フリーワードで検索する</p>
                    <div class="search">
                        <form action="{{route('sale.search')}}" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                            <i class="fa fa-search"></i> <input type="text" class="form-control" placeholder="例　三菱　QPG-FS64VZ" name="general_search"> 
                            <button class="btn btn-primary" type="submit">検索</button> 
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- car list per category -->
    <div class="container-fluid home-content">
            <div class="row">
                <div class="car-list">
                    <!-- detail search -->
                    <div class="category row">
                        <div class="category-title">
                            <i class="fa fa-search"></i>
                            <h3>絞込み検索</h3>
                        </div>
                        <form action="{{route('sale.search')}}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <!-- manufacture -->
                                        <div class="select-wrapper">
                                            <div class="select-label">
                                                <label for="" class="pt-2">メーカー</label>
                                            </div>
                                            <div class="select-box">
                                                <select class="select2 form-control" name="manufacture" data-placeholder="すべて">
                                                    <option></option>
                                                    <option value=" すべて"> すべて</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category}}" {{$manufacture == $category ? 'selected':''}}>{{$category}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- size -->
                                        <div class="select-wrapper">
                                            <div class="select-label">
                                                <label for="" class="pt-2">大きさ</label>
                                            </div>
                                            <div class="select-box">
                                                <select class="select2 form-control" name="size" data-placeholder="大きさ">
                                                    <option></option>
                                                    <option value=" すべて"> すべて</option>
                                                    @foreach($classes as $class)
                                                        <option value="{{$class}}" {{$size == $class ? 'selected':''}}>{{$class}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- location -->
                                        <div class="select-wrapper">
                                            <div class="select-label">
                                                <label for="" class="pt-2">地域</label>
                                            </div>
                                            <div class="select-box">
                                                <select class="select2 form-control" name="location" data-placeholder="地域">
                                                    <option></option>
                                                    <option value=" すべて"> すべて</option>
                                                    @foreach($areas as $area)
                                                        <option value="{{$area}}" {{$location == $area ? 'selected':''}}>{{$area}}</option>
                                                    @endforeach
                                                </select>  
                                            </div>
                                        </div>
                                        <!-- car shape -->
                                        <div class="select-wrapper">
                                            <div class="select-label">
                                                <label for="" class="pt-2">形状</label>
                                            </div>
                                            <div class="select-box">
                                                <select class="select2 form-control" name="shape" data-placeholder="形状">
                                                    <option></option>
                                                    <option value=" すべて"> すべて</option>
                                                    @foreach($shapes as $shape)
                                                        <option value="{{$shape}}" {{$shape == $body_shape ? 'selected':''}}>{{$shape}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- from year -->
                                        <div class="select-wrapper">
                                            <div class="select-label">
                                                <label for="" class="pt-2">年式</label>
                                            </div>
                                            <div class="select-box">
                                                <select class="select2 form-control" name="from_year" data-placeholder="選択してください">
                                                    <option></option>
                                                    @foreach($years as $year)
                                                        <option value="{{$year}}" {{$from_year == $year ? 'selected':''}}>{{$year}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- to year -->
                                        <div class="select-wrapper">
                                            <div class="select-label">
                                                <label for="" class="pt-2 to-year">~</label>
                                            </div>
                                            <div class="select-box">
                                                <select class="select2 form-control" name="to_year" data-placeholder="選択してください">
                                                    <option></option>
                                                    @foreach($years as $year)
                                                        <option value="{{$year}}" {{$to_year == $year ? 'selected':''}}>{{$year}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- from millege -->
                                        <div class="select-wrapper">
                                            <div class="select-label">
                                                <label for="" class="pt-2">走行距離</label>
                                            </div>
                                            <div class="select-box">
                                                <select class="select2 form-control" name="from_millege" data-placeholder="下限なし">
                                                    <option></option>
                                                    <option value="下限なし">下限なし</option>
                                                    @foreach($distants as $distant)
                                                        <option value="{{$distant}}" {{!is_null($from_millege)?( $from_millege == $distant ? 'selected':''): ''}}>{{number_format($distant)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- to millege -->
                                        <div class="select-wrapper">
                                            <div class="select-label">
                                                <label for="" class="pt-2 to-millege"> ~ </label>
                                            </div>
                                            <div class="select-box">
                                                <select class="select2 form-control" name="to_millege" data-placeholder="上限なし">
                                                    <option></option>
                                                    <option value="上限なし">上限なし</option>
                                                    @foreach($distants as $distant)
                                                        <option value="{{$distant}}" {{!is_null($to_millege)?($to_millege == $distant ? 'selected':''):''}}>{{number_format($distant)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="read-more detail-search">
                                <input class="btn btn-warning" type="submit" value="検索" />
                            </div>
                        </form>
                    </div>


                    <!-- latest car info -->
                    <div class="category row">
                        <div class="category-title">
                            <i class="fa fa-search"></i>
                            <h3>車両情報</h3>
                        </div>
                        <div class="carlist-page row">
                            @include('frontend.pages.sale.carlist')
                        </div>
                        <!-- <div class="read-more">
                            <a href="#" class="btn btn-primary" type="submit">もっと見る</a>
                        </div> -->
                        
                        
                    </div>
                </div>
            </div>
    </div> <!-- content -->
    @section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/spectrum-colorpicker/spectrum-colorpicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/datepicker/datepicker.min.js') }}"></script>

    <!-- form advanced init -->
    <script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>

    <script src="{{ URL::asset('/assets/frontend/pages/search/index.js') }}"></script>
    <script src="{{ URL::asset('/assets/frontend/pages/homepage/index.js') }}"></script>
    @endsection
@endsection
