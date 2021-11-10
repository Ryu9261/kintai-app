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
        <tr><th>氏名</th><th>時給</th><th>労働時間</th><th>給与</th></tr>
            <?php $i = 0 ?>
            @foreach($staffes as $staff)
                <tr>
                    <td> {{$staff->name}} </td>
                    <td> {{$staff->wage}} 円 </td>
                    <td> {{$staff->t_time}} 時間</td>
                    <td> {{$wages[$i]}} 円</td>
                </tr>
                <?php $i++ ?>
            @endforeach
        </table>
</div>

@endsection
