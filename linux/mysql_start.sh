#!/bin/sh

isselffix=$([ "x$1" = "xSF" ]; echo $?)

# Check some common errors
if [ ! -e ../../../mysqldata ]; then
	echo "../../../mysqldata doesn't exist"
	exit 1
fi

if [ ! -r ../../../mysqldata/ibdata1 ]; then
	echo "Failed to read ibdata1"
	exit 2
fi

if [ ! -e /var/run/mysqld ]; then
	echo "/var/run/mysqld doesn't exist"
	exit 3
fi

if [ "x$(pidof mysqld)" != "x" ]; then
	echo "Another mysqld instance is already running"
	
	# Self-fix
	if [ $isselffix = 0 ]; then
		echo "Self-fix already failed, so it's your problem now"
		exit 4
	fi
	
	echo "Trying self-fix..."
	pkill mysqld
	sleep 2
	./mysql_start.sh "SF"
	
	exit 4
fi

if nc -z 127.0.0.1 3306; then
	echo "Another server is running on port 3306"
	exit 5
fi

if [ "x$(whoami)" != "xmysql" ]; then
	echo "Not running as mysql user"
	exit 6
fi


# Start mysql server in background
mysqld --datadir ../../../mysqldata &

echo "The MySQL server started.. succesfully??? That doesn't happen very often O.o"
