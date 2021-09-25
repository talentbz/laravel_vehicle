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
                    <div class="select-wrapper">
                        <div class="select-label">
                            <label for="" class="pt-2">メーカー</label>
                        </div>
                        <div class="select-box">
                            <select class="select2 form-control" name="manufacture" data-placeholder="すべて">
                                <option></option>
                                <option value=" すべて"> すべて</option>
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
                    <!-- size -->
                    <div class="select-wrapper">
                        <div class="select-label">
                            <label for="" class="pt-2">大きさ</label>
                        </div>
                        <div class="select-box">
                            <select class="select2 form-control" name="size" data-placeholder="大きさ">
                                <option></option>
                                <option value=" すべて"> すべて</option>
                                @foreach($classes as $class)
                                    <option value="{{$class}}">{{$class}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- location -->
                    <div class="select-wrapper">
                        <div class="select-label">
                            <label for="" class="pt-2">地域</label>
                        </div>
                        <div class="select-box">
                            <select class="select2 form-control" name="location" data-placeholder="地域">
                                <option></option>
                                <option value=" すべて"> すべて</option>
                                @foreach($areas as $area)
                                    <option value="{{$area}}">{{$area}}</option>
                                @endforeach
                            </select>  
                        </div>
                    </div>
                    <!-- car shape -->
                    <div class="select-wrapper">
                        <div class="select-label">
                            <label for="" class="pt-2">形状</label>
                        </div>
                        <div class="select-box">
                            <select class="select2 form-control" name="shape" data-placeholder="形状">
                                <option></option>
                                <option value=" すべて"> すべて</option>
                                @foreach($shapes as $shape)
                                    <option value="{{$shape}}">{{$shape}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- from year -->
                    <div class="select-wrapper">
                        <div class="select-label">
                            <label for="" class="pt-2">年式</label>
                        </div>
                        <div class="select-box">
                            <select class="select2 form-control" name="from_year" data-placeholder="選択してください">
                                <option></option>
                                @foreach($years as $year)
                                    <option value="{{$year}}">{{$year}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- to year -->
                    <div class="select-wrapper">
                        <div class="select-label">
                            <label for="" class="pt-2 to-year">~</label>
                        </div>
                        <div class="select-box">
                            <select class="select2 form-control" name="to_year" data-placeholder="選択してください">
                                <option></option>
                                @foreach($years as $year)
                                    <option value="{{$year}}">{{$year}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- from millege -->
                    <div class="select-wrapper">
                        <div class="select-label">
                            <label for="" class="pt-2">走行距離</label>
                        </div>
                        <div class="select-box">
                            <select class="select2 form-control" name="from_millege" data-placeholder="下限なし">
                                <option></option>
                                <option value="下限なし">下限なし</option>
                                <option value="50000">{{number_format(50000)}}</option>
                                <option value="100000">{{number_format(100000)}}</option>
                                <option value="200000">{{number_format(200000)}}</option>
                                <option value="300000">{{number_format(300000)}}</option>
                                <option value="400000">{{number_format(400000)}}</option>
                                <option value="500000">{{number_format(500000)}}</option>
                                <option value="600000">{{number_format(600000)}}</option>
                                <option value="700000">{{number_format(700000)}}</option>
                                <option value="800000">{{number_format(800000)}}</option>
                                <option value="900001">{{number_format(900001)}}</option>
                            </select>
                        </div>
                    </div>
                    <!-- to millege -->
                    <div class="select-wrapper">
                        <div class="select-label">
                            <label for="" class="pt-2 to-millege"> ~ </label>
                        </div>
                        <div class="select-box">
                            <select class="select2 form-control" name="to_millege" data-placeholder="上限なし">
                                <option></option>
                                <option value="上限なし">上限なし</option>
                                <option value="50000">{{number_format(50000)}}</option>
                                <option value="100000">{{number_format(100000)}}</option>
                                <option value="200000">{{number_format(200000)}}</option>
                                <option value="300000">{{number_format(300000)}}</option>
                                <option value="400000">{{number_format(400000)}}</option>
                                <option value="500000">{{number_format(500000)}}</option>
                                <option value="600000">{{number_format(600000)}}</option>
                                <option value="700000">{{number_format(700000)}}</option>
                                <option value="800000">{{number_format(800000)}}</option>
                                <option value="900001">{{number_format(900001)}}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
        <div class="read-more detail-search">
            <input class="btn btn-warning" type="submit" value="検索" />
        </div>
    </form>
</div>

