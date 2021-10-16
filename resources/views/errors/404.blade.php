@extends('layouts.master-without-nav')

@section('title')
    @lang('translation.Error_404')
@endsection

@section('body')

    <body>
    @endsection

    @section('content')

        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <h1 class="display-2 fw-medium">4<i class="bx bx-buoy bx-spin text-primary display-3"></i>4</h1>
                            <h4 class="text-uppercase">申し訳ありませんが、ページが見つかりません。</h4>
                            @if(Auth::user()->role == 1)
                            <div class="mt-5 text-center">
                                <a class="btn btn-primary waves-effect waves-light" href="{{route('dashboard')}}">トップページに戻る。</a>
                            </div>
                            @else
                            <div class="mt-5 text-center">
                                <a class="btn btn-primary waves-effect waves-light" href="{{route('vehicle.index')}}">トップページ</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8 col-xl-6">
                        <div>
                            <img src="{{ URL::asset('/assets/images/error-img.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
