text = LOAD 'lorem-ipsum.txt' AS (line:chararray);

words = FOREACH text GENERATE FLATTEN(TOKENIZE(line)) AS word;
grouped = GROUP words BY word;
counts = FOREACH grouped GENERATE group AS word, COUNT(words) AS total;
sorted = ORDER counts BY total DESC;

STORE sorted INTO 'word-count-result' USING PigStorage(',');