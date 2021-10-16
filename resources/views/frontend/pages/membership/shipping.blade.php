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
                <!-- main -->
                <div class="category row">
                    <div class="category-title">
                        <h3>まずは会員登録から</h3>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="sh-main">
                                <p>運送会社様は、トラッカージャパンへの所有車両の掲載には費用は一切かかりません。 ただし、車両の売買、リースの成約の際は手数料をいただきます。</p>
                                <p>掲載された車両に関する購入・リース希望者へ対応は、トラッカージャパンが全て代行いたします。(現車確認時の立会い、契約調印、保険手続き、名義変更手配、納車手配、返車手配、契約金額の徴収等）</p>
                                <h5 class="mt-5">【手数料】</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead></thead>
                                        <tbody>
                                            <tr>
                                                <td>車両売買成約</td>
                                                <td>売買金額(税抜き)に対し、5%</td>
                                            </tr>
                                            <tr>
                                                <td>リース契約成約</td>
                                                <td>契約リース料金(月額)に対し、20%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <h5 class="mt-5">【手数料】</h5>
                                <p>	売買契約の車両本体価格が2,200,000円(税込）の場合、</p>
                                <p>2,200,000円×5%=110,000円(税込)</p>
                                <p>手数料金額は<span>110,000円</span>(税込）となります。</p>
                                <h5 class="mt-5">【例】リース成約のケース</h5>
                                <p>リース価格が月額330,000円(税込)で2カ月間リースする場合、</p>
                                <p>330,000円×20%=66,000円(税込)</p>
                                <p>月当たりの手数料金額は<span>66,000円</span>(税込）となります。</p>
                                <p>お支払い合計金額は、66,000円×2カ月=<span>132,000円</span>(税込)となります。</p>
                                <h5 class="mt-5">【成約金額と手数料のお支払いの流れ】</h5>
                                <h6 class="mt-3 mb-3">車両の売買契約の場合、</h6>
                                <p>①売買契約成立</p>
                                <p>②購入者がトラッカージャパンへお支払い</p>
                                <p>③手数料を差引いた金額を車両所有者様へお支払い</p>
                                <h6 class="mt-3 mb-3">車両のリース契約の場合</h6>
                                <p>①リース契約成立</p>
                                <p>②リース者がトラッカージャパンへ毎月お支払い</p>
                                <p>③手数料を差引いた金額を車両所有者様へお支払い</p>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- requirement -->
                <div class="category row">
                    <div class="category-title">
                        <h3>必要条件</h3>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="sh-require">
                                <p>1)実際に運送業を生業としていること</p>
                                <p>2)主たる事務所が日本国内であること</p>
                                <p>3)主たる事業が運送業であること</p>
                                <p>4)実店舗を有していること</p>
                                <p>5)保有している在庫を掲載していただくこと</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- exam -->
                <div class="category row">
                    <div class="category-title">
                        <h3>審査</h3>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="sh-exam">
                                <p>登録お申込み後、審査の結果、お断りする場合があります。予めご了承ください。</p>
                                <p>審査の内容は一切お答え致しかねます。</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- flow -->
                <div class="category row">
                    <div class="category-title">
                        <h3>掲載までの流れ</h3>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="sh-flow">
                                <p>①登録申込みフォームからお申込み・・・お名前・所在地、電話番号などを申込フォームで送府</p>
                                <p>②受理後、必要書類をメールにてご案案いたします。</p>
                                <p>③書類受理後、ジャパントラッカー事局にて審査</p>
                                <p>④審査後、問題なければログインパスワードとIDをメールにてご案内いたします。</p>
                                <p>⑤ご利用開始</p>
                            </div>
                            <div class="sh-application">
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
