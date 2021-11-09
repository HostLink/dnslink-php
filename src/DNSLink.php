<?php

namespace DNSLink;

use Exception;

class DNSLink
{
    const SERVER = "https://dnslink.hk/api/";

    public $client;

    function __construct(string $key)
    {
        $this->client = new \GQL\Client(self::SERVER, ["verify" => false]);
        $this->client->setToken($key);
    }

    function addDomain(string $name, string $zone)
    {
        $resp = $this->client->subscription("addDomain", [
            "__args" => [
                "name" => $name,
                "username" => "",
                "password" => "",
                "zone" => $zone
            ]
        ]);
        if ($resp["error"]) {
            throw new Exception($resp["error"]["message"]);
        }
        return $resp["data"]["addDomain"];
    }

    function addRecord(string $name, string $content, string $type, int $ttl): bool
    {
        $resp = $this->client->mutation("addRecord", [
            "__args" => [
                "name" => $name,
                "content" => $content,
                "type" => $type,
                "ttl" => $ttl
            ]
        ]);
        if ($resp["error"]) {
            throw new Exception($resp["error"]["message"]);
        }

        return $resp["data"]["addRecord"];
    }

    function listZone()
    {
        $resp = $this->client->query([
            "listZone" => [
                "name"
            ]
        ]);
        return $resp["data"]["listZone"];
    }
}
