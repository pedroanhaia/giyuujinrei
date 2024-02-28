<?php use Cake\Routing\Router; ?>
<div class="col-md-12 content">
	<h3> <?= $title ?> </h3>
	<div class="card" >
		<div class="card-body">
			<?= $this->Form->create($schedule, ['class' => 'form-material  mt-2']) ?>
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12">
						<label class="control-label text-muted"> Nome </label>
						<?= $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira o nome']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-12">
						<label class="control-label text-muted"> Data </label>
						<?= $this->Form->control('date', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira a data']) ?>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-12">
						<label class="control-label text-muted"> Dojô </label>
						<?= $this->Form->control('idcore', ['class' => 'form-control selectpicker', 'data-live-search', 'label' => false, 'required' => true, 'options' => $cores, 'title' => 'Selecione o dojô']) ?>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-12">
						<label class="control-label text-muted"> Turma </label>
						<?= $this->Form->control('idclass', ['class' => 'form-control selectpicker', 'data-live-search', 'label' => false, 'required' => true, 'options' => [null], 'title' => 'Selecione a turma']) ?>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-12">
						<label class="control-label text-muted"> Status </label>
						<?=  $this->Form->input('inactive', ['label' => ['class' => 'control-label'], 'type' => 'radio', 'options' => [0 => 'Ativo', 1 => 'Inativo']]); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?= $this->Form->button('Salvar agendamento', ['class' => 'btn btn-success btn-lg']) ?>
					</div>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>
<script>
	// Turma 
		$('#idcore').change(function(e) {
			loadClasses();
		})
		
		loadClasses();

		function loadClasses() {
			var idcore = $('#idcore').val();
			$.ajax({
				url: "<?= Router::url([ 'controller' => 'Classes', 'action' => 'classesopt', ], true); ?>",
				method: 'POST',
				data: {idcore: idcore},
				dataType: 'json',
				success: function(data) {
					$('#idclass').empty();
					$.each(data, function(index, option) {
						$('#idclass').append('<option value="' + option.id + '">' + option.name + '</option>');
					});
					$('#idclass').selectpicker('refresh');
					$('#idclass').val("<?= $schedule->idclass ?>");
					$('#idclass').selectpicker('refresh');
				},
				error: function(error) {
					console.error('Erro ao obter opções:', error);
				}
			});
		}
	//
</script>