@extends('frontend.layouts.index')

@section('css')
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/frontend/pages/homepage/style.css') }}">
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
    <div class="banner-adver">
        <div class="container">
            <div class="row mt-5 mb-5 adver-top">
                <h1>掲載店募集<i class="fas fa-angle-double-right"></i></h1>
                <p>中古トラック、ダンプなどをトラッカージャパンに掲載しませんか？</p>
            </div>
            <div class="row">
                <div class="wrecker-service">
                    <h1>レッカーサービス</h1>
                    <a href="#">
                        <img src="{{asset('/images/frontend/home/icon/wrecker.png')}}" alt="">
                        <span>全国対応・迅速・格安・安全</span>
                    </a>
                    
                </div>
                <div class="painting-service">
                    <h1>板金塗装サービス</h1>
                    <a href="#">
                        <img src="{{asset('/images/frontend/home/icon/painting.png')}}" alt="">
                        <span>迅速・格安・丁寧・安心</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- contact form -->
    <div class="container pt-5" style="max-width: 500px">

        <!-- Alert User -->
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

        <form  method="post" action="{{ route('contact.save') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" id="name">

                <!-- Show error -->
                @if ($errors->has('name'))
                    <div class="alert alert-danger">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" id="email">

                <!-- Show error -->
                @if ($errors->has('email'))
                    <div class="alert alert-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif                
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone" id="phone">

                <!-- Show error -->
                @if ($errors->has('phone'))
                    <div class="alert alert-danger">
                        {{ $errors->first('phone') }}
                    </div>
                @endif                                
            </div>

            <div class="form-group">
                <label>Subject</label>
                <input type="text" class="form-control" name="subject" id="subject">

                <!-- Show error -->
                @if ($errors->has('subject'))
                    <div class="alert alert-danger">
                        {{ $errors->first('subject') }}
                    </div>
                @endif                 
            </div>

            <div class="form-group">
                <label>Message</label>
                <textarea class="form-control" name="message" id="message" rows="5"></textarea>

                <!-- Show error -->
                @if ($errors->has('message'))
                    <div class="alert alert-danger">
                        {{ $errors->first('message') }}
                    </div>
                @endif                    
            </div>

            <input type="submit" name="send" value="Send" class="btn btn-dark btn-block">
        </form>
    </div>
    @section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pagination/jquery.twbsPagination.js') }}"></script>
    <script src="{{ URL::asset('/assets/frontend/pages/homepage/index.js') }}"></script>
    @endsection
@endsection
