#!/bin/sh

# This is customised script. It might not work in your environment.


# Make sure we are in the linux folder
if [ ! -f 'router.php' ]; then
  cd linux
fi

# Start MySQL server
mysqld --defaults-extra-file=./my.cnf

exit $?

# Web root folder is the folder that contains `broodjesmachine`
php -S 0.0.0.0:8081 -t '../..' router.php
