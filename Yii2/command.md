GII 命令的用法

    console 命令行创建控制器
    php yii gii/controller --controllerClass=IndexController --controllerClass=console\controllers\IndexController
　　

    console 命令行创建模型
    php yii gii/model --ns=common\\models --modelClass=AdminLog --tableName=admin_log
　　


    生成crud
    php yii gii/crud --modelClass=common\\models\\Hehe --controllerClass=backend\\controllers\\HeheController --viewPath=@backend/views/hehe