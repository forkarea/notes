REGISTER jyson-1.0.2.jar;
REGISTER 'reddit.py' USING jython AS redditUdf;

-- 1) załaduj dane z pliku reddit-truncated.json, każda linia to tablica znaków
data = LOAD 'reddit-truncated.json' AS (item:chararray);

-- 2) stwórz nową relację "reddits", niech każda linia wczytanego pliku zostanie przetworzona funkcją redditUdf.parseReddit()
reddits = FOREACH data GENERATE FLATTEN(redditUdf.parseReddit(item));

-- 3) pogrupuj reddity po polach subreddit oraz author
grouped = GROUP reddits BY (subreddit, author);

-- 4) zsumuj score dla zgrupowanych redditów
total_scores = FOREACH grouped GENERATE
    FLATTEN(reddits.subreddit) AS subreddit,
    FLATTEN(reddits.author) AS author,
    SUM(reddits.score) AS total_score;

-- 5) usuń duplikaty z relacji
results = DISTINCT total_scores;

-- 6) zapisz wynik, rozdziel pola przecinkiem
STORE results INTO 'reddit-result' USING PigStorage(',');