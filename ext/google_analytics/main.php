<?php

declare(strict_types=1);

namespace Shimmie2;

class GoogleAnalytics extends Extension
{
    # Add analytics to config
    public function onSetupBuilding(SetupBuildingEvent $event)
    {
        $sb = $event->panel->create_new_block("Google Analytics");
        $sb->add_text_option("google_analytics_id", "Analytics ID: ");
        $sb->add_label("<br>(eg. UA-xxxxxxxx-x)");
    }

    # Load Analytics tracking code on page request
    public function onPageRequest(PageRequestEvent $event)
    {
        global $config, $page;

        $google_analytics_id = $config->get_string('google_analytics_id', '');
        if (stristr($google_analytics_id, "G-")) {
            $page->add_html_header("
            <!-- Google tag (gtag.js) -->
<script async src='https://www.googletagmanager.com/gtag/js?id=$google_analytics_id'></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '$google_analytics_id');
</script>
            ");
        }
    }
}
