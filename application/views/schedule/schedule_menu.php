<div class="container"><!-- Conteúdo -->
  	<div class="starter-template">
        <center>
        <div class="list-group" style="text-align:left; ">
        	<?php
        	if ($idPermission == 1){
        		echo '
          	<a href="#"  class="list-group-item"><i class="fa fa-search fa-2x pull-left"></i>
	            <h4 class="list-group-item-heading">Consulta de escalas</h4>
	            <p class="list-group-item-text">Consulta a escalas mensais </p>
          	</a>
            <a href="#"  class="list-group-item"><i class="fa fa-retweet fa-2x pull-left"></i>
            	<h4 class="list-group-item-heading">Trocas de Serviços </h4>
            	<p class="list-group-item-text">Trocas de serviços devem ser feitas com uma semana de antecedência </p>
          	</a>
          	';
            }
            if ($idPermission == 2){
        		echo '
            <a href="schedule_create"  class="list-group-item"><i class="fa fa-calendar fa-2x pull-left"></i>
	            <h4 class="list-group-item-heading">Criar Escalas </h4>
	            <p class="list-group-item-text">Criação de escala do 0800 </p>
          	</a>
            <a href="#"  class="list-group-item"><i class="fa fa-calendar-o fa-2x pull-left"></i>
              <h4 class="list-group-item-heading">Excluir Escalas </h4>
              <p class="list-group-item-text">Exclusão de escala do 0800 </p>
            </a>
            <a href="schedule_viewByGroups"  class="list-group-item"><i class="fa fa-desktop fa-2x pull-left"></i>
              <h4 class="list-group-item-heading">Visualizar Escalas por Grupo </h4>
              <p class="list-group-item-text">Visualização e impressão de escala do 0800 </p>
            </a>
            <a href="schedule_newGroup"  class="list-group-item"><i class="fa fa-pencil-square-o fa-2x pull-left"></i>
            <h4 class="list-group-item-heading">Configurar Equipes </h4>
            <p class="list-group-item-text">Configuração de equipes do 0800 </p>
            </a>
            <a href="schedule_groups"  class="list-group-item"><i class="fa fa-user-plus fa-2x pull-left"></i>
            <h4 class="list-group-item-heading">Adicionar Membros as Equipes </h4>
            <p class="list-group-item-text">Configuração de membros nas equipes do 0800 </p>
            </a>
            <a href="schedule_exchange"  class="list-group-item"><i class="fa fa-retweet fa-2x pull-left"></i>
	            <h4 class="list-group-item-heading">Troca de serviços Extraordinários </h4>
	            <p class="list-group-item-text">Troca de serviços pelo administrador </p>
          	</a>
          	<a href="#"  class="list-group-item"><i class="fa fa-file-text fa-2x pull-left"></i>
	            <h4 class="list-group-item-heading">Relatórios </h4>
	            <p class="list-group-item-text">Relatórios de trocas realizadas </p>
          	</a>
          	';
            }
            ?>
        </div>
      	</center>
      	<center>
      	<div class="list-group" style="text-align:left; ">
      		<a href="#" class="list-group-item"><i class="fa fa-info-circle fa-2x pull-left"></i>
            <h4 class="list-group-item-heading">Suporte</h4>
            <p class="list-group-item-text">Reportar algum erro ao suporte</p>
          	</a>
        </div>
  		</center>
	</div>
</div><!-- /.container -->
