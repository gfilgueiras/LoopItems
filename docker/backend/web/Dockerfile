FROM nginx:latest

WORKDIR /var/www/

ENV USER=${DOCKER_NGINX_USERNAME}
ENV USER_PASSWORD=${DOCKER_NGINX_PASSWORD}
ENV UID=${DOCKER_NGINX_USERNAME_UID}

RUN apt-get update && apt-get -y upgrade

RUN apt-get update && apt-get install -y \
	vim

RUN mkdir /etc/nginx/sites-available
RUN mkdir /etc/nginx/sites-enabled

RUN mv /etc/nginx/nginx.conf /etc/nginx/nginx.confORG
COPY configs/nginx.conf /etc/nginx/nginx.conf
RUN mv /etc/nginx/conf.d/default.conf /etc/nginx/sites-available/default.conf

COPY virtualHost/loopitems.conf /etc/nginx/sites-enabled/loopitems.conf
RUN ln -s /etc/nginx/sites-enabled/loopitems.conf /etc/nginx/conf.d/loopitems.conf

RUN useradd -G www-data,root -u 1000 -d /home/loopitems loopitems
RUN mkdir -p /home/loopitems/.composer && \
chown -R loopitems:loopitems /home/loopitems
RUN echo "loopitems:loopitems" | chpasswd
RUN chsh -s /usr/local/bin/bash loopitems

COPY entrypoint/entrypoint.sh /var/run/entrypoint.sh
RUN /usr/bin/chmod +x /var/run/entrypoint.sh
ENTRYPOINT ["/var/run/entrypoint.sh"]
