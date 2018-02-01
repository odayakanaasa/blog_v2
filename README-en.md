> This readme file has not yet completed the complete translation
[中文文档](README.md) | [English Document](README-en.md)  
[Offical Website](http://www.hlzblog.top/)  

This is a project which is based on thinkphp5 framework  
Follow the [PSR-2](http://www.php-fig.org/psr/psr-2/) standor  

> The command line operations involved are executed in the project root directory

## Directory

    .
    ├── apidoc.json         Configuring the configuration of API documents
    ├── application         
        ├── api             --- Interface layer, logic
        ├── command.php     
        ├── common.php      Global function
        ├── config.php      Configuration system file
        ├── controller      --- Controller layer
        ├── database.php    Database configuration
        ├── logic           --- Logic layer
        ├── route.php       Defined partial routing
        ├── service         --- View layer, logic
        ├── tags.php
        └── view            --- View layer
    ├── build.php
    ├── composer.json       Composer dependency configuration
    ├── composer.lock
    ├── download_source
    ├── extend              --- Manual introduction of third party packages, reference requirements for PSR-4 standards
    ├── gulpfile.js         Front-end automation script
    ├── log_colored         --- Color log
    ├── __materials         
        ├── banner          --- The PSD file of the front page canvas
        ├── bat             --- Developing the required script (Windows)
        ├── CURD.php
        ├── shell           --- Developing the required script （Linux）
        ├── sql_baks        --- Daily backup files
        ├── assets          --- Front-end automation
            ├── scss          --- Style compiled into CSS
            ├── js            --- JS before modular packaging and compression
                ├── es5            --- The ES6 directory is converted to the Es5 temporary code, 
                                     and some of the files will be packaged into module files to the JS directory
                ├── es6            --- The code written by the ES6 specification
        └── yth_blog.sql    Database samples for current projects
    ├── node_modules
    ├── gulpfile.js         Front-end automation script
    ├── package.json        Dependence on front-end development
    ├── package-lock.json
    ├── phpunit.xml
    ├── public              --- Static file directory
    ├── README.md
    ├── runtime             --- PHP cache file directory
    ├── tests               --- Unit test file directory
    ├── sensitive_config.ini            Sensitive configuration information that will not be uploaded 
                                    to third party trusteeship, but the online environment needs
    ├── sensitive_config.ini.example    The format of the sensitive configuration information configuration file
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
The API document of this blog powerd by [apidoc](http://apidocjs.com/)  

    apidoc -i application/api -o public/doc

[Click here](http://www.hlzblog.top/doc)  

## Dependency
When you want to run this project under the VirtualBox 

    composer install
    npm install --no-bin-links
    gulp  

Therefore, you need some server , such as 

 * redis
 * nginx
 * mysql --- Maybe you need a free database server, and now you can replace it with MaraiaDB
 * php
 * node --- If you know how to run this project by gulp

## Unit Test

    php think unit