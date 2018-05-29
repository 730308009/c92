<?php
namespace core\view;

class View{


    public function __call($name, $arguments)
    {
        return self::parseAction($name,$arguments);
    }


    public static function __callStatic($name, $arguments)
    {
        return self::parseAction($name,$arguments);
    }

    public static function parseAction($name,$arguments){
        //通过回调函数调用Base类里面的方法
        return call_user_func_array([new Base(),$name],$arguments);
    }


}











?>