<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0;">
        <meta name="format-detection" content="telephone=no"/>
    </head>
    <style>
        table {
            width: 80%;
            margin: 50px auto;
            caption-side: bottom;
            border-collapse: collapse;
        }
        .table-bordered, .table-bordered td, .table-bordered th {
            border: 1px solid #eff2f7;
        }
        .table>tbody {
            vertical-align: middle;
        }
        tbody, td, tfoot, th, thead, tr {
            border: 0 solid;
            border-color: inherit;
        }
        .table .table-light {
            color: #495057;
            border-color: #eff2f7;
            background-color: #f8f9fa;
        }
        .table-bordered, .table-bordered td, .table-bordered th {
            border: 1px solid #eff2f7;
        }
    </style>
    <body>
        <table class="table table-bordered">
            <thead></thead>
            <tbody>
                <!-- checkbox -->
                <tr>
                    <td class="table-light" scope="row">事業形態</td>
                    <td >{{$organ_name}} {{$personal_name}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">法人名/個人名</td>
                    <td >{{$personal_name}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">法人名/個人名ふりがな</td>
                    <td >{{$register_furigana}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">代表者名</td>
                    <td >{{$agency_name}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">代表者名ふりがな</td>
                    <td >{{$agency_firagana}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">担当者名</td>
                    <td >{{$person_name}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">担当者名ふりがな</td>
                    <td >{{$person_firagana}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">電話番号</td>
                    <td >{{$phone}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">FAX番号</td>
                    <td >{{$fax}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">E-mail</td>
                    <td >{{$email}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">URL</td>
                    <td >{{$site_url}} {{$end_time}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">営業時間</td>
                    <td >{{$start_time}} {{$end_time}}</td>
                </tr>
                <tr>
                    <td class="table-light" scope="row">定休日</td>
                    <td >{{$weekend_date}}</td>
                </tr>
            </tbody>
    </body>
</html>
