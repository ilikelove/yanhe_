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


//设置函数 c (config的首字母)；
function c ($var = null){
    if(is_null($var)){   // 调用c函数参数为空时，加载所有的默认配置数据
//        将config目录里面文件扫描出来
        $files =glob('../system/config/*');
//        p($files);
//    声明一个空数组，用来存储处理后的数据
        $data=[];
//        循环$files里面的数据
        foreach ($files as $file){
//            p($file);
//   用变量接受加载的文件内容，一维关联数组
        $content=include $file;
//        p($content);//一维数组
//        将文件名去掉后缀截取出来，作为数组下标
            $filename =basename($file,'.php');//获取文件名
//           p($filename);//database //view
//            strpos 查找字符串首次出现的位置
//        $position =strpos($filename,'.php');//获取‘.php’的位置
//        p($position);//8//4
////            substr 从字符串的某一个位子开始截取字符串多少个字符
//            $index =substr ($filename,0,$position);
//            p($index);//database//view
//            $data[$index]=$content;
//            p($data[$index]);//一维关联数组
            $data[ $filename]=$content;
//            p($data[ $filename]);
        }
//        p($data);
        return $data;  //二维关联数组
    }
//    p($var);die;
//    将var按照‘.’explode拆分成数组
    $info = explode('.',$var);

//    p($info);//NULL
//    count 计算，数数
//    p(count($info));//2
if(count ($info)==1){
//如果拆分后的数组是一个下标的话
//调用（c('database）），加载database所有的配置项数据
        $file ='../system/config/'.$var.'.php';
//    如果它是个文件加载文件，不是的话就返回null;
        return is_file ($file) ? include $file :null;
    }
if(count ($info)==2){
// 如果拆分后的数组是两个下标
//   说明调用（c(database.name)）,加载database里的name这一项的值 database数组里面的name
    $file ='../system/config/'.$info[0].'.php';
//    p($file);die;
    if(is_file ($file)){//判断是否是一个文件
//        p($file);die;
        $data=include $file;//如果成立的话数据库就加载文件
//        p($data);
        return isset($data[$info[1]]) ? $data[$info[1]] : null;
    }else{
        return null;//如果不成立的话就返回null
    }

}
}








