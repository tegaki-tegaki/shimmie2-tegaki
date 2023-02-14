<?php

declare(strict_types=1);

namespace Shimmie2;

class HelloEvent extends Event {
    public function __construct(string $username) {
        $this->username = $username;
    }
}

class AcceptTandC extends Extension {
    public function onPageRequest(PageRequestEvent $event) {
        global $user,$page;

        if ($event->page_matches("tac_agreed")) {
            setcookie("ui-tac-agreed", "true", 0, "/");
            $page->set_mode(PageMode::REDIRECT);
            $page->set_redirect(referer_or("/"));
        }
    }
}