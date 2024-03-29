DROP SCHEMA scripture CASCADE;

CREATE SCHEMA scripture;

CREATE TABLE scripture.scriptures 
(scripture_id SERIAL PRIMARY KEY,
 book TEXT NOT NULL,
 chapter INT NOT NULL,
 verse INT NOT NULL,
 content TEXT NOT NULL
);

CREATE TABLE scripture.topic
(topic_id SERIAL PRIMARY KEY,
 name TEXT NOT NULL
);

CREATE TABLE scripture.topic_scripture
(topic_id INT NOT NULL REFERENCES scripture.topic(topic_id),
 scripture_id INT NOT NULL REFERENCES scripture.scriptures(scripture_id),
 PRIMARY KEY (topic_id, scripture_id)
);

INSERT INTO scripture.topic (name) VALUES ('Faith'), ('Hope'), ('Charity');

INSERT INTO scripture.scriptures (book, chapter, verse, content) VALUES ('John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.');

INSERT INTO scripture.scriptures (book, chapter, verse, content) VALUES ('Doctrine and Covenants', 88, 49, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.');

INSERT INTO scripture.scriptures (book, chapter, verse, content) VALUES ('Doctrine and Covenants', 93, 28, 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.');

INSERT INTO scripture.scriptures (book, chapter, verse, content) VALUES ('Mosiah', 16, 9, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');