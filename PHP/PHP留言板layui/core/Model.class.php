<?php
/**
 * Created by PhpStorm.
 * User: phpteach.com
 * Date: 2019/06/20
 * Time: 17:42
 */
class Model{

    private $conn;
    private $result;

    public function __construct(){
        $this->conn=@mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
        if (@mysqli_connect_errno($this->conn))
        {
            echo "连接 MySQL 失败: " . mysqli_connect_error();
        }
        mysqli_set_charset($this->conn, "utf8");
    }

    /**
     * 执行操作
     * @param $sql
     * @return bool|mysqli_result
     */
    public function query($sql){
        $this->result=mysqli_query($this->conn,$sql);
        if($this->result){
            return $this->result;
        }else{
            printf("Error: %s\n", mysqli_error($this->conn));
            die;
        }
    }
    /**
     * 获取一条数据
     * @param $sql
     * @return array|null
     */
    public function getone($sql){
        $this->query($sql);
        $rows = mysqli_fetch_array($this->result);
        return $rows;
    }

    /**
     * 获取所有数据
     * @param $sql
     */
    public function getAll($sql){
        $this->query($sql);
        $rs = array();
        while($rows = mysqli_fetch_array($this->result)){
            $rs[] = $rows;
        }
        return $rs;
    }

    /**
     * 插入数据操作
     * @param $tablename
     * @param $insertsqlarr
     * @param int $returnid
     * @return int|string
     */
    function inserttable($tablename, $insertsqlarr, $returnid=true) {
        $insertkeysql = $insertvaluesql = $comma = '';
        foreach ($insertsqlarr as $insert_key => $insert_value) {
            $insertkeysql .= $comma.'`'.$insert_key.'`';
            $insertvaluesql .= $comma.'\''.$insert_value.'\'';
            $comma = ', ';
        }
        $this->query('INSERT INTO '.$tablename.' ('.$insertkeysql.') VALUES ('.$insertvaluesql.')');
        if($returnid) {
            return mysqli_insert_id($this->conn);
        }
    }

    /**
     * 更新数据
     * @param $tablename
     * @param $setsqlarr
     * @param $wheresqlarr
     */
    function updatetable($tablename, $setsqlarr, $wheresqlarr) {
        $setsql = $comma = '';
        foreach ($setsqlarr as $set_key => $set_value) {
            $setsql .= $comma.'`'.$set_key.'`'.'=\''.$set_value.'\'';
            $comma = ', ';
        }
        $where = $comma = '';
        if(empty($wheresqlarr)) {
            $where = '1';
        } elseif(is_array($wheresqlarr)) {
            foreach ($wheresqlarr as $key => $value) {
                $where .= $comma.'`'.$key.'`'.'=\''.$value.'\'';
                $comma = ' AND ';
            }
        } else {
            $where = $wheresqlarr;
        }
        $result=$this->query('UPDATE '.$tablename.' SET '.$setsql.' WHERE '.$where);
        return $result;
    }


    /**
     * 删除数据
     * @param $table
     * @param $wheresqlarr
     * @return mixed
     */
    function delete($table,$wheresqlarr){
        $where = $comma = '';
        if(is_array($wheresqlarr)) {
            foreach ($wheresqlarr as $key => $value) {
                $where .= $comma.'`'.$key.'`'.'=\''.$value.'\'';
                $comma = ' AND ';
            }
        } else {
            $where = $wheresqlarr;
        }
        $this->query('DELETE FROM '.$table.' WHERE '.$where);
        return $this->result;
    }

}