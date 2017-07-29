#!/bin/bash
## 依据我的线上环境写的crontab计划
##### minute - 从0到59的整数 
##### hour - 从0到23的整数 
##### day - 从1到31的整数 (必须是指定月份的有效日期)
##### month - 从1到12的整数 (或如Jan或Feb简写的月份)
##### dayofweek - 从0到7的整数，0或7用来描述周日 (或用Sun或Mon简写来表示)
##### command - 需要执行的命令(可用as ls /proc >> /tmp/proc或 执行自定义脚本的命令) 

## crontab set time 03:00:00 to update in daily
## 0 3 * * * /root/shells/blog_shell.sh

## variable 
last_day=`date -d last-day +%Y%m%d`

# Create sitemap
php /data/www/blog/public/index.php Cli/sitemap

# division of daily logs
nginx="/usr/local/nginx"
ng_conf="${nginx}/conf"
log_path="${nginx}/logs"
mv ${log_path}/access.log ${log_path}/daily_acc_logs/${last_day}.log
touch ${log_path}access.log
${nginx}/sbin/nginx -c ${nginx}/conf/nginx.conf -s reload


# backup database  in raw
zip -r /data/www/blog/__materials/sql_baks/${last_day}.zip /usr/local/mysql/data/yth_blog/*