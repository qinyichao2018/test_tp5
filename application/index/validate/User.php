<?php
/**
 * Created by PhpStorm.
 * User: bc
 * Date: 2018/2/21
 * Time: 14:56
 */

namespace app\index\validate;


use think\Validate;

class User extends Validate
{
    protected $rule=[
        'email' => 'require|email',
        'password'  => 'require|max:25',
    ];

}