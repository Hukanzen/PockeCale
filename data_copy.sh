#!/bin/bash

TO="/Public"

rm -rf ${TO}/web/*
rm -rf ${TO}/root_shell/*
rm -rf ${TO}/shell/*

mkdir "${TO}/web/"
mkdir "${TO}/root_shell/"
mkdir "${TO}/shell/"

cp -rv --parents /var/www/html/*    "${TO}/web/"
cp -rv --parents /root/shell/*      "${TO}/root_shell/"
cp -rv --parents /home/main/shell/* "${TO}/shell/"

#chmod 755 -R ${TO}
