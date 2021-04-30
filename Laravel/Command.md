#laravel  命令行

    php artisan  显示所以命令行
    
    php artisan make:migration  表名/xx
        例：1.php artisan make:migration  add_xx_field_to_xx_table
                
                示例代码：
                                  Schema::table('tel_orders', function (Blueprint $table) {
                                            $table->integer('request_end_time')->comment('向上游发起请求时间')->after('buynum');
                                            $table->integer('supplier_callback_time')->comment('上游回调时间')->after('buynum');
                                   });
        
            2.php artisan make:migration  update_field_to_xx_table
                    
                    
                示例代码:  
                                  Schema::table('user_account', function (Blueprint $table) {
                                            $table->dropColumn('cellular_data');
                                            $table->dropColumn('money');
                                            $table->dropIndex(['user_id']);
                                        });
                                        
                示例代码:
                                  Schema::table('user_account', function (Blueprint $table) {
                                        $table->enum('unlimited', ['N', 'Y'])->comment('账户无限额模式')->default('N')->after('user_id');
                                        $table->integer('money', false, true)->comment('余额 分为单位100=1元')->default(0)->after('user_id');
                                        $table->foreign('user_id')->references('id')->on('users');
                                   });
                
                        
            3.php artisan make:migration  create_xxx_table
                            
                 示例代码:           
                                  Schema::create('refund_list', function (Blueprint $table) {
                                            $table->increments('id');
                                            $table->string('error')->comment('错误字符串')->default('');
                                   });
            
        .
        
        查看当前的migrate的状态     php artisan migrate:status    
        
        执行生成命令：              php artisan  migrate


