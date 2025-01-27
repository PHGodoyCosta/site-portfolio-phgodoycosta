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
