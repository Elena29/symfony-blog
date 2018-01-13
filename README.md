# My blog

Simple RESTful project skeleton based on Symfony packages with docker configuration.

### Implemented URLs

| Verb | Path | Action |
| ---- | ---- | ------ |
| GET  | /posts | Return list of posts |
| GET  | /post/{id} | Return one post |

### Tests configuration

Provided configuration for:
   - functional tests;
   - phpunit tests;
   - documentation using Apiary;
    
To run functional test:

`vendor/bin/codeception run functional` 
or
`vendor/bin/codeception run functional PostCest:test_get_post --debug`

Running documentation:

`dredd apiary.apib myblog.local` 

