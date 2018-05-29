<?php
namespace app\admin\controller;

use core\view\View;
use system\model\Stu as u;
class User extends Common{

    /**
     * 修改后台用户密码
     */
    public function changePassword(){
        if ($_POST){
            $post = $_POST;
            //判断输入的原密码是否和数据库中当前用户的密码一样,如果不一样,提示并返回
            //去数据库中查找当前用户的数据
            $userInfo = u::find($_SESSION['uid'])->toArray();
            if ($userInfo['password'] != md5($post['oldPassword'])){
                return $this->redirect()->message('原密码输入错误,你是本人吗?');
            }
            //判断两次密码是否相同,如果不相同,提示并返回
            if ($post['password'] != $post['password2']){
                return $this->redirect()->message('两次密码输入不一致,<br/><br/>你要我给你保存哪个呢?');
            }
            //判断新密码的位数是否在6-20位之间,如果不满足,提示并返回
            if (strlen($post['password']) > 20 || strlen($post['password']) < 6){
                return $this->redirect()->message('密码长度必须在6-20位之间!');
            }
            //修改当前用户的密码
            $data = [
                'password' => md5($post['password']),
            ];
            $result = u::edit($data);
            //判断返回值来分别进行提示和跳转
            if ($result){
                //提示修改成功并跳转
                return $this->redirect('index.php?s=admin/login/logout')->message('密码修改成功');
            }else{
                return $this->redirect()->message('密码修改失败');
            }
        }
        //加载修改密码模板
        return View::make();
    }








}








?>