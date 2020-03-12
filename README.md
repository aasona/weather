<h1 align="center"> weather </h1>

<p align="center"> A weather SDK.</p>

## 目录
* 项目简介及创作动机
* 项目维护、CI、依赖更新状态（如果有）
* features & 适用人群
* 运行的平台或硬件要求
* 重要依赖
* 如何安装与测试
* 使用示例及文档地址
* 贡献指南
* License
* 鸣谢
* 其它特有的信息

## 安装

```shell
$ composer require aasona/weather -vvv
```

## 配置

在使用本扩展之前，你需要去 高德开放平台 注册账号，然后创建应用，获取应用的 API Key。

## 使用
```
use aasona\weather\Weather;

$key = 'xxxxxxxxxxxxxxxxxxxxxxxxxxx';

$weather = new weather($key);

```

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/aasona/weather/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/aasona/weather/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT