<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $num = $request->input('num',7);
        $users = DB::table('user')->paginate($num);
        return view('admin.user.index',[
            'user'=>$users,
            'num'=>$num
        ]);

        
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取
        $data = $request->only(['username','password','email','phone',"photos"]);
        // dd($data);

        //加密密码
        $data['password']= Hash::make($data['password']);

        // dd($data);
        //文件上传
        if($request->hasFile('photos')){
           //获取文件的后缀名
            $suffix = $request->file('photos')->extension();

            //创建一个新的随机名称
            $name = uniqid('img_').'.'.$suffix;
            // dd($name);

            //文件夹路径
            $dir = './uploads/'.date('Y-m-d');
            //移动文件
            $request->file('photos')->move($dir,$name);

            //获取文件的路径
            $data['photos'] = trim($dir.'/'.$name,'.');

            // dd($data['photos']);
        }

        //将数据库插入到数据库中
        if(DB::table('user')->insert($data)){
            return redirect('/user')->with('msg','添加成功');

        }else{
            return back()->with('msg','添加失败!!!');
        }
        

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //用户修改
        $user = DB::table('user')->where('id',$id)->first();
        return view('admin.user.edit',['user'=>$user]);

        
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
        //更新
        //获取
        $data = $request->only(['username','password','email','phone',"photos"]);
        // dd($data);

        //加密密码
        $data['password']= Hash::make($data['password']);

        // dd($data);
        //文件上传
        if($request->hasFile('photos')){
           //获取文件的后缀名
            $suffix = $request->file('photos')->extension();

            //创建一个新的随机名称
            $name = uniqid('img_').'.'.$suffix;
            // dd($name);

            //文件夹路径
            $dir = './uploads/'.date('Y-m-d');
            //移动文件
            $request->file('photos')->move($dir,$name);

            //获取文件的路径
            $data['photos'] = trim($dir.'/'.$name,'.');

            // dd($date['photos']);

        }

        //将数据库插入到数据库中
        if(DB::table('user')->where('id',$id)->update($data)){
            return redirect('/user')->with('msg','修改成功');

        }else{
            return back()->with('msg','修改失败!!!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //执行删除

        if(DB::table('user')->where('id',$id)->delete()){

            return back()->with('msg','删除成功');

        }else{
            return back()->with('msg','删除失败!!!');
        }

    }
}
