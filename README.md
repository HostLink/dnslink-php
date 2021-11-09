
## example
### add domain
```php
$dnslink=new DNSLink($key);
$dnslink->addDomain("abc.test.com","test.com");
```

### addRecord
```php
$dnslink=new DNSLink($key);
$dnslink->addRecord("abc.test.com","hello","TXT",3600);
```

