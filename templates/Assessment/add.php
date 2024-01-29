<?php
	use Cake\Routing\Router;
	echo $this->Html->css(['assessment.css']);
?>
<div class="col-md-12 content">
	<h3> <?= $title ?> </h3>
	<div class="card">
		<div class="card-body">
			<?= $this->Form->create(null, ['class' => 'form-material  mt-2']) ?>
				<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label class="control-label text-muted"> Turma </label>
						<?= $this->Form->control('idclass', ['class' => 'form-control selectpicker', 'data-live-search', 'label' => false, 'required' => true, 'options' => $classes, 'title' => 'Selecione a turma']) ?>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label class="control-label text-muted"> Estudante </label>
						<?= $this->Form->control('idstudent', ['class' => 'form-control selectpicker', 'data-live-search', 'label' => false, 'required' => true, 'options' => [null], 'title' => 'Selecione o estudante']) ?>
					</div>
					<?php if($role == C_RoleTudo) { ?>
						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
							<label class="control-label text-muted"> Professor </label>
							<?= $this->Form->control('idteacher', ['class' => 'form-control selectpicker', 'data-live-search', 'label' => false, 'required' => true, 'options' => $teachers, 'title' => 'Selecione o professor']) ?>
						</div>
					<?php } ?>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label class="control-label text-muted"> Agendamento </label>
						<?= $this->Form->control('idschedule', ['class' => 'form-control selectpicker', 'data-live-search', 'label' => false, 'required' => true, 'options' => [null], 'title' => 'Selecione o agendamento']) ?>
					</div>
				</div>
				<hr>
				<div class="div-content">
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		$('.div-content').hide();

		// Students by Classes
			$('#idclass').change(function(e) {
				var idclass = $(this).val();
				$('.div-content').fadeOut();
				$('.div-content').html('');
				$.ajax({
					url: "<?= Router::url([ 'controller' => 'Classes', 'action' => 'classstudents', ], true); ?>" + "/" + idclass + '/true',
					dataType: 'json', 
					success: function(data) {
						$('#idstudent').empty();
						$.each(data, function(index, option) {
							$('#idstudent').append('<option value="' + option.id + '">' + option.name + '</option>');
						});
						$('#idstudent').selectpicker('refresh');
					},
					error: function(error) {
						console.error('Erro ao obter opções:', error);
					},
					beforeSend() { preLoadGira(1, 'Carregando lista de estudantes...') },
					complete() { preLoadGira(0); }
				});
			})
		// Schedules disponíveis 
			$('#idstudent, #idclass').change(function(e) {
				var idstudent = $('#idstudent').val();
				var idclass = $('#idclass').val();
				if(idstudent != '' && idclass != '' ) {
					$.ajax({
						url: "<?= Router::url([ 'controller' => 'Schedules', 'action' => 'schedulesopt', ], true); ?>",
						data: {idstudent: idstudent, idclass: idclass},
						type: 'post',
						dataType: 'JSON', 
						success: function(data) {
							$('#idschedule').empty();
							$.each(data, function(index, option) {
								$('#idschedule').append('<option value="' + index + '">' + option + '</option>');
							});
							$('#idschedule').selectpicker('refresh');
						},
						error: function(data) {
							alert(data.responseJSON)
						},
						beforeSend() { preLoadGira(1, 'Carregando lista de estudantes...') },
						complete() { preLoadGira(0); }
					});
				}
			})
		// Avaliação  
			$('#idstudent').change(function(e) {
				var idstudent = $(this).val();
				
				$.ajax({
					url: "<?= Router::url([ 'controller' => 'Assessment', 'action' => 'questions', ], true); ?>" + "/" + idstudent,
					dataType: 'html', 
					success: function(data) {
						$('.div-content').html(data);
						$('.div-content').fadeIn();
					},
					error: function(error) {
						console.error('Erro ao obter opções:', error);
					},
					beforeSend() { preLoadGira(1, 'Carregando avaliação...') },
					complete() { preLoadGira(0); }
				});
			});
		//
	});
</script>