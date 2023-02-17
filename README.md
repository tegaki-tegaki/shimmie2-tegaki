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
  - includes changes to the `log_net` extension, and a networklogger (written in nodejs)
- custom theme `r34custom` (you could use it as a more "whitelabel" rule34 theme)
  - removed a bunch of the juicyADS stuff, tracking etc...
  - removed links that go outside the booru itself (hard-coded links to paheal.net)
- attempt to make most of the core extensions work OOTB with PostgreSQL
  - many extensions seem to be either MySQL specific or in some other way broken
- `/scripts` directory for even more handy dev stuff

# Debugging and Logging

1. You might want to ensure your `data/shimmie/config/shimmie.conf.php` looks something like this (defines `DEBUG` and `CLI_LOG_LEVEL`)

```php
<?php
define('DATABASE_DSN', 'pgsql:user=shimmie;password=shimmie;host=db;dbname=shimmie');
define('DEBUG', true);
define("CLI_LOG_LEVEL", 0);
```

2. You should also enable the `Logging (Network)` extension in the extension manager.

3. You might also want to unsuppress the PHP output from the PHP command itself (started by the docker container) by removing `-q` from it.

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
