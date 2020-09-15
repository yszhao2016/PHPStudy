创建表流程
$query->createCommand()->getRawSql()

1.yii/yii.bat   migration/create  create_xxx_table

2.migrations 目录产生相应文件



3.根据需要修改文件（如下代码示列）
    public function safeUp()
    {
        $this->createTable('{{job}}', [
            'id' => $this->primaryKey(10),
            'keyword_id' => $this->integer(10)->notNull(),
            'taskid' => $this->integer(13)->notNull(),
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{job}}');
    }





表添加字段流程

    1.yii/yii.bat   migration/create  add_created_at_to_site


    2. 文件修复示列

    public function safeUp()
    {
        $this->dropColumn('{{keyword}}', 'first_sort');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181024_015618_remove_first_sort_from_keyword_table cannot be reverted.\n";
        return false;
    }


表删除字段流程
    1.yii/yii.bat   migration/create  add_created_at_to_site


    2. 文件修复示列

         public function safeUp()
        {
            $this->dropColumn('{{keyword}}', 'first_sort');
        }

        /**
         * {@inheritdoc}
         */
        public function safeDown()
        {
            echo "m181024_015618_remove_first_sort_from_keyword_table cannot be reverted.\n";
            return false;
        }


4.yii/yii.bat   migration/up