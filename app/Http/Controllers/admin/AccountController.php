<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account=Account::all();
        return view('adminView.account.list')->with('list',$account);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminView.account.addAccount');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule=[
            'username' => 'required|max:255|unique:account',
            'password'=>'required|min:8',
            'confirm_password'=>'required|same:password',
        ];
        $customMessage=[
            'username.required'=>'Nhập username!',
            'username.unique'=>'Username đã tồn tại!'
        ];
        $this->validate($request,$rule,$customMessage);
        $account = new Account();
        $account->password= Hash::make($request->password);
        $account->username=$request->username;
        $account->email=$request->email;
        $account->address=$request->address;
        $account->phone=$request->phone;
        $account->role=$request->role;
        $account->status=true;
        $result = $account->save();
        if ($result) {
            return  redirect('/admin/account');
        } else return redirect()->back()->with('erro', 'fail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account=Account::find($id);
        return view('adminView.account.editAccount')->with('account',$account);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account=Account::find($id);
        if($account!=null){
            $account->password=Hash::make('1234512345');
            $account->save();
        }
        return redirect("/admin/account");
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
        $rule=[
            'username' => 'required|max:255|unique:account,username,' .$id,

        ];
        $customMessage=[
            'username.required'=>'Nhập username!',
            'username.unique'=>'Username đã tồn tại!'
        ];
        $this->validate($request,$rule,$customMessage);
        $account = Account::find($id);
        $account->username=$request->username;
        $account->email=$request->email;
        $account->phone=$request->phone;
        $account->role=$request->role;
        $account->status=true;
        $result = $account->save();
        if ($result) {
            $newSession=Account::find(session('adminSession')[0]['id']);
            request()->session()->invalidate();
                request()->session()->push('adminSession',$newSession);
            return  redirect('/admin/account');
        } else return redirect()->back()->with('erro', 'fail');
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
    public function lock($id){
        $account=Account::find($id);
        $account->status=0;
        $result = $account->save();
        if ($result) {
            return  redirect('/admin/account');
        } else return redirect()->back()->with('erro', 'fail');

    }
    public function unlock($id){
        $account=Account::find($id);
        $account->status=1;
        $result = $account->save();
        if ($result) {
            return  redirect('/admin/account');
        } else return redirect()->back()->with('erro', 'fail');
    }
    public function changePass(){

        return view('adminView.account.changePass');
    }
    public function postChangePass(Request $request){

        // dd(session('adminSession')[0]['role']);
        $rule=[
            'oldPass'=>'required|min:8',
            'password'=>'required|min:8|different:oldPass',
            'confirmPass'=>'required|same:password',
        ];
        $customMessage=[
            'oldPass.required'=>'Nhập mật khẩu cũ!',
            'oldPass.min'=>'Mật khẩu phải nhiều hơn 8 kí tự!',
            'password.required'=>'Nhập mật khẩu mới!',
            'password.different'=>'Nhập mật khẩu mới không được trùng với mật khẩu cũ!',
            'confirmPass.required'=>'Nhập mật khẩu lần 2!',
            'confirmPass.same'=>'Mật khẩu không khớp!',

        ];
        $this->validate($request,$rule,$customMessage);
        $hashNewPass=Hash::make($request->password);

        // dd(session('adminSession')[0]['password']);
        if(!Hash::check($request->oldPass,session('adminSession')[0]['password'])){
            return back()->with('changeFail','Mật khẩu cũ không chính xác!');
        }
        else {
            $account=Account::find(session('adminSession')[0]['id']);
            $account->password=$hashNewPass;
            $result = $account->save();
            if ($result) {
                request()->session()->invalidate();
                request()->session()->push('adminSession',$account);
                return  back()->with('changeSuccess','Đổi mật khẩu thành công!');
            } else return redirect()->back()->with('erro', 'fail');
        }
    }
    public function accountPage(){
        return view('adminView.account.accountPage');
    }
    public function postAccountPage(Request $request){
        $account=Account::find(session('adminSession')[0]['id']);
        $account->email=$request->email;
        $account->phone=$request->phone;
        $account->address=$request->address;

        $result = $account->save();
        if ($result) {
            request()->session()->invalidate();
            request()->session()->push('adminSession',$account);
            return  back()->with('changeSuccess','Cập nhật thông tin thành công!');
        } else return redirect()->back()->with('erro', 'fail');

    }
}
