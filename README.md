# Maitre-Híbrido

## Fullstack: backend + frontend + mobile

<a href="https://www.behance.net/gallery/63155961/Maitre">Apresentaçao no behance</a>

##### ja trabalho com desenvolvimento web e desktop a muito anos como fullstack, mobile depois que entrei no angular passei a desenvolver aplicações híbridas - depois posto algo por aqui. Não posto postar o código aqui porque são aplicações proprietárias e oq ue facilitaria a exploraçãod e falhas no sistema permitindo maior vulnerabilidade dos sistemas - além do código, embora seja eu o programador, não é mais meu e sim da empresa - publicá-los seria falta de ética. Atualmente estou me aprofundando nas novas concepções de design UX/UI.

#### Trabalho descontinuado v1.2

<p>Trata-se de um trabalho acadêmico iniciado para um amigo e foi descontinuado devido a faculdade permitir que outro aluno fizesse o mesmo trabalho "plagiando" a ideologia deste sistema. Para provar isso, existem e-mails enviados para o corrdenador do curso de sistema de informação e para a professora de TCC pedindo permissões para realizar o tema antes do inicio da disciplina garantindo assim a total exclusividade para abordar o assunto devido ao tempo de desenvolvimento necessitar mais de 6 meses - desde o zero absoluto até finalizaçao do projeto. Além disso, foi criado um documento em cartório antes da data que o rapaz plagiou. Houve tb pesquisa de campo onde o mesmo rapaz copiou as questões que se fazia aos entrevistados e ele publicou no grupo da uemg. Houve uma publicação das imagens do app e suas funcionalidades o que permitiu que alunos copiassem seu trabalho além dos comentários a respeito, porém, foram depois de formalizarem os documentos. Como este trabalho foi descontinuado, posso publicá-lo.</p>

<p>Maitre em francês, é um membro operacional de um restaurante tradicional. Muitos das MEIs não implementam o maitre devido a questões de custo e beneficio partindo para o lado convencional de garçom, gerente e cozinha. Contudo, no organograma de um restaurante tradicional de restaurantes o maitre existe. Este app teria a função de substituí-lo.</p>
<p>A ideia é tão boa que poderia virar startup</p>

#### Versões posteriores
<o>
    <li>1. Criação do frontend client-side: angular js e novo layout</li>
    <li>2. Layout do backend para client-side: angular js e novo layout</li>
    <li>2.1. Atualização do servidor para a versão mais atual do framework laravel</li>
    <li>3. Layout final para mobile - modelo cliente. O modelo backend no mobile não é mais necessario</li>
    <li>4. Integração do layout no ionic - uma vez integrado no angular para passar para o mobile é mais rápido</li>
    <li>5. Integração da API</li>
    <li>6. Integração com pagseguro e paypal na restfull</li>
    <li>7. Compra do servidor node js e apache</li>
    <li>8. Definição e compra de domínio</li>
    <li>9. testes com segurança da informação - Pentasting</li>
    <li>10. Planejamento para uso comercial</li>
    <li>11. Testes finais</li>
    <li>12. Implementação em algum restaurante - teste</li>
    <li>13. Finalização e planejamento para captação de recursos financeiros - startup</li>
</o>

<br>
#### Descrição Geral
<p>O cliente entra no restaurante e senta-se em uma mesa. Nesta mesa existe um código de barras que identifica-a no sistema. Junto existe um link de acessos local para baixar o app ou nas marketplaces como apple e playstore. Ao baixar o sistema, é pedido para que bata uma foto do QRCode sobre a mesa, o qual existe um link para acesso ao servidor local. Ao acessar o link é listado o menu e suas opções.</p>

<p>O cliente faz seu pedido pelo app. Ao finalizar é enviado para o sistemas todas informações necessárias para serem enviadas para o computador na cozinha onde o cozinheiro (chef), no backend, tem acesso aos pedidos e tem a função de atualizar os status os quais vão diretamente para o app do cliente.</p>

<p>Desta forma, o garçom passa a ter uma função mais específica como entregar o pedido ao sair da cozinha ou algum atendimento especial. O app tem todas as funcionalidades necessárias para que o cliente seja atendido sem a necessidade do garçom. Nele consta: o pedido realizado; o tempo aproximado de entrega do pedido; status quando ao que esta sendo realizado; o valor da comanda; a forma de pagamento; etc</p>

<p></p>

<br>
#### O que foi desenvolvido até a versão v1.2

<o>
    <li>1. Layouts: foi desenvolvido o layout do app modelo entrada e menu para o front-end; e modelo backend finalizado</li>
    <li>2. Foi desenvolvido o diagrama relacional de banco de dados (DER)</li>
    <li>3. Foi criado o backend do sistema para web - onde os steackholders tem acesso para incluir configurações, inserção de produtos e demais delegações; e criação do frontend para pedidos onine</li>
    <li>4. Foi criado o webservice (API RESTFULL) para alimentação de demais aplicações e o app do sistema</li>
</o>
<p>Esta versão é híbrida ou seja, utiliza o modelo server-side. Atualmente ja estamos nos modelos de aplicações web cliente-side. Essa questão foi escolhida para eliminar demais dependencias de instalações, o que necessitaria um servidor node.js e o wampserver para Aa API. Como seria um protótipo resolvemos integrar tudo de forma rápida.</p>


<br>
#### Projeto
<p>O projeto vem sido delegado sobre a metodologia scrum. Eu como gestor e os alunos como developper team. Passo a ajudar no que encontram dificuldades para entrega dos sprints de 4 semanas.</p>
<o>
    <li>1. Eu desenhei a interface mobile</li>
    <li>2. Criei o backend para funcionalidade no servidor e o frontend para acesso de pedidos pela web</li>
    <li>3. Criei a API</li>
    <li>4. A developper team ficou responsável por integrar o layout do app no ionic para apresentação das informações necessárias</li>
<o/>

<hr>

### Ambiente de desenvolvimento
<o>
    <li>1. Photoshop CC e Illustrator CC: para desenvolvimento dos layouts do app</li>
    <li>2. Para os layout do backend e frontend para web, foram usados 2 templates free (edmin)</li>
    <li>3. Para desenvolvimento web foi utilizado a linguagem PHP, especificamente o framework Laravel em sua versão 5</li>
    <li>4. Para desenvolvimento do app, foi escolhido as palicações híbridas, neste caso o ionic</li>
</o>

<hr>

### Instalação
<o>
    <li>1. composer: https://getcomposer.org/</li>
    <li>2. wampserver - Windows Apache PHP</li>
    <li>3. Descompacte a versão server no diretório www do amp</li>
    <li>4. Criar o banco de dados com o nome "maitre"</li>
    <li>5. Dentro do diretório, pelo gitbash ou cmd: composer install; composer update. Para qeu as dependencias sejam instaladas</li>
    <li>6. Entre no diretório da aplicação e instale as tabelas: php artisan migrate</li>
    <li>7. População das tabelas com informações default: php artisan db:seeder</li>
    <li>8. rodando o servidor: http://localhost/maitre(ou nome da pasta que descompactou)/public; ou composer server</li>
</o>

<hr>
### BACKEND + API RESTFULL
<img src="https://github.com/EuFreela/Maitre-Hibrido/blob/master/server-restfull/SERVER/1-server.png" width="300" heigth="300">
<img src="https://github.com/EuFreela/Maitre-Hibrido/blob/master/server-restfull/SERVER/2.png" width="300" heigth="300">
<img src="https://github.com/EuFreela/Maitre-Hibrido/blob/master/server-restfull/SERVER/3.png" width="300" heigth="300">
<img src="https://github.com/EuFreela/Maitre-Hibrido/blob/master/server-restfull/SERVER/5.png" width="300" heigth="300">
<img src="https://github.com/EuFreela/Maitre-Hibrido/blob/master/server-restfull/SERVER/6.png" width="300" heigth="300">
<img src="https://github.com/EuFreela/Maitre-Hibrido/blob/master/server-restfull/SERVER/7.png" width="300" heigth="300">
<img src="https://github.com/EuFreela/Maitre-Hibrido/blob/master/server-restfull/SERVER/8.png" width="300" heigth="300">


<hr>
### MOBILE - Modelo temporário, é apenas uma interface de aprovação por parte dos integrantes do grupo
<img src="https://github.com/EuFreela/Maitre-Hibrido/blob/master/mobile-desing/backend/1maitre-mobile-login.jpg" width="300" heigth="300">
<img src="https://github.com/EuFreela/Maitre-Hibrido/blob/master/mobile-desing/backend/2maitre-mobile-home-1.jpg" width="300" heigth="300">
<img src="https://github.com/EuFreela/Maitre-Hibrido/blob/master/mobile-desing/backend/3maitre-mobile-home-chat-1.jpg" width="300" heigth="300">
<img src="https://github.com/EuFreela/Maitre-Hibrido/blob/master/mobile-desing/backend/4maitre-mobile-home-chat-1.jpg" width="300" heigth="300">
<img src="https://github.com/EuFreela/Maitre-Hibrido/blob/master/mobile-desing/backend/5maitre-mobile-home-departamento.jpg" width="300" heigth="300">
<img src="https://github.com/EuFreela/Maitre-Hibrido/blob/master/mobile-desing/backend/6maitre-mobile-home-departamento-chat.jpg" width="300" heigth="300">
<img src="https://github.com/EuFreela/Maitre-Hibrido/blob/master/mobile-desing/backend/7maitre-mobile-home-estat%C3%ADstica.jpg" width="300" heigth="300">
<img src="https://github.com/EuFreela/Maitre-Hibrido/blob/master/mobile-desing/backend/8maitre-mobile-cadastro.jpg" width="300" heigth="300">
<img src="https://github.com/EuFreela/Maitre-Hibrido/blob/master/mobile-desing/backend/9maitre-mobile-cadastro-usuario.jpg" width="300" heigth="300">
<img src="https://github.com/EuFreela/Maitre-Hibrido/blob/master/mobile-desing/backend/10maitre-mobile-cadastro-p.jpg" width="300" heigth="300">
<img src="https://github.com/EuFreela/Maitre-Hibrido/blob/master/mobile-desing/backend/11maitre-mobile-cadastro-p1.jpg" width="300" heigth="300">
<img src="https://github.com/EuFreela/Maitre-Hibrido/blob/master/mobile-desing/backend/12maitre-mobile-cadastro-p2.jpg" width="300" heigth="300">













