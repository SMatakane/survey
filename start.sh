#!/bin/sh

if [ "$1" = "start" ];
then
  echo .....Starting apache2.....
  sudo service apache2 start
  echo .....Starting mariadb.....
  sudo service mariadb start
  echo .....Appending default values..... 
  sudo mysql -u default -p surveyDb < survey.sql
fi

if [ "$1" = "stop" ]
then
  echo .....Stopping apache2.....
  sudo service apache2 stop
  echo .....Stopping mariadb.....
  sudo service mariadb stop
fi
