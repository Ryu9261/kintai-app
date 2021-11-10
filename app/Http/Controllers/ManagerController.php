<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Wokers;
use App\Times;

class ManagerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('manager');
    }
    public function staff()
    {
        $user = \Auth::user();
        $staffes = Wokers::Where('user_id', $user['id'])->get();
        return view('staff', ['staffes' => $staffes]);
    }

    public function add(Request $request) {
        return view('staffAdd');
    }
    

    public function create(Request $request) {
        $user = \Auth::user();
        $this->validate($request, Wokers::$rules);
        $staff = new Wokers;
        $form = $request->all();
        unset($form['_token']);
        $staff->user_id = $user['id'];
        $staff->name = $request->name;
        $staff->e_status = $request->e_status;
        $staff->wage = $request->wage;
        $staff->save();
        return redirect('/manager/staff');
    }

    public function edit(Request $request) {
        $id = $_GET['id'];
        $staff = Wokers::Where('id', $id)->first();
        return view('staffUpdate', ['staff' => $staff]);
    }

    public function update(Request $request) {
        $id = $_GET['id'];
        $this->validate($request, Wokers::$rules);
        $staff = Wokers::Where('id', $id)->first();
        $form = $request->all();
        unset($form['_token']);
        $staff->name = $request->name;
        $staff->e_status = $request->e_status;
        $staff->wage = $request->wage;
        $staff->save();
        return redirect('/manager/staff');
    }

    public function delete(Request $request) {
        $id = $_GET['id'];
        $staff = Wokers::Where('id', $id)->first();
        $staff->delete();
        return redirect('/manager/staff');
    }

    public function wage()
    {
        $user = \Auth::user();
        $staffes = Wokers::Where('user_id', $user['id'])->get();
        $i = 0;
        foreach($staffes as $staff){
            $wages[$i] = $staff->wage * $staff->t_time;
            $i++;
        }
        $param = ['staffes' => $staffes, 'wages' => $wages];
        return view('wage', $param);
    }
    
    public function timecardStaff()
    {
        $user = \Auth::user();
        $staffes = Wokers::Where('user_id', $user['id'])->get();
        return view('timecard_staff', ['staffes' => $staffes]);
    }

    public function timecard()
    {
        date_default_timezone_set('Asia/Tokyo');
        $user = \Auth::user();
        $month = date("Y-m");
        $m = date("m");
        $staff = $_GET["staff"];
        $times = Times::Where('user_id', $user['id'])->Where('name', $staff)->Where('month', $month)->get();
        $days = count($times);
        $i=0;
        if($times != NULL){
            foreach($times as $time){
                $t_time[$i] = $time->time;
                $i++;
            }
            if(isset($t_time)){
                $total_time = array_sum($t_time);
            }else{
                $total_time = 0;      
            }

        }else{
            $total_time = 0;
        }
        $years = array('2022','2023','2024','2025');
        $monthes = array('02','03','04','05','06','07','08','09','10','11','12');
        $param = ['staff' => $staff, 'times' => $times, 'days' => $days, "total_time" => $total_time, 'years' => $years, 'monthes' => $monthes, "month" => $m];
        return view('timecard', $param);
    }
    public function timecard2(Request $request)
    {
        date_default_timezone_set('Asia/Tokyo');
        $user = \Auth::user();
        $staff = $_GET['staff'];
        $Y = $request->year;
        $m = $request->month;
        $month = $Y . "-". $m;
        $staff = $_GET["staff"];
        $times = Times::Where('user_id', $user['id'])->Where('name', $staff)->Where('month', $month)->get();
        $days = count($times);
        $i=0;
        if($times != NULL){
            foreach($times as $time){
                $t_time[$i] = $time->time;
                $i++;
            }
            if(isset($t_time)){
                $total_time = array_sum($t_time);
            }else{
                $total_time = 0;      
            }

        }else{
            $total_time = 0;
        }
        $years = array('2022','2023','2024','2025');
        $monthes = array('02','03','04','05','06','07','08','09','10','11','12');
        $param = ['staff' => $staff, 'times' => $times, 'days' => $days, "total_time" => $total_time, 'years' => $years, 'monthes' => $monthes, "month" => $m];
        return view('timecard2', $param);
    }

    public function time_edit(Request $request) {
        $id = $_GET['id'];
        $time = Times::Where('id', $id)->first();
        return view('timeUpdate', ['time' => $time]);
    }

    public function time_update(Request $request) {
        $id = $_GET['id'];
        $this->validate($request, Times::$rules);
        $time = Times::Where('id', $id)->first();
        $form = $request->all();
        unset($form['_token']);
        $time->date = $request->date;
        $time->s_time = $request->s_time;
        $time->e_time = $request->e_time;
        $time->time = $request->time;
        $time->save();
        $staff = $time->name;
        return redirect("/manager/timecard?staff=$staff");
    }

    public function time_delete(Request $request) {
        $id = $_GET['id'];
        $time = Times::Where('id', $id)->first();
        $time->delete();
        $staff = $time->name;
        return redirect("/manager/timecard?staff=$staff");
    }
}
