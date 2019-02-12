CREATE TABLE Scriptures (
    id SERIAL NOT NULL PRIMARY KEY,
    book VARCHAR(100) NOT NULL,
    chapter SMALLINT NOT NULL,
    verse SMALLINT NOT NULL,
    content TEXT NOT NULL
);

INSERT INTO Scriptures (book, chapter, verse, content)
VALUES ('John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.');

INSERT INTO Scriptures (book, chapter, verse, content)
VALUES ('Doctrine and Covenants', 88, 49, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.');

INSERT INTO Scriptures (book, chapter, verse, content)
VALUES ('Doctrine and Covenants', 93, 28, 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.');

INSERT INTO Scriptures (book, chapter, verse, content)
VALUES ('Mosiah', 16, 9, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');

CREATE TABLE Topic (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

INSERT INTO Topic (name)
VALUES
('Faith'),
('Sacrifice'),
('Charity');

CREATE TABLE Scripture_Topic (
    id SERIAL PRIMARY KEY,
    scripture_id INTEGER NOT NULL,
    topic_id INTEGER NOT NULL,
    CONSTRAINT fk_scripture FOREIGN KEY (scripture_id)
    REFERENCES Scriptures(id),
    CONSTRAINT fk_topic FOREIGN KEY (topic_id)
    REFERENCES Topic(id)
);
