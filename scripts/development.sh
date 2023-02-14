#!/usr/bin/env bash

# run this if you want to do local development (all in docker containers)
# follow the instructions in the comments of this script for a good time!

set -euxo pipefail

cd $(git rev-parse --show-toplevel)

# to build and start everything (not detached with -d)
docker-compose up --build

# to stop, rebuild and restart shimmie2
# docker-compose stop shimmie2 && docker-compose up --build -d

# 1. to connect to the db, use 'db' as the hostname in the web ui
#    hostname: db
#    username: shimmie
#    dbname:   shimmie
#    password: shimmie
# 2. now go into the data/config/shimmie.conf.php and set DEBUG = true
#    define('DEBUG', true);
# 3. disable quiet mode in tests/docker-init.sh (to get more logging on requests)
#    remove the `-q`

# now you can start making changes and rebuild+restart the shimmie2 container