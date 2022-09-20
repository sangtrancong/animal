<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Port;
use App\Models\VisitHistory;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countDay=visits('App\Models\Port')->period('day')->count();
        $countMounth=visits('App\Models\Port')->period('month')->count();
        $countSum=visits('App\Models\Port')->count();
        $year=date("Y");
        $data=VisitHistory::whereYear('date',$year)->select(DB::raw('sum(count) as `data`'),  DB::raw('YEAR(date) year, MONTH(date) month'))
        ->groupby('year','month')
        ->get()->toArray();
        $arr=array();
        foreach ($data as $key => $value) {
            $arr[$value['month']]=$value['data'];
        }
        for ($i=1; $i < 13; $i++) {
            if(!isset($arr[$i])){
                $arr[$i]=0;
            }
        }


        return view('adminView.report.list')->with(['countDay'=>$countDay,'countMounth'=>$countMounth,'countSum'=>$countSum,'data'=>$arr]);
    }
    public function detail(){
        $data=VisitHistory::all();
        return view('adminView.report.detail')->with(['data'=>$data]);
    }


}
