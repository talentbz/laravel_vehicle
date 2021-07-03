@extends('admin.layouts.index')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/admin/pages/company/style.css') }}">
@endsection
@section('title')
    company details
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">会社情報</h4>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-nowrap mb-0">
                        <thead>
                           
                        </thead>
                        <tbody>
                            <tr>
                                <th class="text-nowrap" scope="row">会社名</th>
                                <td colspan="6">{{$users->company_name}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">担当者</th>
                                <td colspan="6">{{$company->member}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">所在地</th>
                                <td colspan="6">{{$users->location}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">電話番号</th>
                                <td colspan="6">{{$users->phone}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">E-mail</th>
                                <td colspan="6">{{$users->email}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">ホームページURL</th>
                                <td colspan="6">{{$company->site_url}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">会社写真</th>
                                <td colspan="6">
                                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                                        
                                        <ol class="carousel-indicators">
                                            @foreach ($companyPhotos as $key=>$companyPhoto)
                                                <li data-bs-target="#carouselExampleFade" data-bs-slide-to="{{$key}}" class="{{$key==0?'active':''}}"></li>
                                            @endforeach
                                        </ol>
                                        <div class="carousel-inner">
                                            @foreach ($companyPhotos as $key=>$companyPhoto)
                                                <div class="carousel-item {{$key==0?'active':''}}">
                                                    <img class="d-block img-fluid" src="{{ $companyPhoto->path }}"
                                                        alt="First slide">
                                                </div>
                                            @endforeach
                                        </div>
                                        
                                        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">会社説明</th>
                                <td colspan="6">{!! $company->description !!}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @if(Auth::user()->role == 2)
                <div class="company_edit">
                    <a href="{!! route('company.edit', ['id' => $company->id]) !!}"> 
                        <button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="far fa-edit"></i> 修正</button>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div> <!-- end col -->

</div> <!-- end row -->
    @section('script')
        
    @endsection
@endsection
