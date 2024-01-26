<?php use Cake\Routing\Router; ?>
<div class="col-md-12 content">
	<h3> <?= $title ?> </h3>
	<div class="card">
		<div class="card-body">
			<?= $this->Form->create($assessment, ['class' => 'form-material  mt-2']) ?>
				<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label class="control-label text-muted"> Estudante </label>
						<?= $this->Form->control('idstudent', ['class' => 'form-control selectpicker', 'data-live-search', 'label' => false, 'required' => true, 'options' => $students, 'title' => 'Selecione o estudante']) ?>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label class="control-label text-muted"> Área </label>
						<?= $this->Form->control('idrating', ['class' => 'form-control selectpicker', 'data-live-search', 'label' => false, 'required' => true, 'options' => $ratings, 'title' => 'Selecione a área']) ?>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label class="control-label text-muted"> Índice </label>
						<?= $this->Form->control('idindex', ['class' => 'form-control selectpicker', 'data-live-search', 'label' => false, 'required' => true, 'options' => [null], 'title' => 'Selecione o índice']) ?>
					</div>
				</div>
				<div class="row">
					<?php if($role == C_RoleTudo) { ?>
						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
							<label class="control-label text-muted"> Professor </label>
							<?= $this->Form->control('idteacher', ['class' => 'form-control selectpicker', 'data-live-search', 'label' => false, 'required' => true, 'options' => $teachers, 'title' => 'Selecione o professor']) ?>
						</div>
					<?php } ?>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label class="control-label text-muted"> Agendamento </label>
						<?= $this->Form->control('idschedule', ['class' => 'form-control selectpicker', 'data-live-search', 'label' => false, 'required' => true, 'options' => $schedules, 'title' => 'Selecione o agendamento']) ?>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label class="control-label text-muted"> Valor </label>
						<?= $this->Form->control('value', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira o valor']) ?>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-md-12">
						<?= $this->Form->button('Salvar avaliação', ['class' => 'btn btn-success btn-lg']) ?>
					</div>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>
<script>
	// Indexes by rating
		$('#idrating').change(function(e) {
			var idrating = $(this).val();
			$.ajax({
				url: "<?= Router::url([ 'controller' => 'Indexes', 'action' => 'indexesbyrating', ], true); ?>" + "/" + idrating,
				dataType: 'json', 
				success: function(data) {
					$('#idindex').empty();
					$.each(data, function(index, option) {
						$('#idindex').append('<option value="' + option.id + '">' + option.name + '</option>');
					});
					$('#idindex').selectpicker('refresh');
				},
				error: function(error) {
					console.error('Erro ao obter opções:', error);
				}
			});
		})
	// 
</script>