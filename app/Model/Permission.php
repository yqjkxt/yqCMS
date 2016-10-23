<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Permission
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $name
 * @property string $allow_url
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Permission whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Permission whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Permission whereAllowUrl($value)
 * @property integer $is_show 1:显示，0：不显示
 * @property integer $type 0:顶级菜单，1二级菜单...
 * @property integer $parent_id 上级菜单
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Permission whereIsShow($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Permission whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Permission whereParentId($value)
 */
class Permission extends Model
{
    public $guarded = [];
    public $timestamps = false;
    //

    public function parentPermission(){
        if ( $this->parent_id === 0 ){
            return '顶级权限';
        }
        return self::find($this->parent_id)->name;
    }

    public function isShow(){
        $arr = [
            0 => '否',
            1 => '是'
        ];
        return $arr[$this->is_show];
    }


    public static function rules(){
        return [
            'name' => 'required|min:2',
            'allow_url' => 'required',
        ];
    }


    public static function message(){
        return [
            'name.required' => '权限名称必填',
            'name.min' => '不能少于2个字符',
            'allow_url.required' => '链接地址必填',
        ];
    }


    /**
     * 获取当前添加栏目的类型  是几级栏目
     * @param int $parent_id
     * @return int|mixed
     */
    public static function getTypeNum( int $parent_id ){

        if( $parent_id === 0 ){
            return 0;
        }

        $parent_type = self::find($parent_id )->type;
        return $parent_type + 1;
    }


}
