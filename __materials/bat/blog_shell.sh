#!/bin/bash
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

mysql_dump_path="/data/www/blog/__materials/sql_baks"
# backup database  in raw
mysqldump --sock=/tmp/mysql.sock -u用户 -p密码 yth_blog > yth_blog.sql 
tar -zcvf ${mysql_dump_path}/${last_day}.tar.gz yth_blog.sql 
rm -rf ${mysql_dump_path}/yth_blog.sql 
#   ->  send to mail
php /data/www/blog/public/index.php Cli/bak_sql_to_email