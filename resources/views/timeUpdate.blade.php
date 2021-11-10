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
    <p>変更</p>
    <form action="/manager/timecard/edit?id={{$time->id}}" method="post" class="container-sm">
        <table>
        @csrf
        <tr>
            <th>
            出勤日:
            </th>
            <td>
            <input type="text" name="date" value="{{$time->date->format('Y-m-d')}}">
            </td>
        </tr>
        <tr>
            <th>
            出勤時刻:
            </th>
            <td>
            <input type="text" name="s_time" value="{{$time->s_time}}">
            </td>
        </tr>
        <tr>
            <th>
            退勤時刻:
            </th>
            <td>
            <input type="text" name="e_time" value="{{$time->e_time}}">
            </td>
        </tr>
        <tr>
            <th>
            労働時間:
            </th>
            <td>
            <input type="text" name="time" value="{{$time->time}}">
            </td>
        </tr>
        <tr>
            <th>
            </th>
            <td>
            <input type="submit" value="変更する">
            </td>
        </tr>
        </table>
  </form>
  <p>削除</p>
    <form action="/manager/timecard/delete?id={{$time->id}}" method="post" class="container-sm">
        <table>
        @csrf
        <tr>
            <th>
            出勤日:
            </th>
            <td>
            <input type="text" name="name" value="{{$time->date->format('Y-m-d')}}">
            </td>
        </tr>
        <tr>
            <th>
            </th>
            <td>
            <input type="submit" value="削除する">
            </td>
        </tr>
        </table>
  </form>
</div>

@endsection
