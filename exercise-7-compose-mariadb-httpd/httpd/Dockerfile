FROM httpd:2.4

RUN { \
    echo 'IncludeOptional conf.d/*.conf'; \
    } >> /usr/local/apache2/conf/httpd.conf

COPY mysite.conf /usr/local/apache2/conf.d/mysite.conf