@extends('layouts.main')

@section('main_body')
    <div class="row">
        <div class="btn-group btn-group-sm btn" style="padding: 0px 0px 15px 15px;">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-Modal">添加</button>
        </div>
    </div>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>权限名称</th>
            <th>上级权限</th>
            <th>是否显示</th>
            <th>链接地址</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $permissions as $permission )
            <tr>
                <td data-key="id:false">{{ $permission->id }}</td>
                <td data-key="name">{{ $permission->name }}</td>
                <td data-key="parent_id:select" data-key-value="{{ $permission->parent_id }}">{{ $permission->parentPermission() }}</td>
                <td data-key="is_show:radio" data-key-value="{{ $permission->is_show }}">{{ $permission->isShow() }}</td>
                <td data-key="allow_url">{{ $permission-> allow_url }}</td>
                <td>
                    <div class="btn-group">
                        <button type="button" data-target="#add-Modal" class="btn btn-sm btn-info edit-table">编辑</button>
                        <button type="button" data-del-url="{{ url()->route('admin.permission_del') }}?id={{ $permission->id }}" class="btn btn-sm btn-danger del-table">删除</button>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $permissions->links() }}

    <!-- Modal -->
    <div class="modal fade" id="add-Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="form-horizontal" role="form" method="post" action="{{ url()->route('admin.permission_add') }}">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">添加权限</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">权限名称</label>
                            <div class="col-sm-5">
                                <input type="text" name="name" class="form-control" placeholder="权限名称">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">链接地址</label>
                            <div class="col-sm-5">
                                <input type="text" name="allow_url" class="form-control" placeholder="链接地址">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">上级权限</label>
                            <div class="col-sm-5">
                                <select name="parent_id" class="form-control">
                                    <option value="1">顶级菜单</option>
                                    <optgroup label="用户管理">
                                        <option value="0">权限列表</option>
                                        <option>用户列表</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">是否显示</label>
                            <div class="col-sm-5">
                                <label class="radio-inline">
                                    <input type="radio" name="is_show" value="1" checked> 是
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="is_show" value="0"> 否
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button type="button" class="btn btn-primary submit">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection