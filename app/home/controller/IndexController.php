<?php
//新空间
namespace app\home\controller;
//新空间里面的类
//索引控制器类
use houdun\core\Boot;
use houdun\core\Controller;
use houdun\model\Base;
use houdun\model\Model;
use houdun\view\View;
use system\model\Kkp;
use system\model\See;
use system\model\Sky;

class IndexController extends Controller {//继承模版类
    public function index()
    {
//        echo View::make("welcome");
//        $test='kkp';
//        $hd=[1,2,3];
//        $data=Model::query('select*from kkp');
//        p($data);
//        echo c();
//        p(c());
//        c('jkkj');
//        c('dage.nam.e');
//        $res=Sky::find(1);
//        p($res);
$qwe=Sky::get();
//p($qwe);
$qaz=Sky::limit(1);
//p($qaz);
$qwes=Sky::order('id desc')->limit(1)->get();
p($qwes);
//        $data = Model::query('select * from kkp');
//echo 111;
//           See::find(1);
//echo 12122;


//    public function add(){
////    echo 112;
//        $this->setRedirect()->message("漫漫人生路");
//    }

    }


}











