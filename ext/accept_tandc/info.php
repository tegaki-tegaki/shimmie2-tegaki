<?php

declare(strict_types=1);

namespace Shimmie2;

class AcceptTandCInfo extends ExtensionInfo
{
    public const KEY = "accept_tandc";

    public string $key = self::KEY;
    public string $name = "Accept T&C";
    public string $url = "booru.drawsdraws.com";
    public array $authors = ["Tegaki"];
    public string $license = self::LICENSE_GPLV2;
    public string $description = "censor pages until accepted";
    public ?string $documentation =
"mostly inspired from the rule34 extension, but this is only the tandc part as a separate extension";
}
