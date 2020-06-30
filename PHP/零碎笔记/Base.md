#PHP基础

    特殊函数

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
