@extends('layouts.app')

        <!-- Fonts -->
        <!--<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">-->

        <!-- Styles -->
        <style>
            

            .content {
                text-align: center;
            }

            

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 30px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
@section('content')
<div class="content">
    <table border="1" bgcolor="white" class="container-sm">
            <tr><th>氏名</th><th>時給</th><th>雇用形態</th><th>変更・削除</th></tr>
                @foreach($staffes as $staff)
                    <tr>
                    <td> {{$staff->name}} </td>
                    <td> {{$staff->wage}} 円 </td>
                    <td> {{$staff->e_status}} </td>
                    <td><a href="{{ url('/manager/staff/edit')}}?id={{$staff->id}}"> 変更・削除 </a></td>
                    </tr>
                @endforeach
    </table>
    <div class="links">
        <a href="{{ url('/manager/staff/add') }}">追加する</a>
    </div>
</div>

@endsection
