-- Inserindo Tag:

INSERT INTO tag (name, backgroundColor, borderColor, slug) VALUES ('Bootstrap', '#7E12F8', '#650ec6', 'bootstrap');

-- Inserindo relação Many to Many: Tag x Project

INSERT INTO relation_tag_project (tag_id, project_id) VALUES (2, 1);

-- Inserindo Formations

INSERT INTO formation (name, year, link) VALUES ("Curso de PHP", 2024, 'https://google.com/');
INSERT INTO formation (name, year, link) VALUES ("Curso de Javascript", 2023, 'https://google.com/');
INSERT INTO formation (name, year, link) VALUES ("Curso de Python", 2022, 'https://google.com/');
