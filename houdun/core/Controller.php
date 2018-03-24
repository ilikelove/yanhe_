<?php
//core 核心
namespace houdun\core;
//控制器类
Class Controller
{
//    设置属性名
    private $url;
    /**
     * 消息提示 message
     * @param $msg 消息内容
     */
    public function message($msg)
    {
//        加载模版
        include './view/message.php';
    }
//Redirect 使改方向,重定向,.原来的地址，转发时并不通知客户机，
//对象可以存储在请求中，并发给下一个资源使用，并且完全在服务器上面进行；
//redirect(重定向):是服务器根据逻辑，发送一个状态码，告诉浏览器重新去请求那个地址，
//一般来说，浏览器会用刚才请求的所有参数重新请求
    public function setRedirect($url=''){
        if($url){
            $this->url = $url;
        }else{
            $this->url ='javascript:history.back();';
        }
        return $this;
    }
}
