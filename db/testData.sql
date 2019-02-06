ALTER TABLE book ALTER COLUMN title TYPE VARCHAR(100);

ALTER TABLE book ALTER COLUMN author TYPE VARCHAR(100);

INSERT INTO book
( title
, image_link
, description
, author
, created_by
, creation_date)
VALUES
( 'Harry Potter and the Sorcerer''s Stone'
, 'https://images-na.ssl-images-amazon.com/images/I/51HSkTKlauL._SX346_BO1,204,203,200_.jpg'
, 'The first book of the Harry Potter series. It tells the story of a young boy who discovers he is a wizard.'
, 'J.K. Rowling'
, (SELECT reader_id
   FROM reader
   WHERE username = 'admin')
, current_date);

INSERT INTO book
( title
, image_link
, description
, author
, created_by
, creation_date)
VALUES
( '1984'
, 'https://i.pinimg.com/originals/1c/17/a6/1c17a622672bfda98fac05092092bcf4.jpg'
, 'A dystopian story about a controlling government.'
, 'George Orwell'
, (SELECT reader_id
   FROM reader
   WHERE username = 'admin')
, current_date);

INSERT INTO book
( title
, image_link
, description
, author
, created_by
, creation_date)
VALUES
( 'The Fourth Age'
, 'https://images-na.ssl-images-amazon.com/images/I/415ROtdELoL._SX340_BO1,204,203,200_.jpg'
, 'Smart Robots, Conscious Computers, and the Future of Humanity.'
, 'Byron Reese'
, (SELECT reader_id
   FROM reader
   WHERE username = 'admin')
, current_date);

INSERT INTO book
( title
, image_link
, description
, author
, created_by
, creation_date)
VALUES
( 'Never Go Back'
, 'https://upload.wikimedia.org/wikipedia/en/thumb/d/d4/Never_go_back_by_lee_child.png/220px-Never_go_back_by_lee_child.png'
, 'Jack Reacher, a former military cop returns to the military and comes up against significant resistance.'
, 'Lee Child'
, (SELECT reader_id
   FROM reader
   WHERE username = 'admin')
, current_date);

INSERT INTO book
( title
, image_link
, description
, author
, created_by
, creation_date)
VALUES
( 'The Gunslinger'
, 'https://images-na.ssl-images-amazon.com/images/I/51HDlI3s9eL.jpg'
, 'The first volume to the Dark Tower series. It begins the tale of Roland Deschain, the last gunslinger from another world on a quest to find the dark tower.'
, 'Stephen King'
, (SELECT reader_id
   FROM reader
   WHERE username = 'admin')
, current_date);

INSERT INTO book
( title
, image_link
, description
, author
, created_by
, creation_date)
VALUES
( 'The Notebook'
, 'https://upload.wikimedia.org/wikipedia/en/thumb/d/d9/The_Notebook_Cover.jpg/220px-The_Notebook_Cover.jpg'
, 'A tale of rekindled love following World War 2.'
, 'Nicholas Sparks'
, (SELECT reader_id
   FROM reader
   WHERE username = 'admin')
, current_date);

INSERT INTO review
( reader_id
, book_id
, stars
, comments
, creation_date)
VALUES
( (SELECT reader_id
   FROM reader
   WHERE username = 'admin')
, (SELECT book_id
   FROM book
   WHERE title = 'Harry Potter and the Sorcerer''s Stone')
, 5
, 'A classic that everyone shoul read at least once'
, current_date);

INSERT INTO review
( reader_id
, book_id
, stars
, comments
, creation_date)
VALUES
( (SELECT reader_id
   FROM reader
   WHERE username = 'admin')
, (SELECT book_id
   FROM book
   WHERE title = '1984')
, 5
, 'This book is a chilling view of what could happen with an overly powerful government.'
, current_date);

INSERT INTO review
( reader_id
, book_id
, stars
, comments
, creation_date)
VALUES
( (SELECT reader_id
   FROM reader
   WHERE username = 'admin')
, (SELECT book_id
   FROM book
   WHERE title = 'The Fourth Age')
, 5
, 'This book is an interesting take on the progress of humanity and the path it is now following.'
, current_date);

INSERT INTO review
( reader_id
, book_id
, stars
, comments
, creation_date)
VALUES
( (SELECT reader_id
   FROM reader
   WHERE username = 'admin')
, (SELECT book_id
   FROM book
   WHERE title = 'Never Go Back')
, 4
, 'It was a good book, but by no means amazing.'
, current_date);

INSERT INTO review
( reader_id
, book_id
, stars
, comments
, creation_date)
VALUES
( (SELECT reader_id
   FROM reader
   WHERE username = 'admin')
, (SELECT book_id
   FROM book
   WHERE title = 'The Gunslinger')
, 5
, 'A very interesting tale.'
, current_date);

INSERT INTO review
( reader_id
, book_id
, stars
, comments
, creation_date)
VALUES
( (SELECT reader_id
   FROM reader
   WHERE username = 'admin')
, (SELECT book_id
   FROM book
   WHERE title = 'The Notebook')
, 3
, 'It was a decent love story, if you''re into that sort of thing.'
, current_date);

INSERT INTO vote
( reader_id
, book_id
, is_up)
VALUES
( (SELECT reader_id
   FROM reader
   WHERE username = 'admin')
, (SELECT book_id
   FROM book
   WHERE title = 'Harry Potter and the Sorcerer''s Stone')
, 'true');

INSERT INTO vote
( reader_id
, book_id
, is_up)
VALUES
( (SELECT reader_id
   FROM reader
   WHERE username = 'admin')
, (SELECT book_id
   FROM book
   WHERE title = '1984')
, 'true');

INSERT INTO vote
( reader_id
, book_id
, is_up)
VALUES
( (SELECT reader_id
   FROM reader
   WHERE username = 'admin')
, (SELECT book_id
   FROM book
   WHERE title = 'The Fourth Age')
, 'true');

INSERT INTO vote
( reader_id
, book_id
, is_up)
VALUES
( (SELECT reader_id
   FROM reader
   WHERE username = 'admin')
, (SELECT book_id
   FROM book
   WHERE title = 'Never Go Back')
, 'true');

INSERT INTO vote
( reader_id
, book_id
, is_up)
VALUES
( (SELECT reader_id
   FROM reader
   WHERE username = 'admin')
, (SELECT book_id
   FROM book
   WHERE title = 'The Gunslinger')
, 'true');

INSERT INTO vote
( reader_id
, book_id
, is_up)
VALUES
( (SELECT reader_id
   FROM reader
   WHERE username = 'admin')
, (SELECT book_id
   FROM book
   WHERE title = 'The Notebook')
, 'false');

ALTER TABLE book
ADD UNIQUE (title, author);

ALTER TABLE review
ADD UNIQUE (reader_id, book_id);

ALTER TABLE vote
ADD UNIQUE (reader_id, book_id);
