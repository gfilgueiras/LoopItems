#!/bin/bash
#######################################################################################################
#                                                                                                     #
#   @copyright Free Nest.                                                                             #
#                                                                                                     #
#######################################################################################################

source /root/.bashrc
nginx -s stop &> /dev/null; sleep 2; nginx &

sleep infinity
