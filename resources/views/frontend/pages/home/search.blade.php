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
                    <!-- car shape  -->
                    <div class="col-md-3">
                        <div class="templating-select row">
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <label for="" class="pt-2">形状</label>
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <select class="select2 form-control" name="shape">
                                    @foreach($shapes as $shape)
                                        <option value="{{$shape}}">{{$shape}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <!-- year -->
                    <div class="col-md-3">
                        <div class="templating-select row" name="from_year">
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <label for="" class="pt-2">年式</label>
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <select class="select2 form-control">
                                    @foreach($years as $year)
                                        <option value="{{$year}}">{{$year}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="templating-select row">
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <label for="" class="pt-2">~</label>
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <select class="select2 form-control" name="to_year">
                                    @foreach($years as $year)
                                        <option value="{{$year}}">{{$year}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- size -->
                    <div class="col-md-3">
                        <div class="templating-select row">
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <label for="" class="pt-2">大きさ</label>
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <select class="select2 form-control" name="size">
                                    @foreach($classes as $class)
                                        <option value="{{$class}}">{{$class}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="col-md-12 mt-5">
                <div class="row">
                    <!-- millege -->
                    <div class="col-md-3">
                        <div class="templating-select row">
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <label for="" class="pt-2">走行距離</label>
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input type="number" class="form-control" name="to_millege"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="templating-select row">
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <label for="" class="pt-2">~</label>
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input type="number" class="form-control" name="from_millege"/>
                            </div>
                        </div>
                    </div>
                    <!-- location -->
                    <div class="col-md-3">
                        <div class="templating-select row">
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <label for="" class="pt-2">地域</label>
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <select class="select2 form-control" name="location">
                                    @foreach($areas as $area)
                                        <option value="{{$area}}">{{$area}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="car-category-checkbox">
                <input type="checkbox" class="form-check-input" name="isuzu" />
                <span class="">いすゞ</span>
            </div>
            <div class="car-category-checkbox">
                <input type="checkbox" class="form-check-input" name="hino" />
                <span class="">日野</span>
            </div>
            <div class="car-category-checkbox">
                <input type="checkbox" class="form-check-input" name="fuso" />
                <span class="">三菱ふそう</span>
            </div>
            <div class="car-category-checkbox">
                <input type="checkbox" class="form-check-input" name="ud" />
                <span class="">UDトラックス</span>
            </div>
            <div class="car-category-checkbox">
                <input type="checkbox" class="form-check-input" name="toyoda" />
                <span class="">トヨタ</span>
            </div>
            <div class="car-category-checkbox">
                <input type="checkbox" class="form-check-input" name="mazda" />
                <span class="">マツダ</span>
            </div>
            <div class="car-category-checkbox">
                <input type="checkbox" class="form-check-input" name="others" />
                <span class="">その他</span>
            </div>
        </div>
        <div class="read-more detail-search">
            <input class="btn btn-warning" type="submit" value="もっと見る" />
        </div>
    </form>
</div>