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
//        get_called_class():获取静态绑定后的类名；
        $modelClass =get_called_class();
//        p($modelClass);//system\model\Sky 类名
//        call_user_func_array — 调用回调函数，并把一个数组参数作为回调函数的参数
//        把第一个参数作为回调函数（callback）调用，把参数数组作（param_arr）为回调函数的的参数传入。
//        p($name);//get//order//被调用的方法
//        p($arguments);// [0] => 1 //[0] => id desc 调用name方法时传的参数
//        $name 是调用的方法名
//        $arguments 调用方法时传的参数
        return call_user_func_array([new Base($modelClass),$name],$arguments);

    }
}