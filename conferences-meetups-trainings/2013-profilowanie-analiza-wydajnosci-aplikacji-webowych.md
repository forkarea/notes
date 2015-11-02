# Profilowanie i analiza wydajności aplikacji webowych

- Context Switching przeglądarki
- Spdy
- PageSpeed Insights
- YSlow
- Navigation Timing API
- jspref
- browserscope

## Optymalizacja ilości żadań:

- Image Sprites
- korzystanie z serwerów CDN (Content Delivery Network)
- unikanie przekierowań i wolnych serwerów DNS
- sharding - rozposzenie zasobów
- statyczne zasoby
  - na osobnym serwerze
  - bez SSL
- HTTP Cache - ETags, If-Modified-Since
- minifikacja + Konkatenacja JS&CSS
- usuwanie cookies i zbędych nagłówków serwera
- kompresja danych tekstowych
- stosowanie DNS Prefetching

## JavaScript

- sync vs defer vs async
- Konsola Chrome - start&end profilowania danego fragmentu kodu JS