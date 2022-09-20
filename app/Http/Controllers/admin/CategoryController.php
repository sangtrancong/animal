<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

        $list = Category::all();
        return view('adminView.category.list')->with(['list' => $list]);
    }
    public function create()
    {
        return view('adminView.category.addCategory');
    }
    public function store(Request $request)
    {

        $rule=[
            'name' => 'required|max:255|unique:category',
        ];
        $customMessage=[
            'name.required'=>'Vui lòng nhập tên danh mục',
            'name.unique'=>'Tên danh mục đã tồn tại'
        ];
        $this->validate($request,$rule,$customMessage);
        $category = new Category();
        $category->name = request()->name;
        $category->description = request()->description;
        $result = $category->save();
        if ($result) {
            return  redirect('/admin/category');
        } else return redirect()->back()->with('erro', 'fail');
    }
    public function show($id){
        $category=Category::find($id);
        return view('adminView.category.categoryForm')->with('category',$category);
    }
    public function update(Request $request,$id){
        $rule=[
            'name' => 'required|max:255|unique:category,name,' .$id,
        ];
        $customMessage=[
            'name.required'=>'Vui lòng nhập tên danh mục',
            'name.unique'=>'Tên danh mục đã tồn tại'
        ];

        $this->validate($request,$rule,$customMessage);
        $category= Category::find($id);
        $category->name= $request->name;
        $category->description=$request->description;
        $result=$category->save();
        if($result){
            return redirect("admin/category");
        }
        else return redirect()->back();
    }
}
