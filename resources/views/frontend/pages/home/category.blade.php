<div class="list-title">
    <h3>中古トラックを探す</h3>
    <p>現在の登録台数：<span>{{$vehicle_count}}</span>台</p>
</div>
<div class="category row">
    <div class="category-title">
        <i class="fa fa-search"></i>
        <h3>ボディタイプで探す</h3>
    </div>
    @foreach ($body_lists as $key=>$body_list)
    <div class="col-md-2 car-list-info">
        <a href="{!! route('bodycategory', ['name' => $body_list['link']]) !!}">
            <img src="{{asset($body_list['img'])}}" alt="">
            <p>{{$body_list['name']}}</p>
        </a>
    </div>
    @endforeach
    <div class="read-more mt-2">
        <a href="#" class="btn btn-primary" type="submit">リース</a>
    </div>
</div>