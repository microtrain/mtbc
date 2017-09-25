#!/bin/bash

CONFIG="$1"
COMMAND="$2"

if [ $# -ne 2 ]
then

        COMMANDS=( reload restart )

        # Iterate the list of commands and inject them in to the user feedback

        ### Using a loop, iterate through a list of a commands determine
        ### is option 2 is a valid command

        # If the user did not supply a config file, return a list of files to
        # the user
        VHOSTS_STRING=''
        VHOSTS_PATH=/etc/apache2/sites-available/*.conf
        for FILENAME in $VHOSTS_PATH
        do
                # Strip the file extension
                FILE=${FILENAME##*/}

                # Strip the base path
                VHOST=${FILE%.*}

                # If $COMMAND_STRING is not empty, print a seperator
                if [ ! -z  "$VHOSTS_STRING" ]
                then
                        VHOST=" | ${VHOST}"
                fi

                VHOSTS_STRING="${VHOSTS_STRING}${VHOST}"
        done

        echo "Load a target vhost configuration"
        echo "Usage: $0 { $VHOSTS_STRING } { $COMMAND_STRING }"
        exit 1

fi

# Disable the existing hosts configuration
sudo a2dissite $CONFIG
sudo service apache2 $COMMAND

# Enable the existing hosts configuration
sudo a2ensite $CONFIG
sudo service apache2 $COMMAND
