<div class="category row">
    <div class="category-title">
        <i class="fa fa-search"></i>
        <h3>フォークリフト　絞込み検索</h3>
    </div>
    <div class="col-md-12 car-list-info mb-5">
        <a href="{!! route('bodycategory', ['name' => 'フォークリフト']) !!}">
            <img src="{{asset('/images/frontend/home/car-list/13.png')}}" alt="">
            <p>フォークリフト</p>
        </a>
    </div>
    <form action="{{route('forklift.search')}}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <!-- manufacture -->
                    <div class="col-md-4">
                        <div class="templating-select row">
                            <div class="col-md-4">
                                <label for="" class="pt-2">メーカー</label>
                            </div>
                            <div class="col-md-8">
                                <select class="select2 form-control" name="manufacture">
                                    <option value="トヨタ">トヨタ</option>
                                    <option value="コマツ">コマツ</option>
                                    <option value="住友">住友</option>
                                    <option value="三菱">三菱</option>
                                    <option value="ユニキャリア">ユニキャリア</option>
                                    <option value="TCM">TCM</option>
                                    <option value="その他">その他</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- loading capacity -->
                    <div class="col-md-4">
                        <div class="templating-select row">
                            <div class="col-md-4">
                                <label for="" class="pt-2">最大積載量</label>
                            </div>
                            <div class="col-md-8">
                                <select class="select2 form-control" name="loading_capacity">
                                    <option value="1000">1000kg未満</option>
                                    <option value="2000">1000kg以上～2000kg未満</option>
                                    <option value="3000">2000kg以上～3000kg未満</option>
                                    <option value="4000">4000kg以上</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- fule -->
                    <div class="col-md-4">
                        <div class="templating-select row">
                            <div class="col-md-4">
                                <label for="" class="pt-2">燃料</label>
                            </div>
                            <div class="col-md-8">
                                <select class="select2 form-control" name="fule">
                                    <option value="ガソリン">ガソリン</option>
                                    <option value="軽油">軽油</option>
                                    <option value="バッテリー">バッテリー</option>
                                    <option value="その他">その他</option>
                                </select>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
         
        </div>
        <div class="read-more detail-search">
            <input class="btn btn-warning" type="submit" value="もっと見る" />
        </div>
    </form>
</div>

