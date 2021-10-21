<?= $form->field($model, 'thumb')
          ->widget(FileInput::Class, 
            [
                'options'       => ['accept' => 'image/*'],
                'pluginOptions' => [
    //                                  'uploadUrl'       => \yii\helpers\Url::to(['uploads']),
                                        'uploadAsync'       => false,
                                        'autoOrientImage'   => false,
                                        'showUpload'        => false,
                                        //初始值
                                        'initialPreview'    =>[
                                                "http://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/FullMoon2010.jpg/631px-FullMoon2010.jpg",
                                        ],
                                        'initialPreviewAsData'=>true,
                                        //input 显示的值
                                        'initialCaption'=>"http://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/FullMoon2010.jpg/631px-FullMoon2010.jpg",
                                    ],
                'pluginEvents' => [
                    'fileuploaded' => "function (event, data, id, index){

                        }",
                    //错误的冗余机制
                    'error' => "function (){
                            alert('图片上传失败');
                        }"
        ]
    ])?>