
https://www.yiichina.com/doc/guide/2.0/tutorial-i18n

languages: 代表你的应用程序应该被翻译成什么语言的一个数组;
messagePath: 存储消息文件的路径，这应与配置中 i18n 的 basePath 参数一致。
您也可以使用 './yii message/config' 命令通过 cli 动态生成带有指定选项的配置文件。 
例如，你可以像下面这样设置 languages 和 messagePath 参数：

./yii message/config --languages=de,ja --messagePath=messages path/to/config.php


配置 config/web.php


    'language' => 'zh-CN',
    'components' => [
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => \yii\i18n\PhpMessageSource::class,
                    'sourceLanguage' => 'en-US',
//                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'app' => 'app.php'   //可以加多个，是yii::t里面的第一个参数名  文件名
                    ],
                    //'basePath' => '/message', //配置语言文件路径，现在采用默认的，就可以不配置这个
                ],
            ],
        ],



config.php 所在目录  创建zh-CN文件夹

添加app.php 文件 其内容如下所示


<?php
return [
    'Sites' => '站点管理',
    'Create Site' => '创建站点',
    'Update Site' => '更新站点',
    'ID' => 'ID',
    'Name' => '名称',
    'Domain' => '域名',
    'Created At' => '创建时间',
    'Updated At' => '更新时间',
];