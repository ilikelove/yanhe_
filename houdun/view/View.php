<?php
namespace houdun\view;
//视图类
Class View{
//    当实例化一个不存在的类的时候，执行此方法
   public function __call($name,$arguments){
      return  self::parseAction($name,$arguments);
    }
//    当实例化一个不存在的静态方法时，执行此方法
    public static function __callStatic($name, $arguments)
    {
       return self::parseAction($name,$arguments);
    }
// 设置一个静态方法，在静态方法和非静态方法里面都可以调用他，
//静态方法不可以调用非静态方法
    public static function parseAction($name,$arguments){
       return call_user_func_array([new Base,$name],$arguments);
    }
}