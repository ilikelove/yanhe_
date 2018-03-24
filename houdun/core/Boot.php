<?php
/**
 * 新空间
 */
    namespace houdun\core;
//引导类
    /**
     * 框架启动类
     * Class Boot
     * @package houdun\core
     */
    class Boot{
        /**
         * 执行应用
         */
        public static function run ()
        {
            self::init();
            self::appRun();
        }
        /**
         * 初始化
         * 头部声明，时区设置，开启session等
         */
        private static function init ()
        {
            header('Content-type:text/html;charset=utf8');
            date_default_timezone_set('PRC');
            session_id()||session_start();
        }
        /**
         * 执行应用（application,app）
         * 运行app/类
         */
        private static function appRun()
        {
            if(isset($_GET['s'])){
                $s =$_GET['s'];
                $info =explode ('/',$s);
                $m=$info[0];
                $c=$info[1];
                $a=$info[2];
            }else{
                $m='home';
                $c='index';
                $a='index';
            }
            define('MODULE',$m);
            define('CONTROLLER',strtolower($c));
            define('ACTION',$a);
            $controller ='\app\\'.$m.'\controller\\'.ucfirst($c).'Controller';
            echo call_user_func_array([new $controller,$a],[]);
        }
    }




















