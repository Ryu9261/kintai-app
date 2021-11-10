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
    <p><b>{{$staff}}</b></p>
    <p>{{$month}}月</p>
    <p>表示範囲を指定する</p>
        <form action="{{ url('/manager/timecard2')}}?staff={{$staff}}" method="post">
        @csrf
          <select  name="year">
            <option>2021</option>
                    @foreach($years as $year)
                      <option value='{{$year}}'>{{$year}}</option>
                    @endforeach
          </select>  
          年
          <select  name="month">
            <option>01</option>
                @foreach ($monthes as $month)
                    <option value='{{$month}}'>{{$month}}</option>";
                @endforeach
          </select>
          月
          
          <input type="submit" value="表示">
        </form>
<table border="1" bgcolor="white" class="container-sm">
    <tr><th>変更・削除</th><th>出勤日</th><th bgcolor="green">出勤時</th><th bgcolor="red">退勤時</th><th bgcolor="yellow">勤務時間</th></tr>
    @foreach($times as $time)
        <tr>
        <td><a href="{{ url('/manager/timecard/edit')}}?id={{$time->id}}">変更・削除</a></td>
        <td>{{$time->date->format("Y-m-d")}}</td>
        <td>{{$time->s_time->format("H:i:s")}}</td>
        <td>{{$time->e_time->format("H:i:s")}}</td>
        <td>{{$time->time}}</td>
        </tr>
    @endforeach
</table>
<p>出勤日数：{{$days}}日</p>
<p>総労働時間：{{$total_time}}時間</p>
</div>

@endsection
