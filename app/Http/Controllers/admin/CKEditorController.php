<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CKEditorController extends Controller
{
    public function upload( Request $request ){
        if($request->hasFile('upload')) {

            //get filename with extension
            $fileNameWithExtension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            //Upload File
            $request->file('upload')->storeAs('images/upload', $fileNameToStore,['disk' => 'local']);

            /* $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/'.$fileNameToStore);
            $msg = 'Image successfully uploaded';
            $renderHtml = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $renderHtml; */

            $CKEditorFuncNum = $request->input('CKEditorFuncNum') ? $request->input('CKEditorFuncNum') : 0;

            if($CKEditorFuncNum > 0){

                $url = asset('storage/images/upload/'.$fileNameToStore);
                $msg = 'Image successfully uploaded';
                $renderHtml = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

                // Render HTML output
                @header('Content-type: text/html; charset=utf-8');
                echo $renderHtml;

            } else {

                $url = asset('storage/images/upload/'.$fileNameToStore);
                $msg = 'Image successfully uploaded';
                $renderHtml = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
                return response()->json([
                    'uploaded' => '1',
                    'fileName' => $fileNameToStore,
                    'url' => $url
                ]);
            }

        }
    }
}
