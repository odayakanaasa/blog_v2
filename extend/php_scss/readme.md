## 简介
云天河为了方便，用php搭建的scss解析环境  
这样每次scss目录里的scss文件变动  
都会生成相应的css文件  

## 配置run.php
设置$dir变量。指向有css与scss的目录

    $dir = realpath( __DIR__.'/../../public/static/');

## Dos
书写脚本每秒生成一次

    :begin
        php ../../extend/php_scss/run.php -w 1000
    goto begin

## Shell
书写脚本每秒生成一次

    #!/bin/bash
    while true 
    do 
     php ../../extend/php_scss/run.php ; sleep 1s # run shell
    done 