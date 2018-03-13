# Maitre-Hibrido

#### Trabalho descontinuado v1.2

<p>Trata-se de um trabalho acadêmico iniciado para um amigo e foi descontinuado devido a faculdade permitir que outro aluno fizesse o mesmo trabalho plagiando a ideologia deste sistema. Houve uma publicação das imagens do app e suas funcionalidades o que permitiu que alunos copiassem seu trabalho.</p>

<p>Maitre em francês, é um membro operacional de um restaurante tradicional. Muitos das MEIs não implementam o maitre devido a questões de custo e beneficio partindo para o lado convencional de garçom, gerente e cozinha. Contudo, no organograma de um restaurante tradicional de restaurantes o maitre existe. Este app teria a função de substituí-lo.</p>

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

