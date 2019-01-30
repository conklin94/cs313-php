CREATE TABLE reader
( reader_id serial PRIMARY KEY
, username VARCHAR(30) NOT NULL
, first_name VARCHAR(30) NOT NULL
, last_name VARCHAR(30) NOT NULL
, email VARCHAR(30) NOT NULL
, password VARCHAR(30) NOT NULL
);

CREATE TABLE book
( book_id serial PRIMARY KEY
, title VARCHAR(30) NOT NULL
, image_link VARCHAR(255)
, description text NOT NULL
, author VARCHAR(30) NOT NULL
, created_by integer NOT NULL
, creation_date DATE NOT NULL
, FOREIGN KEY (created_by) REFERENCES reader (reader_id)
);

CREATE TABLE review
( review_id serial PRIMARY KEY
, reader_id integer NOT NULL
, book_id integer NOT NULL
, stars decimal NOT NULL
, comments text NOT NULL
, creation_date date NOT NULL
, FOREIGN KEY (reader_id) REFERENCES reader (reader_id)
, FOREIGN KEY (book_id) REFERENCES book (book_id)
);

CREATE TABLE vote
( vote_id serial PRIMARY KEY
, reader_id integer NOT NULL
, book_id integer NOT NULL
, is_up boolean NOT NULL
, FOREIGN KEY (reader_id) REFERENCES reader (reader_id)
, FOREIGN KEY (book_id) REFERENCES book (book_id)
);

INSERT INTO reader
( username
, first_name
, last_name
, email
, password
)
VALUES
( 'admin'
, 'admin'
, 'admin'
, 'admin@example.com'
, 'password'
);

INSERT INTO book
( title
, image_link
, description
, author
, created_by
, creation_date
)
VALUES
( 'The Hobbit'
, 'https://images-na.ssl-images-amazon.com/images/I/51zOT%2B%2B-FeL._SX331_BO1,204,203,200_.jpg'
, 'The story before the of The Lord of the Rings.'
, 'J.R.R. Tolkien'
, (SELECT reader_id
   FROM reader
   WHERE username = 'admin')
, current_date
);

INSERT INTO review
( reader_id
, book_id
, stars
, comments
, creation_date
)
VALUES
( (SELECT reader_id
   FROM reader
   WHERE username = 'admin')
, (SELECT book_id
   FROM book
   WHERE title = 'The Hobbit')
, 5
, 'This was a great book.'
, current_date
);

INSERT INTO vote
( reader_id
, book_id
, is_up
)
VALUES
( (SELECT reader_id
   FROM reader
   WHERE username = 'admin')
, (SELECT book_id
   FROM book
   WHERE title = 'The Hobbit')
, 'true'
);
