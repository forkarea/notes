register piggybank-0.15.0.jar;

reddit = LOAD 'reddit-small.csv'
    USING org.apache.pig.piggybank.storage.CSVExcelStorage(' ', 'NO_MULTILINE', 'UNIX', 'SKIP_INPUT_HEADER')
    AS (subreddit:chararray, user:chararray, score:int);

grouped = GROUP reddit BY (subreddit, user);

total_scores = FOREACH grouped GENERATE
    FLATTEN(reddit.subreddit) AS subreddit,
    FLATTEN(reddit.user) AS user,
    SUM(reddit.score) AS total_score;

results = DISTINCT total_scores;

STORE results INTO 'reddit-result' USING PigStorage(',');