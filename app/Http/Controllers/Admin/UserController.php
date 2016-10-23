<?php

namespace App\Http\Controllers\Admin;

use App\Model\Permission;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * 用户管理
 * Class UserController
 * @package App\Http\Controllers\Admin
 */
class UserController extends AdminBashController
{

    /**
     * 栏目/权限列表
     */
    public function permissionList(){

        $permissions = Permission::orderBy('id','desc')->paginate(15);

        return view('user.permission_list',[
            'permissions' => $permissions
        ]);
    }

    /**
     * 添加权限 OR Edit
     * @return int
     */
    public function permissionAdd(){

        $inputs = $this->request->input();

        if ( ( $rs = $this->validateResponse( $inputs, Permission::class ) ) !== true ){
            return $this->ajaxResponse(false,$rs);
        }
        $inputs['type'] = Permission::getTypeNum( $inputs['parent_id'] );

        if ( !isset( $inputs['id'] ) ){  //add
            if ( Permission::create($inputs) ){
                return $this->ajaxResponse(true);
            }
            return $this->ajaxResponse(false,'添加失败');
        }else{ //update
            if ( !$permission = Permission::find($inputs['id']) ){
                return $this->ajaxResponse(false,'not find');
            }
            $permission->update($inputs);
            return $this->ajaxResponse(true);
        }


    }

    public function permissionDel(){
        $id = $this->request->get('id');

        if ( !$permission = Permission::find($id) ){
            return $this->ajaxResponse(false,'not find');
        }
        $permission->delete();
        return $this->ajaxResponse(true);
    }






}
