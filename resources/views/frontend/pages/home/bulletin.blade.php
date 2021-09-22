
    <div class="table-responsive"> 
        <table id="datatable" class="table align-middle table-nowrap">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
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
    <!-- <div class="read-more">
        <a href="#" class="btn btn-primary" type="submit">もっと見る</a>
    </div> -->
<script>
    home_url = "{{route('home')}}";
</script>