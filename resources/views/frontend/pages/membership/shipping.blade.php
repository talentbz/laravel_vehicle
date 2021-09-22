@extends('frontend.layouts.index')

@section('css')
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/frontend/pages/homepage/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/frontend/pages/membership/shipping.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/frontend/pages/membership/style.css') }}">
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
                    <p>フフリーワードで検索する</p>
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
                <div class="category row">
                    <div class="category-title">
                        <h3>ご利用料金</h3>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="de-fee">
                                <p><span>初期設定費用</span>16,500円(税込) (初期設定時のみ)</p>
                                <p><span>月額利用料金</span>11,000円(税込) (40台まで掲載可能)</p>
                                <p><span>掲載台数追加</span>5,5000円(税込）(40台を追加掲載可能）</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="category row">
                    <div class="category-title">
                        <h3>必要条件</h3>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="de-require">
                                <p>1) 古物商許可証を取得していこと</p>
                                <p>2) 主たる事務所が日本国内であること</p>
                                <p>3) 主たる事業が中古車販売、中古機械商であること</p>
                                <p>4) 実店舗を有していること</p>
                                <p>5) 保有している在庫を掲載していただくこと</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="category row">
                    <div class="category-title">
                        <h3>審査</h3>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="de-test">
                                <p>登録お申込み後、審査の結果、お断りする場合があります。予めご了承ください。</p>
                                <p>審査の内容は一切お答え致しかねます。</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="category row">
                    <div class="category-title">
                        <h3>掲載までの流れ</h3>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="de-follow">
                                <p>①登録<span style="color:red;">申込みフォーム</span>からお申込み・・・お名前・所在地、電話番号などを申込フォームで送府</p>
                                <p>②受理後、必要書類をメールにてご案案いたします。</p>
                                <p>③書類受理後、ジャパントラッカー事局にて審査。</p>
                                <p>④審査後、問題なければログインパスワードとIDをメールにてご案内いたします。</p>
                            </div>
                            <div class="de-application">
                                <p>掲載のお申込みは下記のボタンからお願い致します。</p>
                                <a href="{{route('shipping.contact.form')}}" class="btn btn-outline-danger">申込フォーム</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- content -->
    @section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pagination/jquery.twbsPagination.js') }}"></script>
    <script src="{{ URL::asset('/assets/frontend/pages/homepage/index.js') }}"></script>
    @endsection
@endsection
