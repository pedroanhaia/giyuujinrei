<?php 
	use Cake\Routing\Router;
	echo $this->Html->css(['relatorios.css']);

	function rowPosition($position)	{
		if($position == 0) return 'row-gold';
		if($position == 1) return 'row-silver';
		if($position == 2) return 'row-bronze';
	}
?>

<style>
	.aproveitamento {
		background-color: <?= $echartBetsGreenRed['AproveitamentoCor'] ?>;
	}
	.aproveitamentoConversao {
		background-color: <?= $echartBetsConvertidas['AproveitamentoCor'] ?>;
	}
</style>
<div class="content">
	<div class="row">
		<?= $this->Form->create(null, ['type' => 'get']); ?> 
			<div class="row">
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<label class="control-label mb-0"> Dojô </label>
					<?= $this->Form->control('idcore', ['class' => 'form-control selectpicker', 'data-live-search', 'value' => $idcore, 'label' => false, 'required' => true, 'options' => $cores, 'default' => 0, 'title' => 'Selecione o dojô']) ?>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<label class="control-label mb-0"> Turma </label>
					<?= $this->Form->control('idclass', ['class' => 'form-control selectpicker', 'data-live-search', 'value' => $idclass, 'label' => false, 'required' => true, 'options' => [$classes], 'default' => 0, 'title' => 'Selecione a turma']) ?>
				</div>
				<div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-xs-12">
					<label class='form-label mb-0'> Mês </label>
					<?= $this->Form->control('mes', ['class' => 'form-control selectpicker', 'value' => $mes, 'options' => C_MesesOpt, 'label' => false]) ?>
				</div>
				<div class="col-xl-1 col-lg-2 col-md-3 col-sm-6 col-xs-12">
					<label class='form-label mb-0'> Ano </label>
					<?= $this->Form->control('ano', ['class' => 'form-control selectpicker', 'value' => $ano, 'options' => C_AnosOpt, 'label' => false]) ?>
				</div>
				<div class="col-lg-2 col-md-3 col-md-12 col-xs-12 mt-5">
					<?= $this->Form->button('Buscar', ['class' => 'btn btn-pesquisar btn-success btn-lg mr-5']) ?>
				</div>
			</div>
		<?= $this->Form->end(); ?>
	</div>
	<div class="row row-title">
		<div class="col-md-1 col-sm-2 col-xs-2 col-foto">
			<?= $this->Html->image('brandelli.png', ['class' => 'destaques-img'])?>
		</div>
		<div class="col-md-8 col-sm-8 col-xs-8">
			<p class="card-title-destaques"> DESTAQUES </p>
			<p class="card-title-mes"> <?= $strMes ?> </p>
		</div>
		<div class="col-md-3 col-sm-2 col-xs-2">
			<div class="card-title-ano">
				<div class="card-title-ano-triangulo"></div>
				<p> <?= $ano ?> </p>
			</div>
		</div>
	</div>
	<div class="row row-pontos">
		<div class="col-10"></div>
		<div class="col-lg-11 col-md-10 col-sm-10 col-xs-10">  </div>
		<div class="col-lg-1 col-md-2 col-sm-2 col-xs-2 col-pontos"> Pontos </div>
	</div>
	<?php foreach($destaquesMes as $key => $reg) { ?>
		<div class="row row-destaques <?= rowPosition($key) ?>">
			<div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 col-class">
				<?= $key + 1 ?>
			</div>
			<div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 col-foto">
				<?= $this->Html->image($reg['Foto'], ['class' => 'destaques-img'])?>
			</div>
			<div class="col-lg-9 col-md-8 col-sm-6 col-xs-6 col-nome">
				<?= DestaquesNome($reg['Nome']) ?>
				<div class="barra-porcentagem" data-porcentagem="<?= $reg['PresencaPct'] ?>" data-porcentagem-cor="<?= gerarCorGradual($reg['PresencaPct'] / 100) ?>"></div>
				<span class="col-nome-pct"> Presença: <?= $reg['PresencaPct'] ?>% </span>
			</div>
			<div class="col-lg-1 col-md-2 col-sm-2 col-xs-2 col-score">
				<div class="triangulo"></div>
				<p> <?= $reg['Total'] ?> </p>
			</div>
		</div>
	<?php } ?>
</div>
<script>
	// Students by Classes
		$('#idcore').change(function(e) {
			var idcore = $(this).val();
			$.ajax({
				url: "<?= Router::url([ 'controller' => 'Classes', 'action' => 'coresclasses', ], true); ?>" + "/" + idcore,
				dataType: 'json', 
				success: function(data) {
					$('#idclass').empty();
					$('#idclass').append('<option value="0"> Todas </option>');
					$.each(data, function(index, option) {
						$('#idclass').append('<option value="' + option.id + '">' + option.name + '</option>');
					});
					$('#idclass').selectpicker('refresh');
				},
				error: function(error) {
					console.error('Erro ao obter opções:', error);
				},
				beforeSend() { preLoadGira(1, 'Carregando lista de turmas...') },
				complete() { preLoadGira(0); }
			});
		})
	// Porcentagem 
		document.addEventListener("DOMContentLoaded", function() {
			const barrasPorcentagem = document.querySelectorAll(".barra-porcentagem");
			barrasPorcentagem.forEach(barraPorcentagem => {
				const porcentagem = parseInt(barraPorcentagem.getAttribute("data-porcentagem"));
				for (let i = 0; i < 50; i++) {
					const quadradinho = document.createElement("div");
					quadradinho.classList.add("quadradinho");
					if (i < porcentagem / 2) {
						// quadradinho.style.backgroundColor = "#00ff00"; /* Verde para quadradinhos correspondentes à porcentagem */
						quadradinho.style.backgroundColor = barraPorcentagem.getAttribute("data-porcentagem-cor"); /* Verde para quadradinhos correspondentes à porcentagem */
					}
					barraPorcentagem.appendChild(quadradinho);
				}
			});
		});
	// 
</script>