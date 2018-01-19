[Offical Website](http://www.hlzblog.top/)

This is a project which is based on thinkphp5 framework  
Follow the [PSR-2](http://www.php-fig.org/psr/psr-2/) standor  

## Directory

    .
    ├── apidoc.json         生成api文档的配置
    ├── application         
        ├── api             --- 接口层，逻辑
        ├── command.php     
        ├── common.php      全局函数
        ├── config.php      系统配置文件
        ├── controller      --- 控制器层
        ├── database.php    数据库配置
        ├── logic           --- 逻辑层
        ├── route.php       定义的部分路由
        ├── service         --- 视图层，逻辑
        ├── tags.php
        └── view            --- 视图层
    ├── build.php
    ├── composer.json       composer依赖配置
    ├── composer.lock
    ├── download_source
    ├── extend              --- 手动引入的第三方包，引用要求PSR-4标准
    ├── gulpfile.js         前端自动化脚本
    ├── log_colored         --- 日志
    ├── __materials         
        ├── banner          --- 首页画布的PSD文件
        ├── bat             --- 开发所需脚本（windows）
        ├── CURD.php
        ├── shell           --- 开发所需脚本（Linux）
        ├── sql_baks        --- 日常备份的文件
        └── yth_blog.sql    当前项目的数据库样本
    ├── node_modules
    ├── package.json        前端开发所需依赖
    ├── package-lock.json
    ├── phpunit.xml
    ├── public              --- 静态文件目录
    ├── README.md
    ├── runtime             --- php缓存文件目录
    ├── sensitive_config.ini            敏感的配置信息，不会上传到第三方托管，但是线上环境需要
    ├── sensitive_config.ini.example    敏感的配置信息配置文件的格式
    ├── think
    ├── thinkphp
    └── vendor



## Initial Account

 * Login site /admin
 * account : admin
 * password: 123123

## About Blog
[Click here](http://www.hlzblog.top/Article/20.html)

## Ask me
[Click here](http://www.hlzblog.top/Board)

## API
The API document of this blog is based on [apidoc](http://apidocjs.com/)  

    apidoc -i application/api -o public/doc

[Click here](http://www.hlzblog.top/doc)  

## npm
When you want to run this project under the VirtualBox 

    npm install --no-bin-links