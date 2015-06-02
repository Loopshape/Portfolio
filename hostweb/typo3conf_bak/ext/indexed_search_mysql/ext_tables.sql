CREATE TABLE index_fulltext (
  FULLTEXT KEY fulltextdata (fulltextdata)
);


CREATE TABLE index_words (
  FULLTEXT KEY baseword_full (baseword)
);