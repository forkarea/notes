# D3.js - Data-Driven Documents

D3.js is a JavaScript library for manipulating documents based on data.

## Examples

- Line chart
- Pie chart
- Word Cloud

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