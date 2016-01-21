from com.xhaus.jyson import JysonCodec as json

@outputSchema("(subreddit:chararray,author:chararray,score:int)")
def parseReddit(reddit_json):
    reddit = json.loads(reddit_json)
    return str(reddit["subreddit"]), str(reddit["author"]), int(reddit["score"])