```
     _________.__     .__                   .__         ________
    /   _____/|  |__  |__|  _____    _____  |__|  ____  \_____  \
    \_____  \ |  |  \ |  | /     \  /     \ |  |_/ __ \  /  ____/
    /        \|   Y  \|  ||  Y Y  \|  Y Y  \|  |\  ___/ /       \
   /_______  /|___|  /|__||__|_|  /|__|_|  /|__| \___  >\_______ \
           \/      \/           \/       \/          \/         \/

```

# Shimmie

[![Test & Publish](https://github.com/shish/shimmie2/workflows/Test%20&%20Publish/badge.svg)](https://github.com/shish/shimmie2/actions)
[![Code Quality](https://scrutinizer-ci.com/g/shish/shimmie2/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/shish/shimmie2/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/shish/shimmie2/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/shish/shimmie2/?branch=master)

# What's different?!

- `Accept Terms and Conditions` extension (inspired by r34)
- `docker-compose.yml` for handy development (and deployment I suppose)
- custom theme `r34custom` (you could use it as a more "whitelabel" rule34 theme)
  - removed a bunch of the juicyADS stuff, tracking etc...
  - removed links that go outside the booru itself (hard-coded links to paheal.net), they should now all be relative instead.
- attempt to make most of the core extensions work OOTB with PostgreSQL
  - many extensions are MySQL specific, so it seems to break with PostgreSQL
- `/scripts` directory... for handy dev stuff

# Documentation

* [Install straight on disk](https://github.com/shish/shimmie2/wiki/Install)
* [Install in docker container](https://github.com/shish/shimmie2/wiki/Docker)
* [Upgrade process](https://github.com/shish/shimmie2/wiki/Upgrade)
* [Basic settings](https://github.com/shish/shimmie2/wiki/Settings)
* [Advanced config](https://github.com/shish/shimmie2/wiki/Advanced-Config)
* [Developer notes](https://github.com/shish/shimmie2/wiki/Development-Info)
* [High-performance notes](https://github.com/shish/shimmie2/wiki/Performance)


# Contact

Email: webmaster at shishnet.org

Issue/Bug tracker: https://github.com/shish/shimmie2/issues


# Licence

All code is released under the [GNU GPL Version 2](https://www.gnu.org/licenses/gpl-2.0.html) unless mentioned otherwise.

If you give shimmie to someone else, you have to give them the source (which
should be easy, as PHP is an interpreted language...). If you want to add
customisations to your own site, then those customisations belong to you,
and you can do what you want with them.
