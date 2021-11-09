
## example
### add domain
```php
$dnslink=new DNSLink($key);
$dnslink->addDomain("test.com");
```

### addRecord
```php
$dnslink=new DNSLink($key);
$dnslink->addRecord("test.com","hello","TXT",3600);
```

