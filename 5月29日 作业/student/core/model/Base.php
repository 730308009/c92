<?php
namespace core\model;

class Base{
    //定义pdo对象属性
    protected $pdo;
    //定义表名属性
    protected $table;
    //定义where条件属性
    protected static $where;
    //定义静态主键值属性
    protected static $pri;

    public function __construct($config,$table)
    {
        //将$table表名变成一个属性,为了后面的其他方法使用
        $this->table = $table;
        //自动调用连接数据库方法
        $this->connect($config);
    }

    /**
     * 连接数据库方法
     */
    public function connect($config){
        if (is_null($this->pdo)){
            $dsn = 'mysql:host='.$config['host'].';dbname=' . $config['dbname'];
            try{
                $this->pdo = new \PDO($dsn,$config['username'],$config['password']);
                //设置字符集
                $this->pdo->query('set names utf8');
            }catch (\PDOException $e){
                die($e->getMessage());
            }
        }
    }

    /**
     * 获取多条数据
     */
    public function get(){
        //组合sql语句,获取多条数据,可能有where条件,如果没有where条件,就是获取所有数据,如果有,就是获取满足where条件的多条数据
//        $sql = "select * from user where age > 20";
        $sql = "select * from ".$this->table . self::$where;
        //通过pdo对象调用query方法获取多条数据
        $result = $this->pdo->query($sql);
        $data = $result->fetchAll(\PDO::FETCH_ASSOC);
        //将当前$data数据存入当前对象的一个临时属性中
        $this->data = $data;
        //返回当前对象
        return $this;
    }

    /**
     *
     * 获取单条数据
     *
     * @param $pri
     * @return $this
     */
    public function find($pri){
        //获取调用表的主键名称
        $priKey = $this->getPriKey();
        //组合sql语句
//        $sql = "select * from user where id = 1";
        $sql = "select * from ".$this->table." where ".$priKey." = " . $pri;
        //调用where方法处理where属性
//        $this->where($priKey . ' = ' . $pri);
//        $sql = "select * from ".$this->table. self::$where;
        //通过pdo对象调用query方法获取多条数据
        $result = $this->pdo->query($sql);
        $data = $result->fetch(\PDO::FETCH_ASSOC);
        //将当前$data数据存入当前对象的一个临时属性中
        $this->data = $data;
        //将查找的主键的值存入当前对象的属性
        self::$pri = $pri;
        //返回当前对象
        return $this;
    }

    /**
     *
     * 获取主键名称
     *
     * @return string
     */
    public function getPriKey(){
        //组合查看表结构的sql语句
        $sql = "desc " . $this->table;
        $result = $this->pdo->query($sql);
        //循环$result,判断,如果$v里面的Key = PRI,就代表当前字段是主键
        //定义一个接收主键名称的变量
        $priKey = '';
        foreach ($result as $k => $v) {
            if ($v['Key'] == 'PRI'){
                $priKey = $v['Field'];
                break;
            }
        }
        //将主键名称返回
        return $priKey;
    }

    /**
     * 将对象数据转成数组
     */
    public function toArray(){
        return $this->data;
    }

    /**
     *
     * 组合where语句方法
     *
     * @param $where  where条件参数
     * @return $this
     */
    public function where($where){
        self::$where = " where " . $where;
        return $this;
    }

    /**
     *
     * 添加数据方法
     *
     * @param $data
     * @return mixed
     */
    public function add($data){
        //循环$data需要存入的数据
        //定义一个接收字段名的字符串
        $keyStr = '';
        //定义一个接收字段值的字符串
        $valueStr = '';
        foreach ($data as $k => $v) {
            $keyStr .= $k . ',';
            $valueStr .= '"'.$v . '",';
        }
        //将最后的逗号去掉
        $keyStr = rtrim($keyStr,',');
        $valueStr = rtrim($valueStr,',');

        //组合sql语句
        $sql = 'insert into '.$this->table.' ('.$keyStr.') values ('.$valueStr.')';
        //用pdo对象调用exec方法来完成添加
        $data = $this->pdo->exec($sql);
        //将$data返回
        return $data;
    }

    /**
     *
     * 编辑数据方法
     *
     * @param $data
     * @return mixed
     */
    public function edit($data){
        //循环$data,组合sql语句中需要的字符串
        //定义一个空字符串
        $str = '';
        foreach ($data as $k => $v){
            $str .= $k . ' = "' . $v . '",';
        }
        $str = rtrim($str,',');
        //组合sql语句
//        $sql = "update user set a = 1,b = 2 ..... where id = 1";
        //方法一
//        $sql = "update ".$this->table." set ".$str.self::$where;
        //方法二
        //获取主键名称
        $priKey = $this->getPriKey();
        $sql = "update ".$this->table." set ".$str. " where ".$priKey." = " . self::$pri;
        // p($sql);
        //使用pdo对象调用exec方法来修改数据
        $data = $this->pdo->exec($sql);
        //将$data返回
        return $data;
    }

    /**
     *
     * 删除数据方法
     *
     * @param $pri
     * @return mixed
     */
    public function delete($pri){
        //组合sql语句
        //获取主键名称
        $priKey = $this->getPriKey();
//        $sql = "delete from user where id = 1";
        $sql = "delete from ".$this->table." where ".$priKey." = " . $pri;
        //使用pdo对象调用exec方法来修改数据
        $data = $this->pdo->exec($sql);
        //将$data返回
        return $data;
    }

    /**
     *
     * 多表查询的query方法
     *
     * @param $sql
     * @return $this
     */
    public function query($sql){
        //直接使用pdo对象调用PDO的query方法获取关联表的数据
        $result = $this->pdo->query($sql);
        $data = $result->fetchAll(\PDO::FETCH_ASSOC);
        //将当前对象,将data数据存入当前对象的临时属性中
        $this->data = $data;
        return $this;
    }





}





?>