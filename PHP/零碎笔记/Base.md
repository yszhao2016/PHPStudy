#PHP基础
        strpos(param1,param2，param3)   从param1中的param3位置搜索param2出现的位置  返回位置
        
        strncmp(param1,param2,param3)   比较 0 相等  -1 小于  1 大于   第三个参数  规定每个字符串用于比较的字符数。

        substr(string,start,length)     截取字符串
#特殊函数

        call_user_func()       回调方法 function
        
        get_class ()  　　      获取当前调用方法的类名
        get_called_class()      获取静态方法调用的类名
        
            示例：
                    class Object
                    {
                    	public static function className()
                        {
                            return get_called_class();
                        }
                    }
                    
                    
                    class Foo{
                        public function test()
                        {
                          var_dump(get_class());      
                        }
                        public function test2()
                        {
                          var_dump(get_called_class());    
                        }
                        public static function test3()
                        {
                          var_dump(get_class());      
                        }
                        public static function test4()
                        {
                          var_dump(get_called_class());      
                        }   
                    }
                    
                    class B extends Foo{}
                    
                    $B=newB();　　
                    $B->test();　　// string'Foo'(length=3)
                    $B->test2();　 // string'B'(length=1)
                    Foo::test3();　// string'Foo'(length=3)　
                    Foo::test4();　// string'Foo'(length=3)　
                    B::test3();　　//  string'Foo'(length=3)
                    B::test4();　　//  string'B'(length=1)


        array_unshift()


#正则表达式
    
    preg_replace('/<img.*?class="bbcode-img".*?src="(.*?)".*?>/','<a class="fancybox-effects-a"  href="\\1">\\0</a>',$res['message'])