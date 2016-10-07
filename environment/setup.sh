#!/bin/bash

sh create_server.sh
sh create_user.sh
sh create_u22_db.sh

cp -r ../web/* /var/www/html/
mysql -uu22 -punder22 u22 < db_sample
