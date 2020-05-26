<?php

#################################Nginx启动管理脚本###################################!/bin/bash#Author：liu#chkconfig: 2345 99 33

#description: nginx server control toolsngxc="/usr/local/nginx/sbin/nginx"pidf="usr/local/nginx/logs/nginx.pid"ngxc_fpm="/usr/local/php/sbin/php-fpm"pidf_fpm="/usr/local/php/var/run/php-fpm.pid"case "$1" instart)$ngxc -t &> /dev/nullif [ $? -eq0 ];then$ngxc$ngxc_fpmecho "nginx service start success!"else$ngxc -tfi;;stop)kill -s QUIT $(cat $pidf)kill -s QUIT $(cat $pidf_fpm)echo "nginx service stop success!";;restart)$0 stop$0 start;;reload)$ngxc -t &> /dev/nullif [ $? -eq 0 ];thenkill -s HUP $(cat $pidf)kill -s HUP $(cat $pidf_fpm)echo "reload nginx config success!"else$ngxc -tfi;;*)echo "please input stop|start|restart|reload."exit 1esac