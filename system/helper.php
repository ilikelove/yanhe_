<?php
/**
 * 打印函数
 * @param $var	打印的变量
 */
function p($var){
    echo '<pre style="width: 100%;padding: 5px;background: #CCCCCC;border-radius: 5px">';
    if(is_bool ($var) || is_null ($var)){
        var_dump ($var);
    }else{
        print_r ($var);
    }
    echo '</pre>';
}

/**
 * 定义常量:IS_POST
 * 将侧是否为post请求
 */
define ('IS_POST',$_SERVER['REQUEST_METHOD']=='POST'?true:false);


function c ($var = null){
    if(is_null($var)){
        $files =glob('../system/config/*');
        $data=[];
        foreach ($files as $file){
        $content=include $file;
            $filename =basename($file,'.php');
            $data[ $filename]=$content;
        }

        return $data;
    }

    $info = explode('.',$var);


if(count ($info)==1){
        $file ='../system/config/'.$var.'.php';
        return is_file ($file) ? include $file :null;
    }
if(count ($info)==2){
    $file ='../system/config/'.$info[0].'.php';
    if(is_file ($file)){
        $data=include $file;
        return isset($data[$info[1]]) ? $data[$info[1]] : null;
    }else{
        return null;
    }

}
}








