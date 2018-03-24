<?php
namespace houdun\model;
use PDO;
use Exception;
//基础类
class  Base{
    private static $pdo=null;
    private $table;
    private $where ='';
    private $order ='';
    private $limit='';
    public function __construct($class){
       self::connect();
      $this->table=strtolower(ltrim(strrchr( $class ,'\\'),'\\'));
    }
        public function where($where){
            $this->where=$where ?' where '.$where:'';
            return $this;
        }
        public function order($order){
            $this->order=$order ? ' order by ' . $order :'';
            return $this;
        }
        public function limit($limit){
            $this->limit=$limit ? ' limit ' . $limit :'';
            return $this;
        }
    public function get(){
        $sql='select * from ' . $this->table . $this->where . $this->order . $this->limit;
        return $this->query($sql);
    }
public function find($pri){

$priFiedld = $this->getPriFied();
    $sql ='select * from ' . $this->table . ' where ' . $priFiedld.'='.$pri;
    return current($this->query($sql));
}
    private function getPriFied(){
        $res=$this->query(' desc ' . $this->table);
        foreach ($res as $v){
            if($v['Key']=='PRI'){
                return $v['Field'];
            }
        }
    }
    private static function connect(){
        if(is_null(self::$pdo)){
            try{
                $dsn='mysql:host=127.0.0.1;dbname=koo';
                $dsn ='mysql:host='.c("database.host").';dbname='.c("database.dbname");
                self::$pdo =new PDO($dsn,c("database.username"),c("database.pass"));
                self::$pdo->query('set names utf8');
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }
    }
    /**
     * 执行有结果集的操作（select）
     */
    /**
     * @return null|PDO
     */
    public function query ($sql){
        try{
            $res =self::$pdo->query($sql);
            return $res->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
    public function exec($sql){
        try{
            return self::$pdo->exec($sql);
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

}


