@extends('admin.index')

@section('tpl-content')

@endsection

@section('ol')
	@if(session('msg'))
	<ol>
	    {{session('msg')}}
	</ol>
   @endif
@endsection




@section('row')
    <div class="tpl-portlet-components">
        <div class="portlet-title">
            <div class="caption font-green bold">
                <span class="am-icon-code"></span> 用户修改
            </div>
            <div class="tpl-portlet-input tpl-fz-ml">
                <div class="portlet-input input-small input-inline">
                    <div class="input-icon right">
                        <i class="am-icon-search"></i>
                        <input type="text" class="form-control form-control-solid" placeholder="搜索..."> 
                    </div>
                </div>
            </div>
        </div>
        <div class="tpl-block ">
            <div class="am-g tpl-amazeui-form">
                <div class="am-u-sm-12 am-u-md-9">
                    <form class="am-form am-form-horizontal" action="/user/{{$user->id}}" method="post" enctype="multipart/form-data">
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">姓名 / Name</label>
                            <div class="am-u-sm-9">
                                <input type="text" id="user-name" placeholder="姓名 / Name" name="username" value="{{$user->username}}">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">头像 / Photos</label>
                            <div class="am-u-sm-9">
                            	<img src="{{$user->photos}}" alt="" width="250">
                            	<p style="height: 0px;"></p>
                                <input type="file" id="user-file" class="am-input-sm" name="photos">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">密码 / Password</label>
                            <div class="am-u-sm-9">
                                <input type="password" id="user-name" placeholder="密码 / Password" name="password" value="{{$user->password}}">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">确认密码 / Password</label>
                            <div class="am-u-sm-9">
                                <input type="password" id="user-name" placeholder="密码 / Password" name="password" value="{{$user->password}}">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-email" class="am-u-sm-3 am-form-label">电子邮件 / Email</label>
                            <div class="am-u-sm-9">
                                <input type="email" id="user-email" placeholder="输入你的电子邮件 / Email" name="email" value="{{$user->email}}">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-phone" class="am-u-sm-3 am-form-label">电话 / Telephone</label>
                            <div class="am-u-sm-9">
                                <input type="tel" id="user-phone" placeholder="输入你的电话号码 / Telephone" name="phone" value="{{$user->phone}}">
                            </div>
                        </div>
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <button type="submint" class="am-btn am-btn-primary">修改</button>
                                <button type="reset" class="am-btn am-btn-primary">重置</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


@endsection