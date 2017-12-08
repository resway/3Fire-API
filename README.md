3Fire-API
===============
基于ThinkPHP5框架，新增了Api模块，方便快速构建基于tp5的API项目，做到开箱即用。


> ThinkPHP5的运行环境要求PHP5.4以上。

详细开发文档参考 [ThinkPHP5完全开发手册](http://www.kancloud.cn/manual/thinkphp5)

## 目录结构

初始的目录结构如下 (主要为application目录，其余目录请参考tp5文档)：

~~~
application 目录
├─application           应用目录
│  ├─api                api模块目录
│  │  ├─behavior        行为目录
|  |  |  ├─CORS.php     解决js跨域的问题
│  │  ├─controller      控制器目录
|  |  |  ├─v1           API版本
|  |  |  ├─BaseController.php     基类控制器
│  │  ├─model           模型目录
|  |  |  ├─BaseModel.php     基类模型
│  │  ├─service         service目录
│  │  ├─validate        验证器目录
|  |  |  ├─BaseValidate.php     基类验证器
│  ├─extra        扩展配置目录
│  ├─lib          扩展lib目录
│  │  ├─enum         枚举目录
│  │  ├─exception    自定义异常处理目录
|  |  |  ├─BaseException.php       基类异常类
|  |  |  ├─ExceptionHandle.php     自定义异常处理
|  |  |  ├─ParameterException.php  参数错误
|  |  |  ├─SuccessMessage.php      成功信息

~~~

