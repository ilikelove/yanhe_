<?php
namespace houdun\model;
//模型类
class Model{
//    实例化一个没有的方法时执行的方法
    public function __call($name, $arguments)
    {
        return self::ruParse($name,$arguments);
    }
//    调用一个不存在的静态方法时执行的方法
    public static function __callStatic($name, $arguments)
    {
        return self::ruParse($name,$arguments);
    }
//    当调用一个不存在的方法时，静态或非静态，都可以调这个方法代码
    private static function ruParse($name,$arguments){
        $modelClass =get_called_class();
        return call_user_func_array([new Base($modelClass),$name],$arguments);

    }
}