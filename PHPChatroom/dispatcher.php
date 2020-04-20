<?php


/**
 * 用于实现公聊私聊的特定发送服务。
 * */
class Dispatcher
{

    const CHAT_TYPE_PUBLIC = "publicchat";
    const CHAT_TYPE_PRIVATE = "privatechat";

    public function __construct($frame)
    {
        $this->frame = $frame;
        var_dump($this->frame);
        $this->clientid = intval($this->frame->fd);
        //$this->remote_addr = strval($this->frame->server['remote_addr']);
        //$this->remote_port = intval($this->frame->server['remote_port']);
    }

    public function parseChatData()
    {
        $framedata = $this->frame->data;
        $ret = array(
            "chattype" => self::CHAT_TYPE_PUBLIC,
            "chatto" => 0,
            "chatmsg" => "",
        );
        if ($framedata) {
            $ret = json_decode($framedata, true);
        }
        $this->chatdata = $ret;
        return $ret;
    }

    public function getSenderId()
    {
        return $this->clientid;
    }

    public function getReceiverId()
    {
        return intval($this->chatdata['chatto']);
    }

    public function isPrivateChat()
    {
        $chatdata = $this->parseChatData();
        return $chatdata['chattype'] == self::CHAT_TYPE_PUBLIC ? false : true;
    }

    public function isPublicChat()
    {
        return $this->chatdata['chattype'] == self::CHAT_TYPE_PRIVATE ? false : true;
    }

    public function sendPrivateChat($server, $toid, $msg)
    {
        if (empty($msg)) {
            return;
        }
        foreach ($server->connections as $key => $fd) {
            if ($toid == $fd || $this->clientid == $fd) {
                $server->push($fd, $msg);
            }
        }
    }

    public function sendPublicChat($server, $msg)
    {
        if (empty($msg)) {
            return;
        }
        foreach ($server->connections as $key => $fd) {
            $server->push($fd, $msg);
        }
    }
}
