# D3.js - Data-Driven Documents

D3.js is a JavaScript library for manipulating documents based on data.

## Loading data

### Non standard delimiter

var dsv = d3.dsv("|", "text/plain");


And then use this to parse the strangely formated file.
psv("/data/animals_piped.txt", function(data) {
  console.log(data[1]);
});

