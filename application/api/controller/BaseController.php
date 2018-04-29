<?php
/**
 * Created by PhpStorm.
 * User: Boke
 * Date: 2018/4/27
 * Time: 21:28
 */

namespace app\api\controller;


use app\api\service\Token;
use think\Controller;

class BaseController extends Controller
{
    protected function checkPrimaryScope(){
        Token::needPrimaryScope();
    }
    protected function checkExclusiveScope(){
        Token::needExclusiveScope();
    }
}