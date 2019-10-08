<?php

class CustomSession implements SessionHandlerInterface{
    public $link;

    public $life;

    public function open($save_path, $session_name)
    {
        $this->life=get_cfg_var('session.gc_maxlifetime');
        $this->link=mysqli_connect("localhost","root","root");
        mysqli_set_charset($this->link,"utf8");
        mysqli_select_db($this->link,"test1");
        if($this->link){
            return true;
        }else{
            return false;
        }
    }
    public function close()
    {
        mysqli_close($this->link);
        return true;
    }
    public function read($session_id)
    {
        $id=mysqli_escape_string($this->link,$session_id);
        $sql="select * from sessions where session_id='{$session_id}'";
        $res=mysqli_query($this->link,$sql);
        if(mysqli_num_rows($res)==1){
            $res=mysqli_fetch_all($res,MYSQLI_ASSOC);
            return $res;
        }
        return '';
    }
    public function write($session_id, $session_data)
    {
        $session_id=mysqli_escape_string($this->link,$session_id);
        $newexp=time()+$this->life;
        $sql="select * from sessions where session_id='{$session_id}'";
        $result=mysqli_query($this->link,$sql);
        if(mysqli_num_rows($result)==1){
            $sql="update session set session_expires='{$newexp}',session_data='{$session_data}' where session_id='{$session_id}'";
        }else{
            $sql="insert into sessions values('{$session_id}','{$session_data}','{$newexp}')";
        }
        mysqli_query($this->link,$sql);
        return mysqli_affected_rows($this->link);
    }
    public function destroy($session_id)
    {
        $session_id=mysqli_escape_string($this->link,$session_id);
        $sql="delete from sessions where session_id='{$session_id}'";
        $res=mysqli_query($this->link,$sql);
        return mysqli_num_rows($res);
    }
    public function gc($maxlifetime)
    {
        $sql="delete from sessions where session_expires <".time();
        $res=mysqli_query($this->link,$sql);

        if(mysqli_num_rows($res)>0){
            return true;
        }else{
            return false;
        }
    }
}