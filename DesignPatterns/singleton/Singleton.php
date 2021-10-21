<?php

namespace  singleton;
class Singleton
{
    private static $obj;//私有化静态属性
    private function __construct(){
        //私有化构造方法
    }
    private function __clone(){
        //私有化克隆方法
    }
    //静态方法产生对象
    static public function getInstance(){
        //对象不存在new一个对象
        if(!is_object(self::$obj)){
            self::$obj = new Singleton();
        }
        return self::$obj;
    }
}