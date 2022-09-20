<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PortRef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortRefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = PortRef::orderby('created_at', 'DESC')->get();
        return view('adminView.portRef.list')->with('list', $list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminView.portRef.addPort');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'url'=>'required',
            'file'=>'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ];
        $customMessage = [
            'title.required' => 'Nhập tiêu đề bài viết!',
            'url.required' => 'Nhập đường dẫn liên kết đến bài viết!',
            'file.mimes'=>'Hình ảnh không hợp lệ!',
            'file.image'=>'Hình ảnh không hợp lệ!',
        ];
        $this->validate($request, $rules, $customMessage);
        $port = new PortRef();
        $image=$request->file('file');
        $storedPath=$image->store('images/portRef',['disk' => 'local']);
        if($request->hasFile('file')){
            $port->title = $request->title;
            $port->image=$storedPath;
            $port->url=$request->url;
            $port->status=true;
            $result=$port->save();
            if($result){
                return redirect('admin/portRef');
            }
        }
        else return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $port=PortRef::find($id);

        return view('adminView.portRef.portForm')->with('port',$port);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $port=PortRef::find($id);
        $result= PortRef::destroy($id);
        if($result>0){
            Storage::disk('local')->delete($port->image);
        }
        return redirect('admin/portRef');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required',
            'url'=>'required',
            'file'=>'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ];
        $customMessage = [
            'title.required' => 'Nhập tiêu đề bài viết!',
            'url.required' => 'Nhập đường dẫn liên kết đến bài viết!',
            'file.mimes'=>'Hình ảnh không hợp lệ!',
            'file.image'=>'Hình ảnh không hợp lệ!',
        ];
        $this->validate($request,$rules,$customMessage);
        $image=$request->file('file');
        $port = PortRef::find($id);
        if($request->hasFile('file')){
            $storedPath=$image->store('images/portRef',['disk' => 'local']);
            Storage::disk('local')->delete($port->image);
            $port->image=$storedPath;
        }
        $port->title = $request->title;
        $port->url=$request->url;
        $port->status=$request->status;
        $result=$port->save();
        if($result){
            return redirect('admin/portRef');
        }
        else return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
