```
     _________.__     .__                   .__         ________
    /   _____/|  |__  |__|  _____    _____  |__|  ____  \_____  \
    \_____  \ |  |  \ |  | /     \  /     \ |  |_/ __ \  /  ____/
    /        \|   Y  \|  ||  Y Y  \|  Y Y  \|  |\  ___/ /       \  + changes
   /_______  /|___|  /|__||__|_|  /|__|_|  /|__| \___  >\_______ \
           \/      \/           \/       \/          \/         \/

```

# Shimmie

[![Tests](https://github.com/tegaki-tegaki/shimmie2-tegaki/actions/workflows/tests.yml/badge.svg)](https://github.com/tegaki-tegaki/shimmie2-tegaki/actions/workflows/tests.yml)

# What's different?!

- `Accept Terms and Conditions` extension (inspired by r34)
- `docker-compose.yml` for handy development (and deployment I suppose)
  - `db` container (PostgreSQL)
  - `networklogger` optional container (point `log_net` to it at `networklogger:35353` and run with docker-compose argument `--profile networklogger`)
- custom theme `r34custom` (you could use it as a more "whitelabel" rule34 theme)
  - removed a bunch of the juicyADS stuff, tracking etc...
  - removed links that go outside the booru itself (hard-coded links to paheal.net)
- attempt to make most of the core extensions work OOTB with PostgreSQL (ambitious never ending task?)
  - many extensions seem to be either MySQL specific
- "fixes" (pending review... more like "hacks" until then!)
  - `ext/transcode_video`
    - should now be able to convert from GIF (they take up so much space...) to mp4 on upload
- `/scripts` directory for even more handy dev stuff

# Debugging and Logging

1. You might want to ensure your `data/shimmie/config/shimmie.conf.php` looks something like this (defines `DEBUG` and `CLI_LOG_LEVEL`)

```php
<?php
define('DATABASE_DSN', 'pgsql:user=shimmie;password=shimmie;host=db;dbname=shimmie');
define('DEBUG', true);
define("CLI_LOG_LEVEL", 0);
```

2. Enable the `log_console` extension in the manager GUI. This is by far the better way to log.

2. If you want to use the `log_net` extension in the extension manager
    1. make sure that the `log_net` extension sends data to `networklogger:35353`
    2. start docker-compose with `--profile networklogger`
    3. enable the extension in the manager GUI.

3. You might also want to unsuppress the PHP output from the PHP command itself (started by the docker container) by removing `-q` from it, it is however quite noisy.

inside `tests/docker-init.sh`:
```shell
# ...other code...
exec /usr/local/bin/su-exec shimmie:shimmie \
  /usr/bin/php \
    -d upload_max_filesize=50M \
    -d post_max_size=50M \
    -S 0.0.0.0:8000 \
    tests/router.php
```
(note the above has no '-q' in it)

# Documentation

please see the [original docs](https://github.com/shish/shimmie2/wiki)

# Contact

"core bugs" tracker: https://github.com/shish/shimmie2/issues

changes / extensions in this repo tracker: https://github.com/tegaki-tegaki/shimmie2-tegaki/issues

# Licence

All code is released under the [GNU GPL Version 2](https://www.gnu.org/licenses/gpl-2.0.html) unless mentioned otherwise.

If you give shimmie to someone else, you have to give them the source (which
should be easy, as PHP is an interpreted language...). If you want to add
customisations to your own site, then those customisations belong to you,
and you can do what you want with them.
