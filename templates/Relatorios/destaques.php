<?php 
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
		<div class="col-1 col-foto">
			<?= $this->Html->image('brandelli.png', ['class' => 'destaques-img'])?>
		</div>
		<div class="col-8">
			<p class="card-title-destaques"> DESTAQUES </p>
			<p class="card-title-mes"> <?= $strMes ?> </p>
		</div>
		<div class="col-3">
			<div class="card-title-ano">
				<div class="card-title-ano-triangulo"></div>
				<p> <?= $ano ?> </p>
			</div>
		</div>
	</div>
	<div class="row row-pontos">
		<div class="col-10"></div>
		<div class="col-2 col-pontos"> Pontos </div>
	</div>
	<?php foreach($destaquesMes as $key => $reg) { ?>
		<div class="row row-destaques <?= rowPosition($key) ?>">
			<div class="col-1 col-class">
				<?= $key + 1 ?>
			</div>
			<div class="col-1 col-foto">
				<?= $this->Html->image($reg['Foto'], ['class' => 'destaques-img'])?>
			</div>
			<div class="col-8 col-nome">
				<?= $reg['Nome'] ?>
				<div class="barra-porcentagem" data-porcentagem="<?= $reg['PresencaPct'] ?>"></div>
				<span class="col-nome-pct"> <?= $reg['PresencaPct'] ?>% </span>
			</div>
			<div class="col-2 col-score">
				<div class="triangulo"></div>
				<p> <?= $reg['Total'] ?> </p>
			</div>
		</div>
	<?php } ?>
</div>

<script>
	document.addEventListener("DOMContentLoaded", function() {
		const barrasPorcentagem = document.querySelectorAll(".barra-porcentagem");
		barrasPorcentagem.forEach(barraPorcentagem => {
			const porcentagem = parseInt(barraPorcentagem.getAttribute("data-porcentagem"));
			for (let i = 0; i < 50; i++) {
				const quadradinho = document.createElement("div");
				quadradinho.classList.add("quadradinho");
				if (i < porcentagem / 2) {
					quadradinho.style.backgroundColor = "#00ff00"; /* Verde para quadradinhos correspondentes à porcentagem */
				}
				barraPorcentagem.appendChild(quadradinho);
			}
		});
	});
</script>