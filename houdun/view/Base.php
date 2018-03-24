<?php
namespace houdun\view;
//基础类
Class Base
{
    private $file;
    private $data = [];

    /**
     * 加载模版
     */
    public function make($tpl = '')
    {
        include './view/welcome.php';
        $tpl = $tpl ?: ACTION;
        $this->file = '../app/' . MODULE . '/view/' . CONTROLLER . '/' . $tpl . '.php';
        return $this;

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


