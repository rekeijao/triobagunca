<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="container p-4">
				<div class="form-group row">
					<div class="col-lg-3"></div>
					<div class="col-lg-5"><p class="text-center">EVENTOS AGENDADOS</p></div>
				  	<div class="col-lg-4">
					</div>
				</div>
			<!--<form action="">
				<div class="form-group row">
					<div class="col-lg-4">
						<label for="DataInicio">Data Inicial: </label>
						<input type="date" name="inicio" id="DataInicio" class="form-control form-control-sm">
					</div>
					<div class="col-lg-4">
						<label for="DataFinal">Data Inicial: </label>
						<input type="date" name="fim" id="DataFinal" class="form-control form-control-sm">
					</div>
					<div class="col-lg-3">
						<label for="status">Status: </label>
						<select class="form-control form-control-sm" id="status">
							<option selected disabled>Filtrar</option>
							<option>Confirmados</option>
							<option>Pendentes</option>
							<option>Cancelados</option>
						</select>
					</div>
					<div class="col-lg-1">
						<label for="status" class="text-white">Filtrar: </label>
						<button class="btn btn-secondary btn-sm" type="submit">Filtrar</button>
					</div>
				</div> -->
				<nav class="navbar navbar-light mb-3" style="background-color: #e3f2fd;">
				   <a class="btn btn-outline-primary" href="<?= base_url()?>Agenda/AgendamentosPorMes/01" role="button">Janeiro</a>
				   <a class="btn btn-outline-primary" href="<?= base_url()?>Agenda/AgendamentosPorMes/02" role="button">Fevereiro</a>
				   <a class="btn btn-outline-primary" href="<?= base_url()?>Agenda/AgendamentosPorMes/03" role="button">Março</a>
				   <a class="btn btn-outline-primary" href="<?= base_url()?>Agenda/AgendamentosPorMes/04" role="button">Abril</a>
				   <a class="btn btn-outline-primary" href="<?= base_url()?>Agenda/AgendamentosPorMes/05" role="button">Maio</a>
				   <a class="btn btn-outline-primary" href="<?= base_url()?>Agenda/AgendamentosPorMes/06" role="button">Junho</a>
				   <a class="btn btn-outline-primary" href="<?= base_url()?>Agenda/AgendamentosPorMes/07" role="button">Julho</a>
				   <a class="btn btn-outline-primary" href="<?= base_url()?>Agenda/AgendamentosPorMes/08" role="button">Agosto</a>
				   <a class="btn btn-outline-primary" href="<?= base_url()?>Agenda/AgendamentosPorMes/09" role="button">Setembro</a>
				   <a class="btn btn-outline-primary" href="<?= base_url()?>Agenda/AgendamentosPorMes/10" role="button">Outubro</a>
				   <a class="btn btn-outline-primary" href="<?= base_url()?>Agenda/AgendamentosPorMes/11" role="button">Novembro</a>
				   <a class="btn btn-outline-primary" href="<?= base_url()?>Agenda/AgendamentosPorMes/12" role="button">Dezembro</a>
				   <a class="btn btn-outline-primary" href="<?= base_url()?>Agenda/Agendamentos" role="button">Todos</a>
				</nav>
			</form>

				<?php 
					foreach ($evento as $ev) {
						$mes = date('m', strtotime($ev['data_evento'])); //PEGA O MÊS A DATA NO SERVIDOR

						if (empty($ev['mes_evento'])) {
							echo "VOCÊ NÃO TEM EVENTOS CADASTRADOS PARA ESTE MÊS!";
						}

						setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

						//CONVERTE PARA O DIA DA SEMANA
						$data = strftime('%d/%m/%Y - %A', strtotime($ev['data_evento'])); 

						if ($ev['status_evento'] == 'Confirmado') {
							$conf = "table-success border border-success";
						} elseif ($ev['status_evento'] == 'Pendente') {
							$conf = "table-warning border border-warning";
						} else {
							$conf = "table-danger border border-danger";
						}
				?>
				<a href="Agenda/DetalheEvento/<?= $ev['id_evento'] ?>" class="d-inline">
					<div class="row border border-primary rounded p-2 mb-2 <?= $conf; ?> text-decoration-none">
		                <div class="col">
		                    <span class="font-weight-light">Cliente: <br /></span>
		                    <span class="h5 text-capitalize">
		                    	<?= $ev['nome_cli'];?>
		                    </span>
		                </div>
		                <div class="col">
		                    <span class="font-weight-light">Data do Evento: <br /></span>
		                    <span class="h5 text-capitalize"><?= mb_convert_encoding($data, 'UTF-8', 'ISO-8859-1'); ?> </</span>
		                </div>
		                <div class="col">
		                    <span class="font-weight-light">Hora do Evento: <br /></span>
		                    <span class="h5 hora"><?= $ev['hora_evento']; ?></span>
		                </div>
		            </div>
		        </a>
				<?php
					}
				?>
				<!--
				<?php foreach ($evento as $ev): 
					setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

					//CONVERTE PARA O DIA DA SEMANA
					$data = strftime('%d/%m/%Y - %A', strtotime($ev['data_evento'])); 

					if ($ev['status_evento'] == 'Confirmado') {
						$conf = "table-success border border-success";

					} elseif ($ev['status_evento'] == 'Pendente') {
						$conf = "table-warning border border-warning";
					} else {
						$conf = "table-danger border border-danger";
					}

					$mes = date('m', strtotime($ev['data_evento'])); //PEGA O MÊS A DATA NO SERVIDOR

					if (date('m') == $mes) {
				?>
				<a href="Agenda/DetalheEvento/<?= $ev['id_evento'] ?>" class="d-inline">
					<div class="row border border-primary rounded p-2 mb-2 <?= $conf; ?> text-decoration-none">
		                <div class="col">
		                    <span class="font-weight-light">Cliente: <br /></span>
		                    <span class="h5 text-capitalize">
		                    	<?= $ev['nome_cli'];?>
		                    </span>
		                </div>
		                <div class="col">
		                    <span class="font-weight-light">Data do Evento: <br /></span>
		                    <span class="h5 text-capitalize"><?= mb_convert_encoding($data, 'UTF-8', 'ISO-8859-1'); ?> </</span>
		                </div>
		                <div class="col">
		                    <span class="font-weight-light">Hora do Evento: <br /></span>
		                    <span class="h5 hora"><?= $ev['hora_evento']; ?></span>
		                </div>
		            </div>
		        </a>
			<?php 
					} //FINAL DO IF DATE
				endforeach 
			?>
		-->
	</div>
