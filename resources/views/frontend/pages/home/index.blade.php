@extends('frontend.layouts.index')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/frontend/pages/homepage/style.css') }}">
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('title')
    homepage
@endsection

@section('content')
    <div class="banner-image">
        <img src="{{asset('/images/frontend/home/banner_1.jpg')}}" class="img-fluid" alt="Responsive image">
        <div class="container home-search">
            <div class="row height d-flex justify-content-center align-items-center">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <p>フリーワードで検索す</p>
                    <div class="search">
                        <form action="">
                            <i class="fa fa-search"></i> <input type="text" class="form-control" placeholder="例　三菱　QPG-FS64VZ"> 
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
                    <div class="list-title">
                        <h3>中古トラックを探す</h3>
                        <p>現在の登録台数：<span>325</span>台</p>
                    </div>
                    <div class="category row">
                        <div class="category-title">
                            <i class="fa fa-search"></i>
                            <h3>ボディタイプで探す</h3>
                        </div>
                        @foreach ($body_lists as $key=>$body_list)
                        <div class="col-md-2">
                            <a href="{!! route('bodycategory', ['name' => $body_list['link']]) !!}">
                                <img src="{{asset($body_list['img'])}}" alt="">
                                <p>{{$body_list['name']}}</p>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    
                </div>
            </div>
    </div> <!-- content -->
    @section('script')
    <script src="{{ URL::asset('/assets/frontend/pages/homepage/index.js') }}"></script>
    @endsection
@endsection
