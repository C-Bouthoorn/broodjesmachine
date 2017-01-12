#!/bin/sh

# Make sure we are in the linux folder
if [ ! -f 'router.php' ]; then
  cd linux
fi


# Start MySQL server
## NOTE: IF THIS ERRORS, MAKE SURE THAT:
##  - APPARMOR IS CONFIGURED CORRECTLY
##  - NO OTHER SERVER IS RUNNING
##  - YOU ARE RUNNING WITH SUDO (otherwise errors might occure)
startmysqlpath="$(pwd)/startmysql.sh"
sudo -sHu mysql "$startmysqlpath"

# Web root folder is the folder that contains `broodjesmachine`
php -S 0.0.0.0:8080 -t '../..' router.php


# Replace relative paths to absolute on-the-fly in my.cnf and save to _my.cnf
# ... I hate this
## Update: Luckily it isn't needed :D
#rm -f _my.cnf
#cat my.cnf | perl -e '$pwd="'"$(cd ../../..;pwd)"'";while($a=<>){ $a =~ s/..\/..\/../$pwd/g; print $a; }' > _my.cnf
#chmod 644 _my.cnf
#chown mysql:mysql _my.cnf
