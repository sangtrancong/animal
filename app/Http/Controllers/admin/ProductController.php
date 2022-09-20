<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        $list=Product::orderby('created_at','DESC')->get();
        return view('adminView.product.list')->with(['list'=>$list]);
    }
    public function create(){
        return view('adminView.product.addProduct');
    }
    public function store(Request $request){
        $rules=[
            'code'=>'required|unique:product',
            'name'=>'required',
            'url'=>'required',
            'file'=>'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ];
        $customMessage=[
            'code.required'=>'Mã sản phẩm không được để trống!',
            'code.unique'=>'Mã sản phẩm đã tồn tại!',
            'name.required'=>'Tên sản phẩm không được để trống!',
            'url.required'=>'Nhập đường dẫn liên kết!',
            'file.required'=>'Hình ảnh không hợp lệ!',
            'file.mimes'=>'Hình ảnh không hợp lệ!',
            'file.image'=>'Hình ảnh không hợp lệ!',
        ];
        $this->validate($request,$rules,$customMessage);
        $image=$request->file('file');
        $storedPath=$image->store('images/product',['disk' => 'local']);
        if($request->hasFile('file')){
            $product = new Product();
            $product->code=$request->code;
            $product->name=$request->name;
            $product->category_id=$request->category_id;
            $product->url=$request->url;
            $product->image=$storedPath;
            $product->status=true;
            $result=$product->save();
            if($result){
                return redirect('/admin/product');
            }

        }
        else return redirect()->back();
    }
    public function show($id){
        $product = Product::find($id);
        return view('adminView.product.productForm')->with('product',$product);
    }
    public function update(Request $request){
        $rules=[
            'code'=>'required|unique:product,code,' .$request->id,
            'name'=>'required',
            'url'=>'required',
            'file'=>'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ];
        $customMessage=[
            'code.required'=>'Mã sản phẩm không được để trống!',
            'code.uinid'=>'Mã sản phẩm đã tồn tại!',
            'name.required'=>'Tên sản phẩm không được để trống!',
            'url.required'=>'Nhập đường dẫn liên kết!',
            'file.mimes'=>'Hình ảnh không hợp lệ!',
            'file.image'=>'Hình ảnh không hợp lệ!',
        ];
        $this->validate($request,$rules,$customMessage);
        $image=$request->file('file');

        $product=Product::find($request->id);
        if($request->hasFile('file')){
            $storedPath=$image->store('images/product',['disk' => 'local']);
            Storage::disk('local')->delete($product->image);
            $product->image=$storedPath;
        }

        $product->code=$request->code;
        $product->name=$request->name;
        $product->url=$request->url;
        $product->category_id=$request->category_id;
        $product->status=$request->status;
        $result= $product->save();
        if($result){
            return redirect("admin/product");
        }
        else return redirect()->back();

    }

    public function destroy(){

    }
  public function edit($id)
    {
        $port=Product::find($id);
        $result= Product::destroy($id);
        if($result>0){
            Storage::disk('local')->delete($port->image);
        }
        return redirect('admin/product');
    }
}
