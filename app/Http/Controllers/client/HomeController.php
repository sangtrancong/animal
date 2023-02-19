<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Port;
use App\Models\PortRef;
use App\Models\Product;
use App\Models\VisitHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function __construct()
    {

        $today = Carbon::now()->toDateString();
        // dd($today);
        $getDateFromDB = VisitHistory::where('date', '=', $today)->first();
        if ($getDateFromDB != null) {
            $reset = visits('App\Models\Port')->increment();
            $count = visits('App\Models\Port')->period('day')->count();
            $getDateFromDB->count = $count;
            $getDateFromDB->save();
        } else {
            $reset = visits('App\Models\Port')->period('day')->reset();
            if (visits('App\Models\Port')->period('day')->count() === 0) {
                visits('App\Models\Port')->increment();
                $count = visits('App\Models\Port')->period('day')->count();
                $visitHistory = new VisitHistory();
                $visitHistory->date = $today;
                $visitHistory->count = $count;
                $visitHistory->save();
            }
        }
    }

    public function index()
    {
        // $hotContent=Port::where('status','<>',0)->orderby('status','DESC')->orderby('updated_at','DESC')->limit(15)->get();
        $hotContent = Port::where('status', '<>', 0)->orderby('status', 'DESC')->orderby('updated_at', 'DESC')->limit(3)->get();

        $arrHotContent = $hotContent->pluck('id')->toArray();
        // dd($arrHotContent);
        $dogContent = Port::where('status', '<>', 0)->where('category_id', config('global.dog'))->whereNotIn('id', $arrHotContent)->orderby('status', 'DESC')->orderby('updated_at', 'DESC')->limit(20)->get();
        $catContent = Port::where('status', '<>', 0)->where('category_id', config('global.cat'))->whereNotIn('id', $arrHotContent)->orderby('status', 'DESC')->orderby('updated_at', 'DESC')->limit(20)->get();
        return view('client.home')->with(['hotContent' => $hotContent, 'dogContent' => $dogContent, 'catContent' => $catContent]);
    }
    public function about()
    {
        return view('client.about');
    }
    public function port()
    {
        $list = Port::where('status', '<>', 0)->orderby('status', 'DESC')->orderby('updated_at', 'DESC')->paginate(8);
        $listPortRef = PortRef::where('status', 1)->orderby('created_at', 'DESC')->limit(7)->get();
        return view('client.port')->with(['list' => $list]);
    }
    public function dogPort()
    {
        $list = Port::where('status', '<>', 0)->where('category_id', config('global.dog'))->orderby('status', 'DESC')->orderby('updated_at', 'DESC')->paginate(8);
        // $listPortRef=PortRef::where('status',1)->orderby('created_at','DESC')->limit(7)->get();
        return view('client.port')->with(['list' => $list]);
    }
    public function catPort()
    {
        $list = Port::where('status', '<>', 0)->where('category_id', config('global.cat'))->orderby('status', 'DESC')->orderby('updated_at', 'DESC')->paginate(8);
        // $listPortRef=PortRef::where('status',1)->orderby('created_at','DESC')->limit(7)->get();
        return view('client.port')->with(['list' => $list]);
    }

    public function blog()
    {

        $list = Port::where('status', '<>', 0)->where('category_id', config('global.Blog'))->orderby('status', 'DESC')->orderby('updated_at', 'DESC')->paginate(7);
        $listPortRef = PortRef::where('status', 1)->orderby('created_at', 'DESC')->limit(7)->get();
        return view('client.blog')->with(['list' => $list, 'listPortRef' => $listPortRef]);
    }
    public function portDetail($slug,Request $request)
    {
        try {
            if($request['fbclid']==null){
                $port = Port::where(['slug' => $slug])->where('status', '<>', 0)->first();
                visits($port)->increment();
                $count=visits($port)->count();
                $categoryPort = $port->category_id;
                $portOther = Port::where(['category_id' => $categoryPort])->where('status', '<>', 0)->where('id', '<>', $port->id)->orderby('created_at', 'DESC')->limit(7)->get();
                return view('client.portDetail')->with(['port' => $port, 'portOther' => $portOther,'count'=>$count]);
            }
            else {
                 return redirect(config('hostserver.domain') . 'port/' . $slug);
            }

        } catch (\Throwable $th) {
            // report($th);
            // return false;
        }
    }
    public function product(Request $request)
    {
        $product1 = Product::where(['status' => 1])->orderby('created_at', 'DESC')->offset(0)->limit(4)->get();
        $product2 = Product::where(['status' => 1])->orderby('created_at', 'DESC')->offset(4)->limit(4)->get();
        $product3 = Product::where(['status' => 1])->orderby('created_at', 'DESC')->offset(8)->limit(4)->get();
        if ($request->category == null || $request->category == 'all') {
            $products = Product::where('status', 1)->where('name', 'like', '%' . $request->productName . '%')->orderby('created_at', 'DESC')->paginate(20);
            return view('client.product')->with(['products' => $products, 'product1' => $product1, 'product2' => $product2, 'product3' => $product3]);
        } else {
            $products = Product::where(['status' => 1, 'category_id' => $request->category])->where('name', 'like', '%' . $request->productName . '%')->orderby('created_at', 'DESC')->paginate(20);
            return view('client.product')->with(['products' => $products, 'product1' => $product1, 'product2' => $product2, 'product3' => $product3]);
        }
    }
    public function autocompleteSearch(Request $request)
    {
        $query = $request->get('query');
        $filterResult = Product::where('name', 'LIKE', '%' . $query . '%')->get();
        return response()->json($filterResult);
    }
    public function contact()
    {
        return view('client.contact');
    }
    public function policy()
    {
        return view('client.policy');
    }
}
