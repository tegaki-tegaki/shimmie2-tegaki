#!/usr/bin/env bash
set -euxo pipefail

# run in "production"
# network is 'host' mode, so I can easily connect to host postgres instance
# obviously change this however you want! :D

docker run -it --rm -p 8000:8000 -v $HOME/server/booru/data:/app/data --name shimmie2 --net host shimmie2
