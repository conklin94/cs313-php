CREATE TABLE course (
  id SERIAL PRIMARY KEY,
  name VARCHAR(60) NOT NULL,
  course_code VARCHAR(10) NOT NULL
);

CREATE TABLE note (
  id SERIAL PRIMARY KEY,
  date DATE NOT NULL,
  content TEXT NOT NULL,
  course_id INT NOT NULL REFERENCES course(id)
);

INSERT INTO course(name, course_code) VALUES ('WEB II', 'CS 313');
INSERT INTO course(name, course_code) VALUES ('WEB I', 'CS 213');
