<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //验证请求参数
        $request->validate([
            'id' => 'required|integer|unique:users,id',
            'uid' => 'required|unique:users|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'avatar' => 'url',
            'alt' => 'url' ,
            'created' => 'required|date',
            // 'loc_id' => 'required|',
            // 'loc_name' => 'required|',
            // 'desc' => 'text',
            // 密码只能是6-8位的字母和数字组合构成
            'password' => 'required|regex:/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,8}$/',
        ]);
        // 存入数据库
        $user = new User;
        $form = $request->only([
             'id',
             'uid',
             'name',
             'email',
             'avatar',
             'alt',
             'created',
             'loc_id',
             'loc_name',
             'desc',
             'password',
        ]);
        
        foreach($form as $key => $value) {
            $user ->$key = $value;
        }

        $user->save();
        // 返回数据
        return [
            'code' => '200ok'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
