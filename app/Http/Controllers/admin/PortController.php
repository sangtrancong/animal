<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Port;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use stdClass;


class PortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Port::orderby('created_at', 'DESC')->get();
        return view('adminView.port.list')->with('list', $list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminView.port.addPort');
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
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ];
        $customMessage = [
            'title.required' => 'Nhập tiêu đề bài viết!',
            'file.mimes' => 'Hình ảnh không hợp lệ!',
            'file.image' => 'Hình ảnh không hợp lệ!',
        ];
        $this->validate($request, $rules, $customMessage);
        $port = new Port();
        $image = $request->file('file');
        $storedPath = $image->store('images/port', ['disk' => 'local']);
        if ($request->hasFile('file')) {
            $port->title = $request->title;
            $port->video_url = $request->video_url;
            $port->category_id = $request->category_id;
            $port->short_content = $request->short_content;
            $port->content = $request->content;
            $port->image = $storedPath;
            $port->status = true;
            $result = $port->save();
            if ($result) {
                return redirect('admin/port');
            }
        } else return redirect()->back();
    }

    public function imageUpload(Request $request)
    {
        dd($request->all());
        // // Allowed extentions.
        // $allowedExts = array("gif", "jpeg", "jpg", "png");

        // // Get filename.
        // $temp = explode(".", $_FILES["image_param"]["name"]);

        // // Get extension.
        // $extension = end($temp);

        // // An image check is being done in the editor but it is best to
        // // check that again on the server side.
        // // Do not use $_FILES["file"]["type"] as it can be easily forged.
        // $finfo = finfo_open(FILEINFO_MIME_TYPE);
        // $mime = finfo_file($finfo, $_FILES["image_param"]["tmp_name"]);

        // if ((($mime == "image/gif")
        //         || ($mime == "image/jpeg")
        //         || ($mime == "image/pjpeg")
        //         || ($mime == "image/x-png")
        //         || ($mime == "image/png"))
        //     && in_array($extension, $allowedExts)
        // ) {
        //     // Generate new random name.
        //     $name = sha1(microtime()) . "." . $extension;

        //     // Save file in the uploads folder.
        //     move_uploaded_file($_FILES["image_param"]["tmp_name"], getcwd() . "/public/images/" . $name);

        //     // Generate response.
        //     $response = new stdClass;
        //     $response->link = "/public/images/" . $name;
        //     echo stripslashes(json_encode($response));
        // }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $port = Port::find($id);
        return view('adminView.port.portForm')->with('port', $port);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $port = Port::find($id);
        $result = Port::destroy($id);
        if ($result > 0) {
            Storage::disk('local')->delete($port->image);
        }
        return redirect('admin/port');
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
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'

        ];
        $customMessage = [
            'title.required' => 'Tiêu đề không được để trống!',
            'file.mimes' => 'Hình ảnh không hợp lệ!',
            'file.image' => 'Hình ảnh không hợp lệ!',
        ];
        $this->validate($request, $rules, $customMessage);
        $image = $request->file('file');
        $port = Port::find($id);
        if ($request->hasFile('file')) {
            $storedPath = $image->store('images/port', ['disk' => 'local']);
            Storage::disk('local')->delete($port->image);
            $port->image = $storedPath;
        }
        $port->title = $request->title;
        $port->video_url = $request->video_url;
        $port->category_id = $request->category_id;
        $port->short_content = $request->short_content;
        $port->content = $request->content;
        $port->status = $request->status;
        $result = $port->save();
        if ($result) {
            return redirect('admin/port');
        } else return redirect()->back();
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
    public function hightlight($id)
    {
        $port = Port::find($id);
        if ($port->status == 1) {
            $port->status = 2;
            $result = $port->save();
            if ($result) {
                return redirect('admin/port');
            }
        }
        if ($port->status == 2) {
            $port->status = 1;
            $result = $port->save();
            if ($result) {
                return redirect('admin/port');
            }
        }
    }
}
