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
            $account->password=Hash::make('sangdeptrai');
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
            'password'=>'required|min:8',
        ];
        $customMessage=[
            'username.required'=>'Nhập username!',
            'username.unique'=>'Username đã tồn tại!'
        ];
        $this->validate($request,$rule,$customMessage);
        $account = new Account();
        $account->password= Hash::make($request->password);
        $account->username=$request->username;
        $account->status=true;
        $result = $account->save();
        if ($result) {
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
}
