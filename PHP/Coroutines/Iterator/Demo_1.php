<?php

/*
 *  迭代器  遍历对象
 * 
 *  Iterator接口  方法执行顺序
 * 
 *  第1步:对象初始化.
 *  start...
 *  第2步:rewind()被调用.
 *  第3步:valid()被调用.
 *  第4步:current()被调用.
 *  第5步:key()被调用.
 * 
 *  第6步:next()被调用.
 *  第7步:valid()被调用.
 *  第8步:current()被调用.
 *  第9步:key()被调用
 * 
 *  第22步:next()被调用.
 *  第23步:valid()被调用.
 *   ...end...
 */

class Number implements Iterator {

    protected $i = 1;
    protected $key;
    protected $val;
    protected $count;

    public function __construct($count) {
        $this->count = $count;
        echo "第{$this->i}步:对象初始化.\n";
        $this->i++;
    }

    
    /**
     * 重置
     */
    public function rewind() {
        $this->key = 0;
        $this->val = 0;
        echo "第{$this->i}步:rewind()被调用.\n";
        $this->i++;
    }
    
    /*
     * 向下移动到下一个元素
     */
    public function next() {
        $this->key += 1;
        $this->val += 2;
        echo "第{$this->i}步:next()被调用.\n";
        $this->i++;
    }

    /*
     * 返回当前元素的键
     */
    public function current() {
        echo "第{$this->i}步:current()被调用.\n";
        $this->i++;
        return $this->val;
    }
    
    /*
     * 返回当前元素的键
     */
    public function key() {
        echo "第{$this->i}步:key()被调用.\n";
        $this->i++;
        return $this->key;
    }
    
    /*
     * 检查当前位置是否有效
     */
    public function valid() {
        echo "第{$this->i}步:valid()被调用.\n";
        $this->i++;
        return $this->key < $this->count;
    }

}

$number = new Number(5);
echo "start...\n";
foreach ($number as $key => $value) {
    echo "{$key} - {$value}\n";
}
echo "...end...\n";
