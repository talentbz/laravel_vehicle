
@forelse ($vehicle_infos as $key=>$vehicle_info)
    <div class="col-md-3 col-sm-3 col-xs-12 car-details">
        <div class="card p-1 border shadow-none">
            <div class="position-relative car-list-image">
                <a href="{!! route('carDetails', ['id' => $vehicle_info->vehicle_id ? $vehicle_info->vehicle_id:'#']) !!}">
                    @if($vehicle_info->car_path)
                        <img src="{{asset($vehicle_info->car_path)}}" alt="">
                    @else
                        <img src="{{URL::asset('images/photo.png')}}" alt="" >
                    @endif
                </a>
            </div>
            <div class="p-3">
                <ul class="list-inline car-info">
                    <li class="list-inline-item me-3">
                        <span class="car-price">{{number_format($vehicle_info->taxInc_price)}}万円</span>
                        <a href="#" class="badge bg-danger font-size-12 ">リースOK</a>
                    </li>
                    <li class="list-inline-item me-3">
                        <p>{{$vehicle_info->car_category}}</p>
                    </li>
                    <li class="list-inline-item me-3">
                        <p>{{$vehicle_info->model}}</p>
                    </li>
                    <li class="list-inline-item me-3">
                        <p>{{$vehicle_info->shape}}</p>
                    </li>
                    <li class="list-inline-item me-3">
                        <p><span>{{number_format($vehicle_info->mileage)}}</span>km</p>
                    </li>
                    <li class="list-inline-item me-3">
                        <p>{{$vehicle_info->start_year}} {{$vehicle_info->start_month}}</p>
                    </li>
                </ul>
                <div>
                    <!-- <a href="javascript: void(0);" class="text-primary">Read more <i class="mdi mdi-arrow-right"></i></a> -->
                </div>
            </div>
        </div>
    </div>
@empty
    <h6 class="empty-text">検索結果はありません。</h6>
@endforelse
<div class="pagination-wrapper">
    {!! $vehicle_infos->links() !!}
</div>