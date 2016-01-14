text = LOAD 'lorem-ipsum.txt' AS (line:chararray);

words = FOREACH text GENERATE FLATTEN(TOKENIZE(LOWER(line))) AS word;
words = FILTER words BY SIZE(word) > 3L;
grouped = GROUP words BY word;
counts = FOREACH grouped GENERATE group AS word, COUNT(words) AS total;
sorted = ORDER counts BY total DESC;
top100 = LIMIT sorted 100;

STORE top100 INTO 'wordcount-result' USING PigStorage(',');