#!/bin/bash

while true; do
    read -p "Do you want to execute programm with example input file? (y/n):" yn
    case $yn in
        [Yy]* ) php ./Bootstrap.php statement.csv; break;;
        [Nn]* ) exit;;
        * ) echo "Please answer yes or no.";;
    esac
done
