<?php
class Container
{
    public $i=1;
    private $s = array();
    public function __set($k, $c)
    {
        $this->s[$k] = $c;
    }
    public function __get($k)
    {
        return $this->build($this->s[$k]);
    }
    /**
     * 自动绑定（Autowiring）自动解析（Automatic Resolution）
     *
     * @param string $className
     * @return object
     * @throws Exception
     */
    public function build($className)
    {
        // 如果是匿名函数（Anonymous functions），也叫闭包函数（closures）
        if ($className instanceof Closure) {
            var_dump($className);exit;
            // 执行闭包函数，并将结果
            return $className($this);
        }
        /*通过反射获取类的内部结构，实例化类*/
        $reflector = new ReflectionClass($className);
        // 检查类是否可实例化, 排除抽象类abstract和对象接口interface
        if (!$reflector->isInstantiable()) {
            throw new Exception("Can't instantiate this.");
        }
        /** @var ReflectionMethod $constructor 获取类的构造函数 */
        $constructor = $reflector->getConstructor();
        // 若无构造函数，直接实例化并返回
        if (is_null($constructor)) {
            return new $className;
        }
        // 取构造函数参数,通过 ReflectionParameter 数组返回参数列表
        $parameters = $constructor->getParameters();

        // 递归解析构造函数的参数
        $dependencies = $this->getDependencies($parameters);
        // 创建一个类的新实例，给出的参数将传递到类的构造函数。
        return $reflector->newInstanceArgs($dependencies);
    }
    /**
     * @param array $parameters
     * @return array
     * @throws Exception
     */
    public function getDependencies($parameters)
    {
        $dependencies = [];
        /** @var ReflectionParameter $parameter */
        foreach ($parameters as $parameter) {
            /** @var ReflectionClass $dependency */
            $dependency = $parameter->getClass();
            if (is_null($dependency)) {
                // 是变量,有默认值则设置默认值
                $dependencies[] = $this->resolveNonClass($parameter);
            } else {
                // 是一个类，递归解析
                $dependencies[] = $this->build($dependency->name);
            }
        }
        return $dependencies;
    }
    /**
     * @param ReflectionParameter $parameter
     * @return mixed
     * @throws Exception
     */
    public function resolveNonClass($parameter)
    {
        // 有默认值则返回默认值
        if ($parameter->isDefaultValueAvailable()) {
            return $parameter->getDefaultValue();
        }
        throw new Exception('I have no idea what to do here.');
    }
}
require_once "./testclass.php"; //开始测试，先测试已知依赖关系的情况
$c = new Container();
$c->department = 'Department';
$c->company = function ($c) {
    return new Company($c->department);
};
// 从容器中取得company
$company = $c->company;
$company->doSomething(); //输出: Group:hello|Department:hello|Company:hello|
// 测试未知依赖关系，直接使用的方法
$di = new Container();
$di->company = 'Company';
$company = $di->company;
$company->doSomething();//输出: Group:hello|Department:hello|Company:hello|
