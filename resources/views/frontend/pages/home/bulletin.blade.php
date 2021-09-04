<div class="category row">
    <div class="category-title row">
        <div class="col-md-10">
            <i class="fas fa-sticky-note"></i>
            <h3>掲示板情報</h3>
        </div>
        <div class="col-md-2">
            <div class="templating-select">
                <select class="select2 form-control" name="category">
                    @foreach($bulletin_categories as $bulletin_categorie)
                        <option value="{{$bulletin_categorie}}">{{$bulletin_categorie}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table align-middle table-nowrap">
            <thead>
            
            </thead>
            <tbody>
                @foreach ($bulletin_infos as $key=>$bulletin_info)
                    <tr>
                        <td>{{$bulletin_info->deadline_date}}</td>
                        <td>{{$bulletin_info->category}}</td>
                        <td>{{$bulletin_info->title}}</td>
                        <td>
                            <p class="mb-0">{{$bulletin_info->content}}</p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="read-more">
        <a href="#" class="btn btn-primary" type="submit">もっと見る</a>
    </div>
</div>