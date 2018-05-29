<?php
namespace app\admin\controller;

use core\view\View;
use system\model\Grade as g;
class Grade extends Common{
    public $result;

    /**
     *
     * 班级列表方法
     *
     * @return mixed
     */
    public function index(){
        //获取班级表中的所有数据
        $data = g::get()->toArray();
        //加载班级列表模板
        return View::make()->with('grade',$data);
    }


    /**
     *
     * 加载添加班级模板
     *
     * @return mixed
     */
    public function create(){
        //加载添加班级模板
        return View::make();
    }


    public function add(){
        //获取post数据
        $post = $_POST;
        //将post数据插入grade表中
        $result = g::add($post);
        //判断返回结果是否为真,提示不同消息
        if ($result){
            return $this->redirect('index.php?s=admin/grade/index')->message('班级添加成功');
        }else{
            return $this->redirect()->message('班级添加失败');
        }
    }


    /**
     * 跳转删除方法
     */
    public function delete(){
        //获取需要删除班级的id
        $id = $_GET['id'];
        $result = g::delete($id);
        //判断返回结果是否为真,提示不同消息并跳转或返回
        if ($result){
            return $this->redirect('index.php?s=admin/grade/index')->message('班级数据删除成功');
        }else{
            return $this->redirect()->message('班级数据删除失败');
        }

    }


    public function ajaxDelete(){
        //获取get参数中的需要删除的班级id
        $id = $_GET['id'];
        //将对应$id的班级数据删除
        $result = g::delete($id);
        //判断$result返回结果是否为真,来返回给前台不同的处理结果
        if ($result){
            //如果为真,代表删除成功
            return json_encode(['valid' => 1,'message' => '班级数据删除成功']);
        }else{
            //为假,代表删除失败
            return json_encode(['valid' => 0,'message' => '班级数据删除失败']);
        }
    }
    // 修改方法
    public function update(){
        // 加载修改模板
        // post数据
         $post = $_POST;
         // git数据
         $id = $_GET['id'];
        if ($post) {

          print_r($post);
          // 查找id数字,修改相应的信息
        $result = g::find($id)-> edit($post);
          // 跳转页面
        return $this->redirect('index.php?s=admin/grade/index')->message('恭喜你,修改成功');
        
            
        }
        // echo $id;
        // 抓取对应id的参数
        $date = g::find($id)->toArray();
        echo $date['gname'];

        // 加载修改模板
       return View::make()->with('result',$date);
       
    }




}







?>