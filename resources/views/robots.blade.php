User-agent: *
Allow: /
Disallow: /admin/
Disallow: /home
Disallow: /lang/
Disallow: /login
Disallow: /logout
Disallow: /password
Disallow: /policy/download/

Sitemap: {{ url('sitemap.xml') }}

# Additional rules for crawlers
Crawl-delay: 1
