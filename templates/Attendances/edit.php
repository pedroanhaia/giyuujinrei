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
						<thead>
							<tr>
								<th width='80%'> Estudante </th>
								<th> Presença <button class='btn btn-queequaseinfo' id="selectAll"> Selecionar Todos </button> </th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($schedule->attendances as $reg) { ?>
								<tr>
									<td class="tdPresenca"> <?= $reg->student->name ?> </td>
									<td><input type="checkbox" id="student<?= $reg->id ?>" name="attendance[<?= $reg->idstudent ?>]" value="<?= $reg->present ?>" <?= $reg->present ? 'checked' : '' ?>><input type="hidden" name="attendance[<?= $reg->idstudent ?>]" value="<?= $reg->present ?>"></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>
<script>
	// Adiciona funcionalidade ao checkbox para atribuir valores 1 ou 0
		$('#studentTable').on('change', 'input[type="checkbox"]', function () {
			var value = this.checked ? 1 : 0;
			$(this).val(value);
			$(this).next('input[type="hidden"]').val(value); // Atualiza o input hidden
		});
	// Selecionar todos 
		$('#selectAll').on('click', function () {
			// Marca ou desmarca todos os checkboxes com base no estado do botão "Selecionar Todos"
			var isChecked = $(this).text() === 'Selecionar Todos';

			$('input[type="checkbox"]').prop('checked', isChecked).each(function () {
			var value = isChecked ? 1 : 0;
			$(this).val(value);
			$(this).next('input[type="hidden"]').val(value); // Atualiza os inputs hidden
			});
			$(this).text(isChecked ? 'Desmarcar Todos' : 'Selecionar Todos');
		});
	// 
</script>