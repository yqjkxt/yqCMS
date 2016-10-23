<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Admin
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Role[] $roles
 * @mixin \Eloquent
 * @property integer $id
 * @property string $username
 * @property string $remember_token
 * @property string $password
 * @property string $email
 * @property string $header_photo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Admin whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Admin whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Admin wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Admin whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Admin whereHeaderPhoto($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Admin whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Admin whereDeletedAt($value)
 */
class Admin extends Model
{
    public $guarded = [];

    public function roles(){
        return $this->belongsToMany( Role::class,'admin_roles','admin_id','role_id');
    }



}
