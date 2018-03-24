<?php
namespace houdun\view;
//基础类
Class Base
{
    private $file;//模版文件
    private $data = []; //存储数据

    /**
     * 加载模版
     */
    public function make($tpl = '')
    {

//        echo 111;
        include './view/welcome.php';
//    ACTION默认值是index,,CONTROLLER默认值是index,,MODULB默认值是home
        $tpl = $tpl ?: ACTION;
//        /app/home/view/index/index.php
        $this->file = '../app/' . MODULE . '/view/' . CONTROLLER . '/' . $tpl . '.php';
        return $this;
//       echo 1111;
    }
//    分配变量
    public function with($var =[]){
        $this->data=$var;
        return $this;
    }
//    当输出一个对象的时候运行
    public function __toString()
    {
//        过滤数组
        extract($this->data);
        if (!is_null($this->file)) {
            include $this->file;
        }
        return '';
    }

}


