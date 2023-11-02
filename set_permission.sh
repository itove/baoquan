#!/bin/bash
#
# vim:ft=sh

############### Variables ###############

############### Functions ###############

############### Main Part ###############
find public/files/ -type d -exec sudo chmod 775 {} \;

find public/files/ -type f -exec sudo chmod 664 {} \;

sudo chmod 775 public/files/media/
sudo chmod 775 public/files/media/thumbnail/
