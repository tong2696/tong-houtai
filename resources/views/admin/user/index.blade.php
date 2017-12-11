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
            <span class="am-icon-code"></span> 用户列表
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



    <div class="tpl-block">
        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-6">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <button type="submint" class="am-btn am-btn-default am-btn-success"><a href="/user/create" class="xinzeng"><span class="am-icon-plus"></span> 新增</a></button>
                        <button type="button" class="am-btn am-btn-default am-btn-secondary"><span class="am-icon-save"></span> 保存</button>
                        <button type="button" class="am-btn am-btn-default am-btn-warning"><span class="am-icon-archive"></span> 审核</button>
                        <button type="button" class="am-btn am-btn-default am-btn-danger"><span class="am-icon-trash-o"></span> 删除</button>
                    </div>
                </div>
            </div>
        <div class="am-u-sm-12 am-u-md-3">
            <div class="am-input-group am-input-group-sm">
                <input type="text" class="am-form-field">
                <span class="am-input-group-btn">
            <button class="am-btn  am-btn-default am-btn-success tpl-am-btn-success am-icon-search" type="button"></button>
          </span>
            </div>
        </div>
    </div>
	<div class="am-g">
	    <div class="am-u-sm-12">
	        <form class="am-form">
	            <table class="am-table am-table-striped am-table-hover table-main">
	                <thead>
	                    <tr>
	                        <th class="table-check"><input type="checkbox" class="tpl-table-fz-check"></th>
	                        <th class="table-id">ID</th>
	                        <th class="table-title">姓名</th>
	                        <th class="table-type">电子邮件</th>
	                        <th class="table-author">电话</th>
	                        <th class="table-date">头像</th>
	                        <th class="table-set">操作</th>
	                    </tr>
	                </thead>
                    <tbody>
                     @if(count($user) > 0)
                        @foreach($user as $k=>$v)
                        <tr>
                            <td><input type="checkbox"></td>

                            <td>{{$v ->id}}</td>
                            <td><a href="#">{{ $v -> username }}</a></td>
                            <td>{{ $v->email }}</td>
                            <td class="am-hide-sm-only">{{$v -> phone}}</td>
                            <td class="am-hide-sm-only">
                                <img src="{{ $v -> photos}}" alt="" width="70" height="45"></td>
                            <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <a href="/user/{{$v->id}}/edit" class="am-btn am-btn-default am-btn-xs am-text-secondary bianji" style=""><span class="am-icon-pencil-square-o"></span>编辑
                                        </a>

                                        <form action="" style="float: left;">
                                        <button class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><span class="am-icon-copy"></span> 复制</button>
                                        </form>

                                        <form action="/user/{{$v->id}}" style="float: left;" method="post" class="del">
                                         {{method_field('DELETE')}}
                                         {{csrf_field()}}
                                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
                                        </form>

                                    </div>
                                </div>
                            </td>
                             
                        </tr>
                          @endforeach
                       @else
                        <tr>
                            <td colspan="7" class="am-text-center">暂无数据</td>
                        </tr>
                       @endif
                        
                             
                    </tbody>
                </table>
                <div class="am-cf">

                    
                        {{ $user->appends(['num'=>$num])->links() }}
                        
                    
                </div>
                <hr>

            </form>
        </div>

        </div>
    </div>
    <div class="tpl-alert"></div>
</div>
@endsection


@section('css')
<style>
    .am-btn-group .bianji{
        background: #fff;
        color: #3bb4f2;
    }
    .am-btn-group .bianji:hover{
        color: #444;
        background-color: #d9d9d9;
    }
    .am-btn-toolbar .xinzeng{
        color: #fff;
    }
    .pagination{
        float: right;
    }
    .pagination li{
        float: left;
        width: 35px;
        height: 35px;
        border: 1px solid #999999;
        line-height: 35px;
        text-align: center;
        margin-left: 10px;
    }
</style>
@endsection

@section('js')
<script>
    $('.del').submit(function(e){
        if(!confirm('您确定要删除该用户吗?')) return false;
    })
</script>
@endsection