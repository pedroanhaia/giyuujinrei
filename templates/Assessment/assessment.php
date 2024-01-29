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
						<?= $this->Form->control('idschedule', ['class' => 'form-control selectpicker', 'data-live-search', 'label' => false, 'required' => true, 'options' => $schedules, 'title' => 'Selecione o agendamento']) ?>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-12">
						<div class="studentImg text-center"> </div>
					</div>
				</div>
				<?php foreach ($ratings as $rating): ?>
					<div class="row">
						<div class="col-12">
							<div class="rating-group" id="rating<?= $rating->id ?>" data-age_max="<?= $rating->age_max ?>" data-age_min="<?= $rating->age_min ?>">
								<span class='rating-title'> <?= $rating->name ?> </span>
								<div class="row">
									<?php foreach ($rating->indexes as $index): ?>
										<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-xs-12 index" id="index<?= $index->id ?>" data-age_max="<?= $index->age_max ?>" data-age_min="<?= $index->age_min ?>">
											<div class="question">
												<label class='control-label' for="<?= $index->name ?>"> <?= ucfirst($index->name) ?>: </label>
												<input class='input-range' type="range" name="index[<?= $index->id ?>]" id="<?= $index->id ?>" min="0" max="10" step="1" value="5">
												<input type="text" name="index_value[<?= $index->id ?>]" value="5" readonly>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
				<div class="row mt-5">
					<div class="col-12">
						<?= $this->Form->button('Salvar avaliação', ['class' => 'btn btn-success btn-lg float-right']) ?>
					</div>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		var studentsPics = [];
		var studentsAge = [];
		
		// Students by Classes
			$('#idclass').change(function(e) {
				var idclass = $(this).val();
				$.ajax({
					url: "<?= Router::url([ 'controller' => 'Classes', 'action' => 'classstudents', ], true); ?>" + "/" + idclass + '/true',
					dataType: 'json', 
					success: function(data) {
						$('#idstudent').empty();
						studentsPics = [];
						studentsAge = [];
						$.each(data, function(index, option) {
							studentsPics[option.id] = option.urlpicture;
							studentsAge[option.id] = calcularIdade(option.birthday);
							$('#idstudent').append('<option value="' + option.id + '">' + option.name + '</option>');
						});
						$('#idstudent').selectpicker('refresh');
					},
					error: function(error) {
						console.error('Erro ao obter opções:', error);
					}
				});
			})
		// Idade 
			function calcularIdade(dataNascimento) {
				// Cria um objeto de data com a data de nascimento
				var dataNascimentoObj = new Date(dataNascimento);

				// Obtém a data atual
				var dataAtual = new Date();

				// Calcula a diferença entre as datas em milissegundos
				var diferencaMilissegundos = dataAtual - dataNascimentoObj;

				// Converte a diferença para anos
				var idade = Math.floor(diferencaMilissegundos / (365.25 * 24 * 60 * 60 * 1000));

				return idade;
			}
		// Infos Student 
			$('#idstudent').change(function(e) {
				var idstudent = $(this).val();
				$('.studentImg').html('<img src="' + studentsPics[idstudent] + '" style="max-height: 133px; max-width: 100px" alt="Imagem do estudante">');

				var agestudent = studentsAge[idstudent];
				$.each($('.rating-group'), function(index, rating) {
					var ageMin = $(rating).data('age_min');
					var ageMax = $(rating).data('age_max');

					if(agestudent < ageMin || agestudent > ageMax) $(rating).hide();
					else $(rating).show();
				});

				$.each($('.index'), function(index, index) {
					var ageMin = $(index).data('age_min');
					var ageMax = $(index).data('age_max');

					if(agestudent < ageMin || agestudent > ageMax) $(index).hide();
					else $(index).show();
				});
			});

		// Atualiza o valor do campo de texto com o valor do range
			$('input[type="range"]').on('input', function () {
				$(this).next('input[type="text"]').val($(this).val());
			});
		// 
	});
</script>