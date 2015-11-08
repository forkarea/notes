# D3.js - Data-Driven Documents

D3.js is a JavaScript library for manipulating documents based on data.

## Loading data

### Non standard delimiter

var dsv = d3.dsv("|", "text/plain");
dsv("data.txt", function(data) {
  console.log(data[1]);
});
