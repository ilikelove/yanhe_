<?php
/**
 * 新空间
 */
    namespace houdun\core;
    use app\home\controller\ArticleController;
    use houdun\view\Base;
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
            //测试代码是否正常运行到这里
//            echo 'run';
//            测试助手函数是否正常加载
//            p(1);
//            初始化框架
            self::init();//设置头部，时区，打印p函数，开启session
            self::appRun();//执行系统，显示到index.php主页面里面（模版，效果，数据）进入实例化的类里面，进行操作
        }
        /**
         * 初始化
         * 头部声明，时区设置，开启session等
         */
        private static function init ()
        {
//            echo 11;
//            头部
            header('Content-type:text/html;charset=utf8');
//            设置时区
            date_default_timezone_set('PRC');
//            开启session(如果有session_id()说明已经开启session，没有sexxion_id，就开启session)cookie数据
            session_id()||session_start();
//            echo 123;
        }
        /**
         * 执行应用（application,app）
         * 运行app/类
         */
        private static function appRun()
        {

//          在app/home/controller创建两个类协助这里进行测试
//          实例化新空间里面的方法时要在空间前面加“\”，说明在根空间里面找这个空间，
//            因为新空间是一个独立的空间，不在一个空间里面找不到
//            (new \app\home\controller\IndexController())->add();
//            (new \app\home\controller\ArticleController())->index();
//            因为项目会实例化不同的类，调用不同的方法，所以类和方法不能写死
//            通过地址栏参数的变化，控制访问不同的类，调用不同的方法
//            ?m=admin&c=index&a=add(m:模块，c:控制器，a：方法)
//              ?s=admin/insex/add  使用规范的格式
//            $_GET['s']是显示在地址栏的信息，get类型的信息
            if(isset($_GET['s'])){
//                $s接受来自get的数据
                $s =$_GET['s'];
//                p($s);
//                将接受来的数据进行拆分成数组
                $info =explode ('/',$s);
                $m=$info[0];//用变量接受数组值
                $c=$info[1];
                $a=$info[2];

            }else{
                $m='home';//新空间的名字
                $c='index';//类的名字
                $a='index';//回调的方法
            }
            //  strtolower 字符串小写
            define('MODULE',$m);
            define('CONTROLLER',strtolower($c));
            define('ACTION',$a);
//            ucfirst 首字母大写
            //从\app\home\controller空间里面开始一步步延伸,当想要调用任何类与方法时从app空间调用
            $controller ='\app\\'.$m.'\controller\\'.ucfirst($c).'Controller';
//            call_user_func_array（） 调用回调函数,并把一个数组参数作为回调函数的参数
//            实例化$controller 让后回调$a方法;
//            ，[参数]，给$a方法用的参数
//            根空间里面的app\home\controller\空间里面的IndexController类
//            \app\home\controller\IndexController，$a方法，[$a参数]
            //这句代码如引子一样，引出一系列程序系统运作
            echo call_user_func_array([new $controller,$a],[]);//将所有系统运作完成后的结果显示在窗口
        }
//        private static function opo(){
//            new ArticleController();
//        }
    }




















