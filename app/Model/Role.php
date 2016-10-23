<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Role
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $name
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Role whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Role whereName($value)
 */
class Role extends Model
{
    public $timestamps = false;
}
