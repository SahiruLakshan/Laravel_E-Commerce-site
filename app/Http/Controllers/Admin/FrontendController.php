<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DB;
use Post;
class FrontendController extends Controller
{
    public function index(){
        $product= OrderItem::whereDate('created_at', date('Y-m-d'))->get();
        $date = Carbon::now();
        $dates = Carbon::createFromDate(2022, 1, 21);
        echo("<script>console.log('PHP: " . $dates . "');</script>");
        while($dates < $date){
        $monthName = $dates->format('F');
        $month = OrderItem::whereMonth('created_at', $dates->addMonth())->get();
        
        $January = OrderItem::whereMonth('created_at', 1)->count();
        $February = OrderItem::whereMonth('created_at', 2)->count();
        $March = OrderItem::whereMonth('created_at', 3)->count();
        $April = OrderItem::whereMonth('created_at', 4)->count();
        $May = OrderItem::whereMonth('created_at', 5)->count();
        $June = OrderItem::whereMonth('created_at', 6)->count();
        $July = OrderItem::whereMonth('created_at', 7)->count();
        $Auguest = OrderItem::whereMonth('created_at', 8)->count();
        $September = OrderItem::whereMonth('created_at', 9)->count();
        $October = OrderItem::whereMonth('created_at', 10)->count();
        $November = OrderItem::whereMonth('created_at', 11)->count();
        $December = OrderItem::whereMonth('created_at', 12)->count();
        return view('admin.index',compact('product','date','month','monthName','dates','January','February','March','April','May'
        ,'June','July','Auguest','September','October','November','December'));
        $dates->addMonth();
        }
    }

    // public function chart(){
    //     $datas=OrderItem::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
    //     ->groupBy('date')
    //     ->orderBy('date', 'desc')
    //     ->take(7)
    //     ->get();
    //     return view('admin.chart',compact('datas'));

    // }

       
}
