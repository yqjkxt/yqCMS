<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\AdminRolePivot
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $admin_id
 * @property integer $role_id
 * @method static \Illuminate\Database\Query\Builder|\App\Model\AdminRolePivot whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\AdminRolePivot whereAdminId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\AdminRolePivot whereRoleId($value)
 */
class AdminRolePivot extends Model
{
    public $table ='admin_roles';
}
