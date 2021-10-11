@extends('admin.layouts.index')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/admin/pages/company/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/admin/pages/style.css') }}">
    <link href="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('title')
    company details
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">会社情報 <span>{{prefix_word($users->id, 3)}}</span></h4>
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
                                    <div class="popup-gallery d-flex flex-wrap">
                                    @foreach ($companyPhotos as $key=>$companyPhoto)
                                        <a href="{{ $companyPhoto->path }}">
                                            <div class="img-fluid">
                                                <img src="{{ $companyPhoto->path }}" alt="" width="120">
                                            </div>
                                        </a>
                                        @endforeach
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
        <!-- Magnific Popup-->
        <script src="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.js') }}"></script>

        <!-- lightbox init js-->
        <script src="{{ URL::asset('/assets/js/pages/lightbox.init.js') }}"></script>
    @endsection
@endsection
