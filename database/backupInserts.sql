
-- Insert Tags:

INSERT INTO tag (name, backgroundColor, borderColor, slug) VALUES ('PHP', '#7277ad', '#5b5f8a', 'php');

INSERT INTO tag (name, backgroundColor, borderColor, slug) VALUES ('Typescript', '#2f74c0', '#265d9a', 'typescript');

INSERT INTO tag (name, backgroundColor, borderColor, slug) VALUES ('Python', '#356e9f', '#2a587f', 'python');

INSERT INTO tag (name, backgroundColor, borderColor, slug) VALUES ('React', '#00d8ff', '#00c2e6', 'react');

INSERT INTO tag (name, backgroundColor, borderColor, slug) VALUES ('C#', '#95478e', '#671473', 'c-sharp');

INSERT INTO tag (name, backgroundColor, borderColor, slug) VALUES ('SQL', '#00758f', '#005e72', 'sql');

INSERT INTO tag (name, backgroundColor, borderColor, slug) VALUES ('HTML e CSS', '#039BE6', '#f4470b', 'html-e-css');

INSERT INTO tag (name, backgroundColor, borderColor, slug, category) VALUES ('Laravel', '#ff291a', '#cc2115', 'laravel', 'framework');

INSERT INTO tag (name, backgroundColor, borderColor, slug, category) VALUES ('TypeORM', '#f7a600', '#c68500', 'typeorm', 'framework');

INSERT INTO tag (name, backgroundColor, borderColor, slug, category) VALUES ('ElectronJS', '#458590', '#376a73', 'electronjs', 'framework');

INSERT INTO tag (name, backgroundColor, borderColor, slug, category, isEstudando) VALUES ('NestJS', '#e11e4d', '#b4183e', 'nestjs', 'framework', 1);

INSERT INTO tag (name, backgroundColor, borderColor, slug, category, isEstudando) VALUES ('Sass', '#c66394', '#9e4f76', 'sass', 'framework', 1);

INSERT INTO tag (name, backgroundColor, borderColor, slug, category) VALUES ('NextJS', '#101010', '#0d0d0d', 'nextjs', 'framework');

INSERT INTO tag (name, slug, category) VALUES ('Git', 'git', 'tool');
INSERT INTO tag (name, slug, category) VALUES ('Visual Studio Code', 'vscode', 'tool');
INSERT INTO tag (name, slug, category) VALUES ('Figma', 'figma', 'tool');
INSERT INTO tag (name, slug, category) VALUES ('Trello', 'trello', 'tool');
INSERT INTO tag (name, slug, category) VALUES ('Miro', 'miro', 'tool');
INSERT INTO tag (name, slug, category) VALUES ('Teams', 'teams', 'tool');
INSERT INTO tag (name, slug, category) VALUES ('Git Hub', 'github', 'tool');

INSERT INTO tag (name, slug, category) VALUES ('Excel', 'excel', 'extra');

-- Formations:

INSERT INTO formation (name, year, link, description) VALUES ("Curso de Python (Mundo 1 e 2)", 2019, 'https://www.cursoemvideo.com/curso/python-3-mundo-1/', 'Esse curso que me introduziu a programação, começei por python por um sonho de criança, que era fazer uma I.A igual ao Jarvis do Homem de Ferro, e no youtube achei tutoriais semelhantes com python, então decidi aprender a linguagem com essa finalidade e foi o curso que conquistou, aprendi lógica de programação, e a linguagem que eu mais me desenvolveria mais para frente.');

INSERT INTO formation (name, year, link, description) VALUES ("Curso de Javascript", 2020, 'https://www.cursoemvideo.com/curso/javascript/', 'Esse curso que me criou o interesse pela área da WEB, aprendi a introdução de HTML e CSS aqui e depois fui aprimorando sozinho, assistindo vídeos no youtube, "brincando" com o código, mas foi o que me fez gostar de front-end, e me deu um gás para focar nessa área.');

INSERT INTO formation (name, year, link, description) VALUES ("Curso de C#", 2021, 'https://www.youtube.com/playlist?list=PLx4x_zx8csUglgKTmgfVFEhWWBQCasNGi', 'Como C# é uma linguagem nativa para windows, decidi fazer o curso para ver se gostava dessa área, das linguagens que conheço até hoje, essa é a mais robusta e tipada. Foi com esse curso que aprendi POO, que mudou a forma como eu programava na época, porque depois disso, busquei essa estrutura nas outras linguagens e os códigos melhoraram 1000%.');

INSERT INTO formation (name, year, link, description) VALUES ("Curso de PHP", 2021, 'https://www.youtube.com/playlist?list=PLwXQLZ3FdTVEITn849NlfI9BGY-hk1wkq', 'PHP foi uma linguagem que eu aprendi por "obrigação". Eu tinha conseguido uma promoção muito boa na hostinger de um servidor por 5 anos, porém, só conseguia rodar PHP nele. E eu precisava, porque estava começando a Code Company e queria um lugar para hospedar os projetos. Acabei gostando muito da simplicidade da linguagem e da lógica de renderização server-side, valeu muito a pena o aprendizado');

INSERT INTO formation (name, year, link, description) VALUES ("Curso de SQL", 2022, 'https://www.youtube.com/playlist?list=PLx4x_zx8csUgQUjExcssR3utb3JIX6Kra', 'Percebi que para fazer um sistema completo, precisaria de um banco de dados. Primeiro fui aprendendo um pouco com documentações, vídeos, até chegar um ponto que realmente precisava aprender a lógica de banco e o SQL para avançar, e esse curso foi perfeito para isso.');

INSERT INTO formation (name, year, link, description) VALUES ("Curso de HTML e CSS (Módulo 1 e 2)", 2022, 'https://www.cursoemvideo.com/curso/html5-css3-modulo1/', 'Aqui eu já conhecia bem HTML e CSS, já tinha mexido muito com eles, porem, decidi calçar a "sandalhinha da humildade", e fazer esse curso. Porque outros problemas que eu tive em outras linguagens foi começar a fazer o curso, parar no metade e tentar resolver com o pouco que sabia, uma coisa que outro aprendizado posterior resolveria melhor. Como estava quebrando muito a cabeça com CSS, resolvi fazer o curso para me aprimorar, e na minha visão foi uma ótima decisão, a partir disso comecei a perder menos tempo com problemas simples.');

INSERT INTO formation (name, year, link, description) VALUES ("Curso de React", 2023, 'https://www.youtube.com/playlist?list=PLnDvRpP8BneyVA0SZ2okm-QBojomniQVO', 'Um framework que eu aprendi por "obrigação" tambem, estamos começando o projeto Discipline, e o Pablo e o Guilherme queriam usar React nele, porém eu não conhecia, então lembro de um dia que a minha familia foi em um sítio, eu baixei todas as aulas e maratonei. Um dos melhores frameworks que eu já usei, hoje gosto muito dele, e sempre dou preferência quando vou fazer algum projeto, sensacional. E tambem me ensinou essa lógica de componentização que encontramos em vários frameworks atualmente.');

INSERT INTO formation (name, year, link, description) VALUES ("Curso de Electron", 2023, 'https://www.youtube.com/playlist?list=PLWhiA_CuQkbCqT946EXFbvMQhK3oMpCsR', 'Tambem aprendi esse framework por causa do projeto Discipline, foi sensacional, uma das melhores coisas, aprendemos juntos porque queriamos fazer um App para qualquer sistema operacional e um site, nesse caso o hibrido seria a melhor opção. E hoje com certeza guardo esse na minha caixinha de ferramentas, baixa curva de aprendizado, framework sensacional!');

INSERT INTO formation (name, year, link, description) VALUES ("Curso de NextJS", 2024, 'https://www.youtube.com/playlist?list=PLnDvRpP8BnezfJcfiClWskFOLODeqI_Ft', 'Mas uma tecnologia que aprendi por causa do Discipline ksks, estavamos usando React com NestJS no backend, tivemos a ideia de adaptar para o Next, mas ninguem do time conhecia a tecnologia, então fomos aprender.Por um problema de limitação do servidor, tivemos que abandonar e voltar para o Nest mesmo, porém, me contribui bastante o aprendizado dessa nova alternativa para futuros projetos.');

INSERT INTO formation (name, year, link, description) VALUES ("Curso de Laravel", 2025, 'https://www.youtube.com/playlist?list=PLnDvRpP8BnewYKI1n2chQrrR4EYiJKbUG', 'Acabei aprendendo contrariado, tive um contato uns anos antes, mas pensava, PHP já é simples, para que um framework? Inocência minha ksksk, aproveitei a oportunidade desse site portfólio para aprender, desenvolver e fazer meu projeto relevante com ele. Framework maravilhoso, me fez olhar PHP com outros olhos. Confesso que não assisti o curso inteiro, porque consegui quase tudo com a documentação e o Chat GPT. E que maravilha esse Eloquent 🤩, deixou o TypeORM no chinelo.');

-- Projects

