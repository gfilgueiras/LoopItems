#######################################################################################################
#                                                                                                     #
#   @copyright Free Nest.                                                                             #
#                                                                                                     #
#######################################################################################################

alias nginx-start='nginx &'
alias nginx-stop='nginx -s stop'
alias nginx-quit='nginx -s quit'
alias nginx-reopen='nginx -s reopen'
alias nginx-reload='nginx -s reload'
alias nginx-status='nginx -t'
alias nginx-version='nginx -v'
alias nginx-conf-edit='vim /etc/nginx/nginx.conf'
alias nginx-conf-view='cat /etc/nginx/nginx.conf'
alias nginx-loopitems-conf-edit='vim /etc/nginx/sites-enabled/loopitems.conf'
alias nginx-loopitems-conf-view='cat /etc/nginx/sites-enabled/loopitems.conf'
alias nginx-pid='ls -ltrha /var/run/nginx.pid'
alias nginx-path-sites-available='cd /etc/nginx/sites-available'
alias nginx-path-sites-enabled='cd /etc/nginx/sites-enabled'
alias nginx-log-acces='tail -f /var/log/nginx/access.log'
alias nginx-log-error='tail -f /var/log/nginx/error.log'
