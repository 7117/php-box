<?php

class Node
{
    private $value;
    private $next;

    public function __construct($value = null)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getNext()
    {
        return $this->next;
    }

    public function setNext($next)
    {
        $this->next = $next;
    }
}

// 遍历方式，将当前节点的下一个节点缓存后更改成当前节点指针
function reverse(Node $head)
{

    if ($head == null) {
        return $head;
    }

    $pre = $head; // 取出head节点
    $cur = $head->getNext(); // 把当前节点指向下一个节点

    $next = null;
    while ($cur != null) {
        $next = $cur->getNext();
        $cur->setNext($pre); // 把当前节点的指针指向前一个节点
        $pre = $cur;
        $cur = $next;
    }

    // 将原链表的头节点的下一个节点设置为null，再把反转后的头节点赋给head
    $head->setNext(null);
    $head = $pre;

    return $head;
}

// 递归实现，在反转当前节点之前先反转后续节点
function reverse2(Node $head)
{
    if ($head == null || $head->getNext() == null) {
        return $head;
    }

    $reversedHead = reverse2($head->getNext());
    $head->getNext()->setNext($head);
    $head->setNext(null);

    return $reversedHead;
}

function test()
{
    $head = new Node(0);
    $tmp = null;
    $cur = null;

    // 构造一个长度为10的链表，保存头节点对象head
    for ($i = 1; $i < 10; $i++) {
        $tmp = new Node($i);
        if ($i == 1) {
            $head->setNext($tmp);
        } else {
            $cur->setNext($tmp);
        }
        $cur = $tmp;
    }

    $tmpHead = $head;
    while ($tmpHead != null) {
        echo $tmpHead->getValue();
        $tmpHead = $tmpHead->getNext();
    }

    echo "\n";

    $head = reverse2($head);

    while ($head != null) {
        echo $head->getValue();
        $head = $head->getNext();
    }
}

test();