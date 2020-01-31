-- Create Tables
CREATE TABLE students(
    student_id SERIAL PRIMARY KEY,
    student_name VARCHAR (255) NOT NULL,
    teacher_name VARCHAR (255) NOT NULL,
    grade_level VARCHAR (255),
    class_time VARCHAR (255) NOT NULL
);

CREATE TABLE master_assessment(
    assessment_id SERIAL PRIMARY KEY,
    assessment_title VARCHAR (255) NOT NULL,
    description VARCHAR (255),
    subject VARCHAR (255) NOT NULL
);

CREATE TABLE master_question(
    question_id SERIAL PRIMARY KEY,
    assessment_id INTEGER REFERENCES master_assessment(assessment_id),
    description VARCHAR (255),
    subject VARCHAR (255) NOT NULL
);

CREATE TABLE assessment_score(
    student_id INTEGER REFERENCES students(student_id),
    assessment_id INTEGER REFERENCES master_assessment(assessment_id),
    score VARCHAR (255) NOT NULL,
    PRIMARY KEY (student_id, assessment_id)
);

CREATE TABLE question_score(
    student_id INTEGER REFERENCES students(student_id),
    question_id INTEGER REFERENCES master_question(question_id),
    score BOOLEAN NOT NULL,
    PRIMARY KEY (student_id, question_id)
);

--Populate Student Table
INSERT INTO students(student_id, student_name, teacher_name, grade_level, class_time)    
VALUES    
 	(DEFAULT, 'ma', 'Jennica Harrison', 'Kindergarten', 'AM'),
 	(DEFAULT, 'eb', 'Jennica Harrison', 'Kindergarten', 'AM'),
 	(DEFAULT, 'hc', 'Jennica Harrison', 'Kindergarten', 'AM'),
 	(DEFAULT, 'ec', 'Jennica Harrison', 'Kindergarten', 'AM'),
 	(DEFAULT, 'lc', 'Jennica Harrison', 'Kindergarten', 'AM'),
 	(DEFAULT, 'jc', 'Jennica Harrison', 'Kindergarten', 'AM'),
 	(DEFAULT, 'jd', 'Jennica Harrison', 'Kindergarten', 'AM'),
 	(DEFAULT, 'le', 'Jennica Harrison', 'Kindergarten', 'AM'),
 	(DEFAULT, 'ek', 'Jennica Harrison', 'Kindergarten', 'AM'),
 	(DEFAULT, 'jm', 'Jennica Harrison', 'Kindergarten', 'AM'),
 	(DEFAULT, 'nm', 'Jennica Harrison', 'Kindergarten', 'AM'),
 	(DEFAULT, 'mn', 'Jennica Harrison', 'Kindergarten', 'AM'),
 	(DEFAULT, 'ro', 'Jennica Harrison', 'Kindergarten', 'AM'),
 	(DEFAULT, 'cr', 'Jennica Harrison', 'Kindergarten', 'AM'),
 	(DEFAULT, 'ar', 'Jennica Harrison', 'Kindergarten', 'AM'),
 	(DEFAULT, 'kr', 'Jennica Harrison', 'Kindergarten', 'AM'),
 	(DEFAULT, 'bs', 'Jennica Harrison', 'Kindergarten', 'AM'),
 	(DEFAULT, 'ms', 'Jennica Harrison', 'Kindergarten', 'AM'),
 	(DEFAULT, 'ts', 'Jennica Harrison', 'Kindergarten', 'AM'),
 	(DEFAULT, 'kt', 'Jennica Harrison', 'Kindergarten', 'AM'),
 	(DEFAULT, 'kt', 'Jennica Harrison', 'Kindergarten', 'AM'),
 	(DEFAULT, 'gw', 'Jennica Harrison', 'Kindergarten', 'AM'),
 	(DEFAULT, 'pw', 'Jennica Harrison', 'Kindergarten', 'AM'),
 	(DEFAULT, 'ew', 'Jennica Harrison', 'Kindergarten', 'AM'),
 	(DEFAULT, 'oy', 'Jennica Harrison', 'Kindergarten', 'AM'),
 	(DEFAULT, 'eb', 'Jennica Harrison', 'Kindergarten', 'PM'),
 	(DEFAULT, 'tb', 'Jennica Harrison', 'Kindergarten', 'PM'),
 	(DEFAULT, 'bb', 'Jennica Harrison', 'Kindergarten', 'PM'),
 	(DEFAULT, 'kb', 'Jennica Harrison', 'Kindergarten', 'PM'),
 	(DEFAULT, 'cb', 'Jennica Harrison', 'Kindergarten', 'PM'),
 	(DEFAULT, 'ec', 'Jennica Harrison', 'Kindergarten', 'PM'),
 	(DEFAULT, 'ag', 'Jennica Harrison', 'Kindergarten', 'PM'),
 	(DEFAULT, 'dg', 'Jennica Harrison', 'Kindergarten', 'PM'),
 	(DEFAULT, 'agc','Jennica Harrison', 'Kindergarten', 'PM'),
 	(DEFAULT, 'jgc','Jennica Harrison', 'Kindergarten', 'PM'),
 	(DEFAULT, 'ah', 'Jennica Harrison', 'Kindergarten', 'PM'),
 	(DEFAULT, 'aj', 'Jennica Harrison', 'Kindergarten', 'PM'),
 	(DEFAULT, 'rk', 'Jennica Harrison', 'Kindergarten', 'PM'),
 	(DEFAULT, 'el', 'Jennica Harrison', 'Kindergarten', 'PM'),
 	(DEFAULT, 'om', 'Jennica Harrison', 'Kindergarten', 'PM'),
 	(DEFAULT, 'ao', 'Jennica Harrison', 'Kindergarten', 'PM'),
 	(DEFAULT, 'ap', 'Jennica Harrison', 'Kindergarten', 'PM'),
 	(DEFAULT, 'es', 'Jennica Harrison', 'Kindergarten', 'PM'),
 	(DEFAULT, 'rs', 'Jennica Harrison', 'Kindergarten', 'PM'),
 	(DEFAULT, 'rs', 'Jennica Harrison', 'Kindergarten', 'PM'),
 	(DEFAULT, 'tt', 'Jennica Harrison', 'Kindergarten', 'PM'),
 	(DEFAULT, 'st', 'Jennica Harrison', 'Kindergarten', 'PM'),
 	(DEFAULT, 'mt', 'Jennica Harrison', 'Kindergarten', 'PM'),
 	(DEFAULT, 'xt', 'Jennica Harrison', 'Kindergarten', 'PM'),
 	(DEFAULT, 'sw', 'Jennica Harrison', 'Kindergarten', 'PM'),
 	(DEFAULT, 'rm', 'Jennica Harrison', 'Kindergarten', 'PM');


