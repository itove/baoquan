#!/bin/bash
#
# vim:ft=sh

############### Variables ###############

############### Functions ###############

############### Main Part ###############
find public/files/ -type d -exec sudo chmod 775 {} \;

find public/files/ -type f -exec sudo chmod 664 {} \;
