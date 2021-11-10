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
    <p>スタッフ追加</p>
    <p class="cyui">※新規登録された方は最初にスタッフを追加してください</p>
    <form action="/manager/staff/add" method="post" class="container-sm">
        <table>
        @csrf
        <tr>
            <th>
            氏名:
            </th>
            <td>
            <input type="text" name="name" value="">
            </td>
        </tr>
        <tr>
            <th>
            雇用形態:
            </th>
            <td>
            <input type="text" name="e_status" value="">
            </td>
        </tr>
        <tr>
            <th>
            時給（社員以外）:
            </th>
            <td>
            <input type="text" name="wage" value="">
            </td>
        </tr>
        <tr>
            <th>
            </th>
            <td>
            <input type="submit" value="send">
            </td>
        </tr>
        </table>
  </form>
</div>

@endsection
