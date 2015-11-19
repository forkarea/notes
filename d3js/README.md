# D3.js - Data-Driven Documents

D3.js is a JavaScript library for manipulating documents based on data.

## Examples

- [Bubbles](examples/bubbles)
- [Line Chart](examples/lines)
- [Pie Chart](examples/pie)
- [Word Cloud](examples/word-cloud)

## Colors

```js
// defined
var c10 = d3.scale.category10();
var c20 = d3.scale.category20();
var c20b = d3.scale.category20b();
var c20c = d3.scale.category20c();

// own
function my_colores(n) {
  var colores = ['gray', 'black', 'red', 'maroon', 'yellow', 'olive', 'green', 'aqua', 'blue', 'pink', 'purple'];
  return colores[n % colores.length];
}

// usage
element.attr('fill', c10);
element.attr('fill', c20);

element.attr('fill', function(d, i) { return my_colores(i); });
```

## Loading data

### Non standard delimiter

Content *books.txt*:

```
id|title|pages
1|The Clean Coder|256
2|The Pragmatic Programmer|352
```

```js
var dsv = d3.dsv("|", "text/plain");
dsv("books.txt", function(data) {
    console.log(data);
});
```

### JSON

Content *books.json*

```json
[
   {
      "id":1,
      "title":"The Clean Coder",
      "pages":256
   },
   {
      "id":2,
      "title":"The Pragmatic Programmer",
      "pages":352
   }
]
```

```js
d3.json("books.json", function(data) {
    console.log(data);
});
```