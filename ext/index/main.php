<?php
/**
 * Name: Image List
 * Author: Shish <webmaster@shishnet.org>
 * Link: http://code.shishnet.org/shimmie2/
 * License: GPLv2
 * Description: Show a list of uploaded images
 * Documentation:
 *  Here is a list of the search methods available out of the box;
 *  Shimmie extensions may provide other filters:
 *  <ul>
 *    <li>by tag, eg
 *      <ul>
 *        <li>cat
 *        <li>pie
 *        <li>somethi* -- wildcards are supported
 *      </ul>
 *    <li>size (=, &lt;, &gt;, &lt;=, &gt;=) width x height, eg
 *      <ul>
 *        <li>size=1024x768 -- a specific wallpaper size
 *        <li>size&gt;=500x500 -- no small images
 *        <li>size&lt;1000x1000 -- no large images
 *      </ul>
 *    <li>width (=, &lt;, &gt;, &lt;=, &gt;=) width, eg
 *      <ul>
 *        <li>width=1024 -- find images with 1024 width
 *        <li>width>2000 -- find images bigger than 2000 width
 *      </ul>
 *    <li>height (=, &lt;, &gt;, &lt;=, &gt;=) height, eg
 *      <ul>
 *        <li>height=768 -- find images with 768 height
 *        <li>height>1000 -- find images bigger than 1000 height
 *      </ul>
 *    <li>ratio (=, &lt;, &gt;, &lt;=, &gt;=) width : height, eg
 *      <ul>
 *        <li>ratio=4:3, ratio=16:9 -- standard wallpaper
 *        <li>ratio=1:1 -- square images
 *        <li>ratio<1:1 -- tall images
 *        <li>ratio>1:1 -- wide images
 *      </ul>
 *    <li>filesize (=, &lt;, &gt;, &lt;=, &gt;=) size, eg
 *      <ul>
 *        <li>filesize&gt;1024 -- no images under 1KB
 *        <li>filesize&lt=3MB -- shorthand filesizes are supported too
 *      </ul>
 *    <li>id (=, &lt;, &gt;, &lt;=, &gt;=) number, eg
 *      <ul>
 *        <li>id<20 -- search only the first few images
 *        <li>id>=500 -- search later images
 *      </ul>
 *    <li>user=Username & poster=Username, eg
 *      <ul>
 *        <li>user=Shish -- find all of Shish's posts
 *        <li>poster=Shish -- same as above
 *      </ul>
 *    <li>user_id=userID & poster_id=userID, eg
 *      <ul>
 *        <li>user_id=2 -- find all posts by user id 2
 *        <li>poster_id=2 -- same as above
 *      </ul>
 *    <li>hash=md5sum & md5=md5sum, eg
 *      <ul>
 *        <li>hash=bf5b59173f16b6937a4021713dbfaa72 -- find the "Taiga want up!" image
 *        <li>md5=bf5b59173f16b6937a4021713dbfaa72 -- same as above
 *      </ul>
 *    <li>filetype=type & ext=type, eg
 *      <ul>
 *        <li>filetype=png -- find all PNG images
 *        <li>ext=png -- same as above
 *      </ul>
 *    <li>filename=blah & name=blah, eg
 *      <ul>
 *        <li>filename=kitten -- find all images with "kitten" in the original filename
 *        <li>name=kitten -- same as above
 *      </ul>
 *    <li>posted (=, &lt;, &gt;, &lt;=, &gt;=) date, eg
 *      <ul>
 *        <li>posted&gt;=2009-12-25 posted&lt;=2010-01-01 -- find images posted between christmas and new year
 *      </ul>
 *    <li>tags (=, &lt;, &gt;, &lt;=, &gt;=) count, eg
 *      <ul>
 *        <li>tags=1 -- search for images with only 1 tag
 *        <li>tags>=10 -- search for images with 10 or more tags
 *        <li>tags<25 -- search for images with less than 25 tags
 *      </ul>
 *    <li>source=(URL, any, none) eg
 *      <ul>
 *        <li>source=http://example.com -- find all images with "http://example.com" in the source
 *        <li>source=any -- find all images with a source
 *        <li>source=none -- find all images without a source
 *      </ul>
 *    <li>order=(id, width, height, filesize, filename)_(ASC, DESC), eg
 *      <ul>
 *        <li>order=width -- find all images sorted from highest > lowest width
 *        <li>order=filesize_asc -- find all images sorted from lowest > highest filesize
 *      </ul>
 *    <li>order=random_####, eg
 *      <ul>
 *        <li>order=random_8547 -- find all images sorted randomly using 8547 as a seed
 *      </ul>
 *  </ul>
 *  <p>Search items can be combined to search for images which match both,
 *  or you can stick "-" in front of an item to search for things that don't
 *  match it.
 *  <p>Metatags can be followed by ":" rather than "=" if you prefer.
 *  <br />I.E: "posted:2014-01-01", "id:>=500" etc.
 *  <p>Some search methods provided by extensions:
 *  <ul>
 *    <li>Numeric Score
 *      <ul>
 *        <li>score (=, &lt;, &gt;, &lt;=, &gt;=) number -- seach by score
 *        <li>upvoted_by=Username -- search for a user's likes
 *        <li>downvoted_by=Username -- search for a user's dislikes
 *        <li>upvoted_by_id=UserID -- search for a user's likes by user ID
 *        <li>downvoted_by_id=UserID -- search for a user's dislikes by user ID
 *        <li>order=score_(ASC, DESC) -- find all images sorted from by score
 *      </ul>
 *    <li>Image Rating
 *      <ul>
 *        <li>rating=se -- find safe and explicit images, ignore questionable and unknown
 *      </ul>
 *    <li>Favorites
 *      <ul>
 *        <li>favorites (=, &lt;, &gt;, &lt;=, &gt;=) number -- search for images favourited a certain number of times
 *        <li>favourited_by=Username -- search for a user's choices by username
 *        <li>favorited_by_userno=UserID -- search for a user's choice by userID
 *      </ul>
 *    <li>Notes
 *      <ul>
 *        <li>notes (=, &lt;, &gt;, &lt;=, &gt;=) number -- search by the number of notes an image has
 *        <li>notes_by=Username -- search for images containing notes created by username
 *        <li>notes_by_userno=UserID -- search for images containing notes created by userID
 *      </ul>
 *    <li>Artists
 *      <ul>
 *        <li>author=ArtistName -- search for images by artist
 *      </ul>
 *    <li>Image Comments
 *      <ul>
 *        <li>comments (=, &lt;, &gt;, &lt;=, &gt;=) number -- search for images by number of comments
 *        <li>commented_by=Username -- search for images containing user's comments by username
 *        <li>commented_by_userno=UserID -- search for images containing user's comments by userID
 *      </ul>
 *    <li>Pools
 *      <ul>
 *        <li>pool=(PoolID, any, none) -- search for images in a pool by PoolID.
 *        <li>pool_by_name=PoolName -- search for images in a pool by PoolName. underscores are replaced with spaces
 *      </ul>
 *    <li>Post Relationships
 *      <ul>
 *        <li>parent=(parentID, any, none) -- search for images by parentID / if they have, do not have a parent
 *        <li>child=(any, none) -- search for images which have, or do not have children
 *      </ul>
 *  </ul>
 */

/*
 * SearchTermParseEvent:
 * Signal that a search term needs parsing
 */
class SearchTermParseEvent extends Event
{
    /** @var null|string  */
    public $term = null;
    /** @var string[] */
    public $context = [];
    /** @var Querylet[] */
    public $querylets = [];

    public function __construct(string $term=null, array $context=[])
    {
        $this->term = $term;
        $this->context = $context;
    }

    public function is_querylet_set(): bool
    {
        return (count($this->querylets) > 0);
    }

    public function get_querylets(): array
    {
        return $this->querylets;
    }

    public function add_querylet(Querylet $q)
    {
        $this->querylets[] = $q;
    }
}

class SearchTermParseException extends SCoreException
{
}

class PostListBuildingEvent extends Event
{
    /** @var array */
    public $search_terms = [];

    /** @var array */
    public $parts = [];

    /**
     * #param string[] $search
     */
    public function __construct(array $search)
    {
        $this->search_terms = $search;
    }

    public function add_control(string $html, int $position=50)
    {
        while (isset($this->parts[$position])) {
            $position++;
        }
        $this->parts[$position] = $html;
    }
}

class Index extends Extension
{
    /** @var int */
    private $stpen = 0;  // search term parse event number

    public function onInitExt(InitExtEvent $event)
    {
        global $config;
        $config->set_default_int("index_images", 24);
        $config->set_default_bool("index_tips", true);
        $config->set_default_string("index_order", "id DESC");
    }

    public function onPageRequest(PageRequestEvent $event)
    {
        global $database, $page;
        if ($event->page_matches("post/list")) {
            if (isset($_GET['search'])) {
                // implode(explode()) to resolve aliases and sanitise
                $search = url_escape(Tag::implode(Tag::explode($_GET['search'], false)));
                if (empty($search)) {
                    $page->set_mode(PageMode::REDIRECT);
                    $page->set_redirect(make_link("post/list/1"));
                } else {
                    $page->set_mode(PageMode::REDIRECT);
                    $page->set_redirect(make_link('post/list/'.$search.'/1'));
                }
                return;
            }

            $search_terms = $event->get_search_terms();
            $page_number = $event->get_page_number();
            $page_size = $event->get_page_size();

            $count_search_terms = count($search_terms);

            try {
                #log_debug("index", "Search for ".Tag::implode($search_terms), false, array("terms"=>$search_terms));
                $total_pages = Image::count_pages($search_terms);
                $images = [];

                if (SPEED_HAX) {
                    $fast_page_limit = 500;
                    if ($total_pages > $fast_page_limit) $total_pages = $fast_page_limit;
                    if ($page_number > $fast_page_limit) {
                        $this->theme->display_error(
                            404, "Search limit hit",
                            "Only $fast_page_limit pages of results are searchable - " .
                            "if you want to find older results, use more specific search terms"
                        );
                        return;
                    } elseif ($count_search_terms === 0 && ($page_number < 10)) {
                        // extra caching for the first few post/list pages
                        $images = $database->cache->get("post-list:$page_number");
                        if (!$images) {
                            $images = Image::find_images(($page_number-1)*$page_size, $page_size, $search_terms);
                            $database->cache->set("post-list:$page_number", $images, 60);
                        }
                    }
                }

                if (!$images) {
                    $images = Image::find_images(($page_number-1)*$page_size, $page_size, $search_terms);
                }
            } catch (SearchTermParseException $stpe) {
                // FIXME: display the error somewhere
                $total_pages = 0;
                $images = [];
            }

            $count_images = count($images);

            if ($count_search_terms === 0 && $count_images === 0 && $page_number === 1) {
                $this->theme->display_intro($page);
                send_event(new PostListBuildingEvent($search_terms));
            } elseif ($count_search_terms > 0 && $count_images === 1 && $page_number === 1) {
                $page->set_mode(PageMode::REDIRECT);
                $page->set_redirect(make_link('post/view/'.$images[0]->id));
            } else {
                $plbe = new PostListBuildingEvent($search_terms);
                send_event($plbe);

                $this->theme->set_page($page_number, $total_pages, $search_terms);
                $this->theme->display_page($page, $images);
                if (count($plbe->parts) > 0) {
                    $this->theme->display_admin_block($plbe->parts);
                }
            }
        }
    }

    public function onSetupBuilding(SetupBuildingEvent $event)
    {
        $sb = new SetupBlock("Index Options");
        $sb->position = 20;

        $sb->add_label("Show ");
        $sb->add_int_option("index_images");
        $sb->add_label(" images on the post list");

        $event->panel->add_block($sb);
    }

    public function onImageInfoSet(ImageInfoSetEvent $event)
    {
        global $database;
        if (SPEED_HAX) {
            $database->cache->delete("thumb-block:{$event->image->id}");
        }
    }

    public function onSearchTermParse(SearchTermParseEvent $event)
    {
        $matches = [];
        // check for tags first as tag based searches are more common.
        if (preg_match("/^tags([:]?<|[:]?>|[:]?<=|[:]?>=|[:|=])(\d+)$/i", $event->term, $matches)) {
            $cmp = ltrim($matches[1], ":") ?: "=";
            $count = $matches[2];
            $event->add_querylet(
                new Querylet("EXISTS (
				              SELECT 1
				              FROM image_tags it
				              LEFT JOIN tags t ON it.tag_id = t.id
				              WHERE images.id = it.image_id
				              GROUP BY image_id
				              HAVING COUNT(*) $cmp $count
				)")
            );
        } elseif (preg_match("/^ratio([:]?<|[:]?>|[:]?<=|[:]?>=|[:|=])(\d+):(\d+)$/i", $event->term, $matches)) {
            $cmp = preg_replace('/^:/', '=', $matches[1]);
            $args = ["width{$this->stpen}"=>int_escape($matches[2]), "height{$this->stpen}"=>int_escape($matches[3])];
            $event->add_querylet(new Querylet("width / height $cmp :width{$this->stpen} / :height{$this->stpen}", $args));
        } elseif (preg_match("/^(filesize|id)([:]?<|[:]?>|[:]?<=|[:]?>=|[:|=])(\d+[kmg]?b?)$/i", $event->term, $matches)) {
            $col = $matches[1];
            $cmp = ltrim($matches[2], ":") ?: "=";
            $val = parse_shorthand_int($matches[3]);
            $event->add_querylet(new Querylet("images.$col $cmp :val{$this->stpen}", ["val{$this->stpen}"=>$val]));
        } elseif (preg_match("/^(hash|md5)[=|:]([0-9a-fA-F]*)$/i", $event->term, $matches)) {
            $hash = strtolower($matches[2]);
            $event->add_querylet(new Querylet('images.hash = :hash', ["hash" => $hash]));
        } elseif (preg_match("/^(phash)[=|:]([0-9a-fA-F]*)$/i", $event->term, $matches)) {
            $phash = strtolower($matches[2]);
            $event->add_querylet(new Querylet('images.phash = :phash', ["phash" => $phash]));
        } elseif (preg_match("/^(filetype|ext)[=|:]([a-zA-Z0-9]*)$/i", $event->term, $matches)) {
            $ext = strtolower($matches[2]);
            $event->add_querylet(new Querylet('images.ext = :ext', ["ext" => $ext]));
        } elseif (preg_match("/^(filename|name)[=|:]([a-zA-Z0-9]*)$/i", $event->term, $matches)) {
            $filename = strtolower($matches[2]);
            $event->add_querylet(new Querylet("images.filename LIKE :filename{$this->stpen}", ["filename{$this->stpen}"=>"%$filename%"]));
        } elseif (preg_match("/^(source)[=|:](.*)$/i", $event->term, $matches)) {
            $source = strtolower($matches[2]);

            if (preg_match("/^(any|none)$/i", $source)) {
                $not = ($source == "any" ? "NOT" : "");
                $event->add_querylet(new Querylet("images.source IS $not NULL"));
            } else {
                $event->add_querylet(new Querylet('images.source LIKE :src', ["src"=>"%$source%"]));
            }
        } elseif (preg_match("/^posted([:]?<|[:]?>|[:]?<=|[:]?>=|[:|=])([0-9-]*)$/i", $event->term, $matches)) {
            $cmp = ltrim($matches[1], ":") ?: "=";
            $val = $matches[2];
            $event->add_querylet(new Querylet("images.posted $cmp :posted{$this->stpen}", ["posted{$this->stpen}"=>$val]));
        } elseif (preg_match("/^size([:]?<|[:]?>|[:]?<=|[:]?>=|[:|=])(\d+)x(\d+)$/i", $event->term, $matches)) {
            $cmp = ltrim($matches[1], ":") ?: "=";
            $args = ["width{$this->stpen}"=>int_escape($matches[2]), "height{$this->stpen}"=>int_escape($matches[3])];
            $event->add_querylet(new Querylet("width $cmp :width{$this->stpen} AND height $cmp :height{$this->stpen}", $args));
        } elseif (preg_match("/^width([:]?<|[:]?>|[:]?<=|[:]?>=|[:|=])(\d+)$/i", $event->term, $matches)) {
            $cmp = ltrim($matches[1], ":") ?: "=";
            $event->add_querylet(new Querylet("width $cmp :width{$this->stpen}", ["width{$this->stpen}"=>int_escape($matches[2])]));
        } elseif (preg_match("/^height([:]?<|[:]?>|[:]?<=|[:]?>=|[:|=])(\d+)$/i", $event->term, $matches)) {
            $cmp = ltrim($matches[1], ":") ?: "=";
            $event->add_querylet(new Querylet("height $cmp :height{$this->stpen}", ["height{$this->stpen}"=>int_escape($matches[2])]));
        } elseif (preg_match("/^order[=|:](id|width|height|filesize|filename)[_]?(desc|asc)?$/i", $event->term, $matches)) {
            $ord = strtolower($matches[1]);
            $default_order_for_column = preg_match("/^(id|filename)$/", $matches[1]) ? "ASC" : "DESC";
            $sort = isset($matches[2]) ? strtoupper($matches[2]) : $default_order_for_column;
            Image::$order_sql = "images.$ord $sort";
            $event->add_querylet(new Querylet("1=1")); //small hack to avoid metatag being treated as normal tag
        } elseif (preg_match("/^order[=|:]random[_]([0-9]{1,4})$/i", $event->term, $matches)) {
            //order[=|:]random requires a seed to avoid duplicates
            //since the tag can't be changed during the parseevent, we instead generate the seed during submit using js
            $seed = $matches[1];
            Image::$order_sql = "RAND($seed)";
            $event->add_querylet(new Querylet("1=1")); //small hack to avoid metatag being treated as normal tag
        }

        $this->stpen++;
    }
}
