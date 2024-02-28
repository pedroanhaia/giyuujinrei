<?php
	use Cake\Routing\Router;
	echo $this->Html->css(['presenca.css']);
?>
<div class="col-md-12 content">
	<h3> <?= $title ?> </h3>
	<div class="card">
		<div class="card-body">
			<?= $this->Form->create($schedule, ['class' => 'form-material mt-2']) ?>
				<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label class="control-label text-muted"> Turma: </label>
						<?= $schedule->class->name ?>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label class="control-label text-muted"> Data: </label>
						<?= date_format($schedule->date, 'd/m/Y');  ?>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
						<?= $this->Form->button('Salvar presenças', ['class' => 'btn btn-success btn-lg mt-5']) ?>
					</div>
				</div>
				<div class="div-content">
					<table id="studentTable">
						<div class="row row-title">
							<div class="col-9">
								<label for="Estudante" class="attendance-label"> Estudante </label>
							</div>
							<div class="col-3">
								<button class='btn btn-queequaseinfo' id="selectAll"> <i class="fa-regular fa-square-check"></i> </button>
							</div>
						</div>
						<div id="studentsList">
							<?php foreach($schedule->attendances as $reg) { ?>
								<div class="row row-student">
									<div class="col-9">
										<?= $reg->student->name ?>
									</div>
									<div class="col-3">
										<input type="checkbox" id="student<?= $reg->id ?>" name="attendance[<?= $reg->idstudent ?>]" value="1" <?= $reg->present ? 'checked' : '' ?>><input type="hidden" name="attendance[<?= $reg->idstudent ?>]" value="0">
									</div>
								</div>
							<?php } ?>
						</div>
					</table>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>
<script>
	// Adiciona funcionalidade ao checkbox para atribuir valores 1 ou 0 
		$('#studentsList').on('change', 'input[type="checkbox"]', function () {
			var value = this.checked ? 1 : 0;
			$(this).val(value);
			$(this).next('input[type="hidden"]').val(value); // Atualiza o input hidden
		});
	// Selecionar todos 
		$('#selectAll').on('click', function (e) {
			e.preventDefault();
			// Marca ou desmarca todos os checkboxes com base no estado do botão "Todos"
			var isChecked = $(this).html() === '<i class="fa-regular fa-square-check"></i>';

			$('input[type="checkbox"]').prop('checked', isChecked).each(function () {
				var value = isChecked ? 1 : 0;
				$(this).val(value);
				$(this).next('input[type="hidden"]').val(value); // Atualiza os inputs hidden
			});
			$(this).html(isChecked ? '<i class="fa-regular fa-square"></i>' : '<i class="fa-regular fa-square-check"></i>');
		});
	//
</script>