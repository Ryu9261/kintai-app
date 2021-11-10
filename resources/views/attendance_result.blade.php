@extends('layouts.app')

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            

            .links > a{
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
    

    <div class="links">
        
            <p><b>{{$staff}}</b></p>
            
            <table border="1" bgcolor="white" class="container-sm">
            <tr><th bgcolor="green">出勤</th><th bgcolor="red">退勤</th></tr>
                @foreach($times as $time)
                    <tr>
                        <td>{{$time->s_time}}</td>
                        <td>{{$time->e_time}}</td>
                    </tr>
                @endforeach
            </table>
            <p class="cyui">{{$coment}}</p>
            <form action="{{url('/attend/attendance/update')}}?staff={{$staff}}" method="post">
            @csrf
                <label>休憩時間：</label>
                <input type="text" name="time" size="1px">時間
                <p class="cyui">退勤時に休憩時間を打ち込んでから退勤してください。<br>例　1時間➡1，1時間30分➡1.5</p>
                <div class="container-xl">
                <a href="{{ url('/attend/attendance/edit') }}?staff={{$staff}}" class="btn btn-primary">出勤</a>
                <!--<input type="hidden" value="{{$staff}}">-->
                <input type="submit" class="btn btn-primary" value="退勤">
                <!--<a href="{{ url('/attend/attendance/update') }}?staff={{$staff}}">退勤</a>-->
            </form>
                <a id="btn" href="{{ url('/attend/attendance/delete') }}?staff={{$staff}}" class="btn btn-primary">出勤/退勤消去</a>
                <!--<script>
                    var btn = document.getElementById('btn');
                    
                    btn.addEventListener('click', function() {
                    
                        window.confirm('最新の出勤情報を削除しますか？');
                    
                    })
                </script>-->
                <a href="{{ url('/attend') }}" class="btn btn-primary">スタッフ一覧へ</a>
            </div>
    </div>
</div>
<script>
var btn = document.getElementById('btn');
 
 btn.addEventListener('click', function() {
  
     window.confirm('最新の出勤情報を削除しますか？');
  
 })
</script>
@endsection
