<?php

/**
 * Interface for external iterators or objects that can be iterated
 * themselves internally.
 * @link http://php.net/manual/en/class.iterator.php
 */

/**
 *
 * @author zys
 */
interface  Iterator extends Traversable
{
  
    /**
     * 获取当前内部标量指向的元素的数据
     */
    abstract public function current();
    /**
     * 获取当前标量
     */
    abstract public function key();

    /**
     * 移动到下一个标量
     */
    abstract public function next();

    /**
     * 重置标量
     */
    abstract public function rewind();

    /**
     * 检查当前标量是否有效
     */
   abstract public function valid();

}
