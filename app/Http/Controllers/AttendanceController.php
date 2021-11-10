<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wokers;
use App\Times;

class AttendanceController extends Controller
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
        $user = \Auth::user();
        $staffes = Wokers::Where('user_id', $user['id'])->get();
        return view('attend', ['staffes' => $staffes]);
    }
    public function attend()
    {
        $user = \Auth::user();
        $month = date("Y-m");
        $staff = $_GET["staff"];
        $times = Times::Where('user_id', $user['id'])->Where('name', $staff)->Where('month', $month)->get();
        $param = ['staff' => $staff, 'times' => $times];
        return view('attendance', $param);
    }
    
    public function create()
    {
        date_default_timezone_set('Asia/Tokyo');
        $user = \Auth::user();
        $month = date("Y-m");
        $staff = $_GET['staff'];
        $times = Times::Where('user_id', $user['id'])->Where('name', $staff)->orderBy('id', 'desc')->first();
        if(!($times == NULL)){
            $max_day = $times->date;
        }else{
            $max_day = NULL;
        }
        $now_time = date("Y-m-d H:i:s");
        $time2 = date("H:i:s");
        $now_day = date("Y-m-d");
        if($max_day == NULL || $max_day->format("Y-m-d") != $now_day){
            $times = new Times;
            $times->user_id = $user->id;
            $times->name = $staff;
            $times->month = date("Y-m");
            $times->date = $now_day;
            $times->s_time = $now_time;
            $times->e_time = NULL;
            $times->time = NULL;
            $times->save();
            $coment = "出勤しました。" . " " . $now_day . " " . $time2;
        }else{
            $coment = "出勤済みです";
        }
        $times = Times::Where('user_id', $user['id'])->Where('name', $staff)->Where('month', $month)->get();
        $param = ['staff' => $staff, 'times' => $times, 'coment' => $coment];
        return view('attendance_result', $param);
    }

    public function update()
    {
        date_default_timezone_set('Asia/Tokyo');
        $user = \Auth::user();
        $month = date("Y-m");
        $staff = $_GET['staff'];
        $times = Times::Where('user_id', $user['id'])->Where('name', $staff)->orderBy('id', 'desc')->first();
        $max_e_time = $times->e_time;
        $max_s_time = $times->s_time;
        
        $now_time = date("Y-m-d H:i:s");
        $time2 = date("H:i:s");
        $now_day = date("Y-m-d");
        
        if($max_e_time == NULL){
            $times->e_time = $now_time;
            $times->save();
            $coment = "退勤しました。" . " " . $now_day . " " . $time2; 


            $times = Times::Where('user_id', $user['id'])->Where('name', $staff)->orderBy('id', 'desc')->first();
            $max_e_time = $times->e_time;
            $timestamp = strtotime($max_e_time) - strtotime($max_s_time);
            $timestamp2 = $timestamp / 3600;
            $timestamp3 = floor($timestamp2 * 10)/10;
            
            $time = $_POST['time'];
            $time = (float)$time;
    
            if(preg_match('/[0-9]+\.[5-9]/',$timestamp3)){
                $timestamp4 = floor($timestamp3)+0.5;
                //$timestamp5 = $timestamp4 - 1.5;
                if($time == NULL){
                    $time = 0;
                }else if(!($time == NULL)){
                    $timestamp5 = (float)$timestamp4 - (float)$time;
                }
            }else if(preg_match('/([0-9]+)|([0-9]+\.[0-4])/',$timestamp3)){
                $timestamp4 = floor($timestamp3);
                //$timestamp5 = $timestamp4 - 1.5;
                if($time == NULL){
                    $time = 0;
                    $timestamp5 = $timestamp4 - $time;
                }else if(!($time == NULL)){
                    $timestamp5 = (float)$timestamp4 - (float)$time;
                }
                
            }
            if($timestamp5 < 0){
                $timestamp5 = 0;
            }
            $times->time = $timestamp5;
            $times->save();

            $times = Times::Where('user_id', $user['id'])->Where('name', $staff)->Where('month', $month)->get();
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
            
            $works = Wokers::Where('user_id', $user['id'])->Where('name', $staff)->first();
            $works->t_time = $total_time;
            $works->save();
        }else{
            $max_date = $times->e_time->format("Y-m-d");
            if($max_date == $now_day){
                $coment = "退勤済みです。";
            }else{
                $coment = "出勤していません。"; 
            }
        } 
        
        $times = Times::Where('user_id', $user['id'])->Where('name', $staff)->Where('month', $month)->get();
        $param = ['staff' => $staff, 'times' => $times, 'coment' => $coment];
        return view('attendance_result', $param);
    }

    public function delete()
    {
        $user = \Auth::user();
        $month = date("Y-m");
        $staff = $_GET['staff'];
        $times = Times::Where('user_id', $user['id'])->Where('name', $staff)->orderBy('id', 'desc')->first();
        $times->delete();

        $times = Times::Where('user_id', $user['id'])->Where('name', $staff)->Where('month', $month)->get();
        $coment = "一番新しい出勤情報を削除しました。";
        $param = ['staff' => $staff, 'times' => $times, 'coment' => $coment];
        return view('attendance_result', $param);
    }
}
