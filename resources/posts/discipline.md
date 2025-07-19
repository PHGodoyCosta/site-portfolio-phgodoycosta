## Apresentação

Tudo começou com o meu jeitinho preguiçoso... 😁 <br>
Estava no auge do meu 2° Ano de Ensino Médio, em 2023, em uma escola pública do Mato Grosso do Sul. Por não ter muitos recursos, normalmente a maior parte das aulas se resumia em copiar textos no quadro, copiar questões e depois responder. Acontece que isso levava muito tempo, nós tinhamos que passar de duas a três aulas nesse processo para realizar atividades simples!

E começei a me perguntar, será que não tem nenhuma forma mais simples de resolver esse problema? Será possível criar algum aplicativo para computador em que os alunos pudessem realizar os deveres?

## Início do projeto

Assim nasceu o Discipline, não encontrei nenhuma alternativa realmente viável ou boa para escolas, professores ou alunos que quisessem fazer provas de enem ou vestibular, então decidi arregaçar as mangar e começar a trabalhar.

Na época, a minha comunidade de programação Code Company, estava funcionando, então abri um projeto Open Source e começamos a buscar interessados. Fiz um post no Tab News: <br>
[https://www.tabnews.com.br/codecompanybrasil/top-6-servicos-uteis-que-voce-pode-encontrar-na-deep-web](https://www.tabnews.com.br/codecompanybrasil/top-6-servicos-uteis-que-voce-pode-encontrar-na-deep-web)
<br><br>
E divulguei em alguns grupos do whatsapp, até conseguirmos uma boa equipe. Fizemos um evento de abertura, com uma espécie de apresentação e reunião no discord, juntamos os interessados, e começamos a botar a mão na massa!

## Aplicação Prática

Inicialmente decidimos focar nos vestibulares por eles estarem se aproximando na época, então o programa consistia em uma aba que tinham provas do Enem de vários anos, e os usuários podiam clickar e fazer a hora que quisessem.

Consegui o apoio da coordenação e alguns professores da minha escola, e conseguimos levar os alunos alguns dias na sala de informática para isso:

<div align="center">
    <video src="/images/posts/discipline/v2.mp4" width="640" height="360" controls>
Seu navegador não suporta o elemento de vídeo.
    </video>
    <video src="/images/posts/discipline/v3.mp4" width="640" height="360" controls>
    Seu navegador não suporta o elemento de vídeo.
    </video>
</div>


## Evolução do programa

Durante o desenvolvimento, ele teve vários designs, foi remodelado, e como estavamos trabalhando em equipe, foi a primeira fez que o usei o **Figma**, para planejar tudo antes de construir. Conheci a ferramenta e me apaixonei imediatamente, percebi que para qualquer tela que eu fazia, economizava muito mais tempo primeiro planejando ela, e depois indo para o HTML e CSS.

Um dos visuais iniciais foi esse:

<div align="center">
    <img src="/images/posts/discipline/tela_inicial_discipline.png" alt="Tela inicial do Discipline" width="640">
</div>

Depois fomos aprimorando, as questões eram como em uma folha corrida:

<div align="center">
    <img src="/images/posts/discipline/questões_discipline.png" alt="Foto das questões" width="640">
</div>

E com o tempo fomos adicionando mais detalhes tambem, colocamos um cronometro e mais funções:

<div align="center">
    <img src="/images/posts/discipline/tela_de_questões.png" alt="Foto da Tela atualizada em produção" width="640">
</div>

## Landing Page

E uma Landing Page para divulgar melhor o projeto, e servir como fonte de download do programa, porém atualmente ela está fora do ar e código está fechado, mas sua aparencia é essa:

Como a intenção era divulgar o projeto para a maior quantidade de pessoas, montamos essa Landing Page com algumas informações e link para download, porém atualmente ela está fora do ar e código está fechado, mas sua aparencia é essa

<div align="center">
    <video src="/images/posts/discipline/landing_page.webm" width="640" height="360" controls>
    Seu navegador não suporta o elemento de vídeo.
    </video>
</div>

Projeto simples, com **React** e **TypeScript**

## Operação SaaS

Com a versão Beta pronta, percebemos que tinhamos algo interessante em mãos, nesse estágio nossa equipe já estava bem reduzida porque a maioria que veio do TabNews e outros, já tinham desistido ou práticamente não estavam participando.

Percebemos que era uma ideia interessante, e um código que se bem aprimorado, poderia ser vendido para colégios particulares ou até criar um ecossitema de ferramentas para estudantes...

Por isso, separamos o projeto e deixamos parte do código fechado, apenas comigo, o Pablo Pereira e o Guilherme Cadilhe.

No geral faziamos reuniões frequentes pelo Discord (comunidade Code Company), Whatsapp, e uma ferramenta que tinhamos recem descobertos: O Gather

<div align="center">
    <img src="/images/posts/discipline/Reunião_Discipline.png" alt="Reunião com professor no Gather.">
</div>
<br>

No fim, começamos a desenvolver algo nessa área, mas acabamos fazendo uma pausa porque percebemos que era necessário bastante esforço (que levaria certo tempo, pois nossa disponibilidade era limitada) e estavamos em outro momento da vida, escolhemos nos esforçar em outro projeto que estavamos trabalhando junto tambem, e acabamos fazendo uma pausa nele.

Atualmente (26/05/2025), o projeto segue parado, porém ainda temos intenção de dar segmento a ele em algum momento.

## Tecnologias e Repositórios

Inicialmente, como pensavamos em um programa de computador, começamos utilizando **Electron** e **React**

**Repositório:** [https://github.com/codecompanybrasil/Discipline-Aluno](https://github.com/codecompanybrasil/Discipline-Aluno)


![TypeScript](https://img.shields.io/badge/Code-TypeScript-3178C6?style=for-the-badge&logo=typescript)
![React](https://img.shields.io/badge/Frontend-React-61DAFB?style=for-the-badge&logo=react)
![Electron](https://img.shields.io/badge/Electron-Electron-47848F?style=for-the-badge&logo=electron)

Depois entendemos que era interessante ter uma versão Online, em site, que pudessemos monitorar, analisar melhor a atividade dos alunos, porque o programa está incluso na parte Open Source.

Então montamos aproveitamos o que tinhamos usado no React, e adaptamos o Front para usar nossa API.

Inicialmente, começamos usando utilizando **Next.JS** para melhorar o SEO, mas como o nosso servidor não era tão bom, tivemos problemas para buildar o código em produção e optamos por voltar com o projeto apenas em React mesmo.

<hr>

**Repositório:** [https://github.com/codecompanybrasil/discipline-web](https://github.com/codecompanybrasil/discipline-web)

![TypeScript](https://img.shields.io/badge/Code-TypeScript-3178C6?style=for-the-badge&logo=typescript)
![React](https://img.shields.io/badge/Frontend-React-61DAFB?style=for-the-badge&logo=react)

Para atualizar as provas no Enem, tive que pessoalmente pegar todas as informações e imagens e adaptar para o nosso formato JSON. Percebi o quanto isso era chato e demorado e criei um outro repositório, para ser um criador de questões dinámico. Usando de funções do React para deixar essa função mais leve e resposiva.

Não lembro ao certo porque criei um repositório diferente para essa feature, mas a ideia era juntar em algum momento com o projeto original.

Atualmente (30/05/2025), ele está descontinuado assim como o resto do projeto, mas pretendemos dar continuidade a tudo isso

<hr>

**Repositório:** [https://github.com/codecompanybrasil/discipline-core](https://github.com/codecompanybrasil/discipline-core)

![TypeScript](https://img.shields.io/badge/Code-TypeScript-3178C6?style=for-the-badge&logo=typescript)
![React](https://img.shields.io/badge/Frontend-React-61DAFB?style=for-the-badge&logo=react)
![Scss](https://img.shields.io/badge/Frontend-Sass-C96195?style=for-the-badge&logo=sass)

Como já tinhamos vários repositórios aqui, e todos eles usavam de mesmos recursos do Discipline: Imagens, Icones, Botões, Itens de front-end... E todos usavam react, então foi uma ideia do Pablo criar um módulo NPM para facilitar a padronização nos projetos.

Assim nasceu o **Discipline Core**

<hr>

**Repositório: 🔒 Privado** 

![TypeScript](https://img.shields.io/badge/Code-TypeScript-3178C6?style=for-the-badge&logo=typescript)
![NestJS](https://img.shields.io/badge/Backend-NestJS-E0234E?style=for-the-badge&logo=nestjs&logoColor=white)


Com a ideia de deixar parte do código fechado tambem montamos uma API, porém não posso mostra-la aqui 😁

## Experiências e Aprendizados

Esse foi o primeiro projeto relevante que eu trabalhei. Quando pensei em algo Open Source, tive que **vender a minha ideia**, **montar e participar de uma equipe**, participar de **reuniões semanais**, usar o Git para **codar em conjunto**, foi meu primeiro grande projeto com **React**, tive que conversar e fazer parcerias com professores e coordenadores da minha escola e tudo mais relacionado
