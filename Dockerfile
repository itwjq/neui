FROM registry.cn-hangzhou.aliyuncs.com/lxepoo/apache-php5
WORKDIR /var/www/
COPY wordpress wordpress
COPY assets assets
EXPOSE 80
