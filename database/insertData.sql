-- Inserindo Tag:

INSERT INTO tag (name, backgroundColor, borderColor, slug) VALUES ('Bootstrap', '#7E12F8', '#650ec6', 'bootstrap');

-- Inserindo relação Many to Many: Tag x Project

INSERT INTO relation_tag_project (tag_id, project_id) VALUES (2, 1);

-- Inserindo Formations

INSERT INTO formation (name, year, link) VALUES ("Curso de PHP", 2024, 'https://google.com/');
INSERT INTO formation (name, year, link) VALUES ("Curso de Javascript", 2023, 'https://google.com/');
INSERT INTO formation (name, year, link) VALUES ("Curso de Python", 2022, 'https://google.com/');

-- Insert Project

INSERT INTO project (name, description, repository, slug, isPosted, isDestaque) VALUES ("Discipline", "Uma alternativa para os estudantes em geral conseguirem fazer avaliações e atividades de forma online, fácil e dinamica", "https://github.com/codecompanybrasil/discipline-web", "discipline", 1, 1);

INSERT INTO project (name, description, slug, isPosted, isDestaque) VALUES ("Temdebom", "Um site para que as pessoas pudessem encontrar com maior facilidade os comércios, vendas e coisas interessantes na cidade", "temdebom", 0, 1);

INSERT INTO project (name, description, slug, isPosted, isDestaque) VALUES ("Code Company Brasil", "Minha comunidade de programação, que rendeu bons projetos, aprendizados, networking e me possibilitou conhecer e trabalhar com programadores sensacionais", "code-company-brasil", 0, 1);

INSERT INTO project (name, description, repository, slug, isPosted, isDestaque) VALUES ("Youtube Conversor", "Um aplicativo para windows que permite fazer o download gratuito de vídeos e playlists do youtube, de maneira prática e rápida", "https://github.com/PHGodoyCosta/Youtube_Downloader", "youtube-conversor", 1, 1);

INSERT INTO project (name, description, repository, slug, isPosted, isDestaque) VALUES ("Site Portfólio", "Esse site, embora 'simples', é um sistema completo feito com Laravel + MySQL", "https://github.com/PHGodoyCosta/site-portfolio-phgodoycosta", "site-porfolio", 1, 1);

INSERT INTO project (name, description, repository, slug, isPosted) VALUES ("Code Bot", "Um bot para discord com python completo, feito ajudar a gerenciar a Code Company", "https://github.com/codecompanybrasil/Code-bot", "code-bot", 1);

INSERT INTO project (name, description, repository, slug, isPosted) VALUES ("VideoTube", "Uma cópia parcial do Youtube, com autenticação, upload de vídeos, criação de canais e a possíbilidade de assisti-los", "https://github.com/PHGodoyCosta/VideoTube", "video-tube", 1);

--Tag para os projects

--Discipline:

INSERT INTO relation_tag_project (tag_id, project_id) VALUES (4, 9);
INSERT INTO relation_tag_project (tag_id, project_id) VALUES (6, 9);
INSERT INTO relation_tag_project (tag_id, project_id) VALUES (10, 9);
INSERT INTO relation_tag_project (tag_id, project_id) VALUES (11, 9);
INSERT INTO relation_tag_project (tag_id, project_id) VALUES (2, 9);

--TemdeBom

INSERT INTO relation_tag_project (tag_id, project_id) VALUES (4, 10);
INSERT INTO relation_tag_project (tag_id, project_id) VALUES (9, 10);
INSERT INTO relation_tag_project (tag_id, project_id) VALUES (2, 10);

-- Youtube Conversor

INSERT INTO relation_tag_project (tag_id, project_id) VALUES (1, 11);
INSERT INTO relation_tag_project (tag_id, project_id) VALUES (5, 11);
INSERT INTO relation_tag_project (tag_id, project_id) VALUES (10, 11);

-- Code Company

INSERT INTO relation_tag_project (tag_id, project_id) VALUES (3, 12);
INSERT INTO relation_tag_project (tag_id, project_id) VALUES (18, 12);

-- Site Porfólio

INSERT INTO relation_tag_project (tag_id, project_id) VALUES (3, 13);
INSERT INTO relation_tag_project (tag_id, project_id) VALUES (8, 13);
INSERT INTO relation_tag_project (tag_id, project_id) VALUES (18, 13);
INSERT INTO relation_tag_project (tag_id, project_id) VALUES (2, 13);

-- Code Bot

INSERT INTO relation_tag_project (tag_id, project_id) VALUES (5, 14);

-- VideoTube

INSERT INTO relation_tag_project (tag_id, project_id) VALUES (4, 15);
INSERT INTO relation_tag_project (tag_id, project_id) VALUES (6, 15);
INSERT INTO relation_tag_project (tag_id, project_id) VALUES (11, 15);
