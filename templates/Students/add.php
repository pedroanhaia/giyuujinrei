<?php use Cake\Routing\Router; ?>
<div class="col-md-12 content">
	<h3> <?= $title ?> </h3>
	<div class="card" >
		<div class="card-body">
			<?= $this->Form->create($student, ['class' => 'form-material  mt-2', "enctype" => "multipart/form-data"]) ?>
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12">
						<label class="control-label text-muted"> Nome </label>
						<?= $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira o nome do estudante']) ?>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
						<label class="control-label text-muted"> Responsável </label>
						<?= $this->Form->control('idresponsible', ['class' => 'form-control selectpicker', 'data-live-search', 'label' => false, 'required' => true, 'options' => $responsibles, 'title' => 'Selecione o responsável']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2 col-md-4 col-sm-12 col-xs-12">
						<label class="control-label text-muted"> Fone </label>
						<?= $this->Form->control('phone', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Insira o fone']) ?>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-12 col-xs-12">
						<label class="control-label text-muted"> Data de nascimento </label>
						<?= $this->Form->date('birthday', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Insira a data de nascimento']) ?>
					</div>
					<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
						<label class="control-label text-muted"> E-mail </label>
						<?= $this->Form->control('email', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Insira o e-mail']) ?>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
						<label class="control-label text-muted"> Usuário </label>
						<?= $this->Form->control('iduser', ['class' => 'form-control form-control selectpicker', 'data-live-search', 'label' => false, 'options' => $users, 'title' => 'Selecione o usuário']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
						<label class="control-label text-muted"> Dojô </label>
						<?= $this->Form->control('idcore', ['class' => 'form-control selectpicker', 'data-live-search', 'label' => false, 'required' => true, 'options' => $cores, 'title' => 'Selecione o dojô']) ?>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
						<label class="control-label text-muted"> Esporte </label>
						<?= $this->Form->control('idsport', ['class' => 'form-control form-control selectpicker', 'data-live-search', 'label' => false, 'required' => true, 'options' => $sports, 'title' => 'Selecione o esporte']) ?>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-12 col-xs-12">
						<label class="control-label text-muted"> Turma </label>
						<?= $this->Form->control('idclass', ['class' => 'form-control form-control selectpicker', 'data-live-search', 'label' => false, 'required' => true, 'options' => [null], 'title' => 'Selecione oa turma']) ?>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
						<label class="control-label text-muted"> Graduação </label>
						<?= $this->Form->control('idgrank', ['class' => 'form-control form-control selectpicker', 'data-live-search', 'label' => false, 'required' => true, 'options' => [null], 'title' => 'Selecione a graduação']) ?>
					</div>
				</div>
                <div class="row">
                    <?=  $this->Form->control('urlpicture', ['label' => 'Imagem','type' => 'file']) ?>
                </div>
				<div class="row mt-3">
					<div class="col-md-12">
						<?= $this->Form->button('Salvar estudante', ['class' => 'btn btn-success btn-lg']) ?>
					</div>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>
<script>
	$("#phone").mask("(99) 99999-9999");

	// Graduações do esporte
		$('#idsport').change(function(e) {
			var idsport = $(this).val();
			$.ajax({
				url: "<?= Router::url([ 'controller' => 'Sports', 'action' => 'sportsranks', ], true); ?>" + "/" + idsport,
				dataType: 'json',
				success: function(data) {
					$('#idgrank').empty();
					$.each(data, function(index, option) {
						$('#idgrank').append('<option value="' + option.id + '">' + option.name + '</option>');
					});
					$('#idgrank').selectpicker('refresh');
				},
				error: function(error) {
					console.error('Erro ao obter opções:', error);
				}
			});
		})
	// Turma
		$('#idcore, #idsport').change(function(e) {
			var idcore = $('#idcore').val();
			var idsport = $('#idsport').val();
			$.ajax({
				url: "<?= Router::url([ 'controller' => 'Classes', 'action' => 'classesopt', ], true); ?>",
				method: 'POST',
				data: {idcore: idcore, idsport: idsport},
				dataType: 'json',
				success: function(data) {
					$('#idclass').empty();
					$.each(data, function(index, option) {
						$('#idclass').append('<option value="' + option.id + '">' + option.name + '</option>');
					});
					$('#idclass').selectpicker('refresh');
				},
				error: function(error) {
					console.error('Erro ao obter opções:', error);
				}
			});
		})
	//
</script>
