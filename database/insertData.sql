-- Inserindo Tag:

INSERT INTO tag (name, backgroundColor, borderColor, slug) VALUES ('Bootstrap', '#7E12F8', '#650ec6', 'bootstrap');

-- Inserindo relação Many to Many: Tag x Project

INSERT INTO relation_tag_project (tag_id, project_id) VALUES (2, 1);
