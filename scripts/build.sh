#!/usr/bin/env bash

set -euxo pipefail

cd $(git rev-parse --show-toplevel)

docker build . -t shimmie2
