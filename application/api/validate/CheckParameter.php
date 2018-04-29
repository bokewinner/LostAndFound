<?php
/**
 * Created by PhpStorm.
 * User: Boke
 * Date: 2018/4/28
 * Time: 23:52
 */

namespace app\api\validate;


class CheckParameter extends BaseValidate
{
    protected $rule = [
        "id" => "require|isNotEmpty"
    ];
}