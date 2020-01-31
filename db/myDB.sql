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
