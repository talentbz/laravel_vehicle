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
                    <div class="col-md-4">
                        <div class="templating-select row">
                            <div class="col-md-4 select-label">
                                <label for="" class="pt-2">メーカー</label>
                            </div>
                            <div class="col-md-8 select-box">
                                <select class="select2 form-control" name="manufacture">
                                    <option value=" いすゞ"> いすゞ</option>
                                    <option value=" 日野"> 日野</option>
                                    <option value=" 三菱ふそう">三菱ふそう</option>
                                    <option value="UDトラックス">UDトラックス</option>
                                    <option value="トヨタ">トヨタ</option>
                                    <option value="マツダ">マツダ</option>
                                    <option value="その他">その他</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- size -->
                    <div class="col-md-4">
                        <div class="templating-select row">
                            <div class="col-md-4 select-label">
                                <label for="" class="pt-2">大きさ</label>
                            </div>
                            <div class="col-md-8 select-box">
                                <select class="select2 form-control" name="size">
                                    @foreach($classes as $class)
                                        <option value="{{$class}}">{{$class}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- location -->
                    <div class="col-md-4">
                        <div class="templating-select row">
                            <div class="col-md-4 select-label">
                                <label for="" class="pt-2">地域</label>
                            </div>
                            <div class="col-md-8 select-box">
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
            <div class="col-md-12 mt-5">
                <div class="row">
                    <!-- car shape  -->
                    <div class="col-md-4">
                        <div class="templating-select row">
                            <div class="col-md-4 select-label">
                                <label for="" class="pt-2">形状</label>
                            </div>
                            <div class="col-md-8 select-box">
                                <select class="select2 form-control" name="shape">
                                    @foreach($shapes as $shape)
                                        <option value="{{$shape}}">{{$shape}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- year -->
                    <div class="col-md-8">
                        <div class="templating-year row">
                            <div class="col-md-4 select-label">
                                <label for="" class="pt-2">年式</label>
                            </div>
                            <div class="col-md-8 templating-year-select">
                                <select class="select2 form-control" name="from_year">
                                    @foreach($years as $year)
                                        <option value="{{$year}}">{{$year}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="templating-year row">
                            <div class="col-md-4 select-label">
                                <label for="" class="pt-2 select-label-mark">~</label>
                            </div>
                            <div class="col-md-8 templating-year-select">
                                <select class="select2 form-control" name="to_year">
                                    @foreach($years as $year)
                                        <option value="{{$year}}">{{$year}}</option>
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
                    <div class="col-md-4">
                        <div class="templating-select  row">
                            <div class="col-md-4 select-label">
                                <label for="" class="pt-2">走行距離</label>
                            </div>
                            <div class="col-md-8 select-box">
                                <input type="number" class="form-control" name="to_millege"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="templating-select row">
                            <div class="col-md-4 select-label">
                                <label for="" class="pt-2 select-label-mark">~</label>
                            </div>
                            <div class="col-md-8 select-box">
                                <input type="number" class="form-control" name="from_millege"/>
                            </div>
                        </div>
                    </div>
                   <div class="col-md-4"></div>
                    
                </div>
            </div>
        </div>
     
        <div class="read-more detail-search">
            <input class="btn btn-warning" type="submit" value="もっと見る" />
        </div>
    </form>
</div>

