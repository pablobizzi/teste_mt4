<h1 class="page-header">Documentação</h1>

<h3> Arquitetura e Design Patterns utilizados</h3>
<hr>

<h4>Model-View-Controller</h4>
<p>O padrão model-view-controller (MVC) e os demais padrões relacionados como HMVC and MVVM permitem que você separe o código em diferentes objetos lógicos que servem para tarefas bastante específicas. </p>
<p> Models (Modelos) servem como uma camada de acesso aos dados onde esses dados são requisitados e retornados em formatos nos quais possam ser usados no decorrer de sua aplicação. </p> 
<p> Controllers (Controladores) tratam as requisições, processam os dados retornados dos Models e carregam as views (Visões) para enviar a resposta. </p> 
<p> E as views são templates de saída (marcação, xml, etc) que são enviadas como resposta ao navegador.</p>
<p>O MVC é o padrão arquitetônico mais comumente utilizado nos populares Frameworks PHP.</p>
<hr>

<h4>Data Access Object (DAO)</h4>
<p>Padrão vastamente utilizado, especilamente por quem utiliza o padrão MVC, por ser um padrão para persistência de dados que permite separar regras de negócio das regras de acesso a banco de dados. </p>
<p>Considerando a arquitetura MVC, todas as funcionalidades de bancos de dados, tais como obter as conexões, mapear objetos e arrays do PHP para tipos de dados SQL ou executar comandos SQL, devem ser feitas por classes DAO.</p>
<hr>
<hr>
<h4>Front Controller</h4>
<p>O padrão front controller é quando você tem um único ponto de entrada para sua aplicação web (ex. index.php) que trata de todas as requisições. Esse código é responsável por carregar todas as dependências, processar a requisição e enviar a resposta para o navegador. O padrão Front Controller pode ser benéfico pois ele encoraja o desenvolvimento de um código modular e provê um ponto central no código para inserir funcionalidades que deverão ser executadas em todas as requisições (como para higienização de entradas).</p>
<hr>

<h3 class="m-t-20"> Criptografia adicional escolhida na Tarefa 3</h3>
<hr>

<h4>Base 64</h4>
<p>Particularmente, eu já utilizaei bastante esta codificação em projetos. Especialmente porque é um método na codificação de dados para transferência na Internet (codificação MIME para transferência de conteúdo). </p> 
<p>É utilizado frequentemente para transmitir dados binários por meios de transmissão que lidam apenas com texto, como por exemplo para enviar arquivos anexos por email ou enviar fotos para WebServices.</p>
<hr>

<h3 class="m-t-20"> Hash adicional escolhida na Tarefa 4</h3>
<hr>

<h4>Whirlpool</h4>
<p>Gosto bastante do algoritmo Whirlpool para criptografia porque ele é um algortimo de mão única, ou seja, só é possível comparar strings depois de criptografas. Não há possibilidade de descriptografar. Assim como MD5, que também gosto muito. </p> 
<br>
<br>
<br>
<br>
<br>