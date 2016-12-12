# JavaScript - Notes

Notatki na temat *JavaScript*.

- [ECMAScript 6 - New Features: Overview & Comparison](http://es6-features.org/)

## const, let, var

- [*const*](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/const) - sta�a, block-scoped
  - brak mo�liwo�ci nadpisania w tym samym scope,
  - poza scope np. wewn�trz kolejnego, mo�na zdefinowa� sta�� o tej samej nazwie
- [*let*](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/let) - zmienna, block-scoped,
  - zmienne tymczasowe np. ```for(let i = 0; i < 10; i++) { /** ... **/ }```
- [*var*](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/var) - zmienna, function-scoped
