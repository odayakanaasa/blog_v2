[中文文档](README.md) | [English Document](README-en.md)  
[官方站点](http://www.hlzblog.top/)  

这个项目是基于thinkphp5框架开发的  
遵循 [PSR-2](http://www.php-fig.org/psr/psr-2/) 标准  

> 本次涉及的命令行操作，都在项目根目录下执行

## 目录结构

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
    ├── log_colored         --- 彩色日志
    ├── __materials         
        ├── banner          --- 首页画布的PSD文件
        ├── bat             --- 开发所需脚本（windows）
        ├── CURD.php
        ├── shell           --- 开发所需脚本（Linux）
        ├── sql_baks        --- 日常备份的文件
        ├── assets          --- 前端自动化
            ├── scss          --- 编译成css前的样式
            ├── js            --- 模块化打包与压缩前的js
                ├── es5            --- es6目录转化过来的es5临时代码，部分文件会被打包成模块文件到js目录去
                ├── es6            --- es6规范书写的代码
        └── yth_blog.sql    当前项目的数据库样本
    ├── node_modules
    ├── gulpfile.js         前端自动化脚本
    ├── package.json        前端开发所需依赖
    ├── package-lock.json
    ├── phpunit.xml
    ├── public              --- 静态文件目录
    ├── README.md
    ├── runtime             --- php缓存文件目录
    ├── tests               --- 单元测试文件目录
    ├── sensitive_config.ini            敏感的配置信息，不会上传到第三方托管，但是线上环境需要
    ├── sensitive_config.ini.example    敏感的配置信息配置文件的格式
    ├── think
    ├── thinkphp
    └── vendor



## 初始帐号

 * 登录入口 /admin
 * 初始帐号 : admin
 * 初始密码: 123123

## 关于博客的开发
[点此进入](http://www.hlzblog.top/Article/20.html)

## 留言给我
[点此进入](http://www.hlzblog.top/Board)

## 接口说明
本博客文档，基于[apidoc](http://apidocjs.com/)标准与生成  

    apidoc -i application/api -o public/doc

[点此查看接口文档](http://www.hlzblog.top/doc)  

## 依赖相关
当你想在 VirtualBox 下开发时  

    composer install
    npm install --no-bin-links
    gulp start

此外你可能还需要一些服务

 * redis --- 后续部分功能即将用上
 * nginx 
 * mysql --- 可能你需要一份免费的数据库服务器，目前你可以用 MaraiaDB 去替代它
 * php   --- 目前语法 在版本5.6+ 通过测试
 * node  --- If you will develop it with Gulp automation, you will need it

## 单元测试

    php think unit