<?php
	use Cake\Routing\Router;
	echo $this->Html->css(['presenca.css']);
?>
<div class="col-md-12 content">
	<h3> <?= $title ?> </h3>
	<div class="card">
		<div class="card-body">
			<?= $this->Form->create(null, ['class' => 'form-material mt-2']) ?>
				<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label class="control-label text-muted"> Selecione a turma: </label>
						<?= $this->Form->control('idclass', ['class' => 'form-control selectpicker', 'data-live-search', 'label' => false, 'required' => true, 'options' => $classes, 'title' => 'Selecione o estudante']) ?>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label class="control-label text-muted"> Data: </label>
						<?= $this->Form->date('date', ['class' => 'form-control', 'label' => false, 'default' => date('d/m/Y'), 'required' => true, 'placeholder' => 'Informe a data da aula']) ?>
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
						</tbody>
					</table>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>
<script>
	$('.div-content').hide();
	// Turma 
		$('#idclass').change(function(e) {
			var idclass = $(this).val();
			$.ajax({
				url: "<?= Router::url([ 'controller' => 'Classes', 'action' => 'classstudents', ], true); ?>" + "/" + idclass,
				dataType: 'json', 
				success: function(data) {
					$('.div-content').fadeIn();
					var students = data;

					// Limpar a tabela ao trocar 
					$('#studentTable tbody').empty();
					$('#selectAll').text('Selecionar Todos');

					// Adiciona cada estudante à lista
					$.each(students, function (index, student) {
						var row = $('<tr>');
						var nameCell = $('<td>').text(student.name).addClass('tdPresenca');
						var checkboxCell = $('<td>');
						var checkbox = $('<input type="checkbox">').attr('id', 'student' + student.id).attr('name', 'student' + student.id);

						var checkbox = $('<input type="checkbox">').attr({
							'id': 'student' + student.id,
							'name': 'attendance[' + student.id + ']',
							'value': '0'
						});

						var hiddenInput = $('<input type="hidden">').attr({
							'name': 'attendance[' + student.id + ']',
							'value': '0'
						});

						checkboxCell.append(checkbox);
						checkboxCell.append(hiddenInput);

						row.append(nameCell);
						row.append(checkboxCell);

						$('#studentTable tbody').append(row);
					});
				},
				error: function(error) {
					console.error('Erro ao obter opções:', error);
				}
			});
		})

		 // Adiciona funcionalidade ao checkbox para atribuir valores 1 ou 0
		 $('#studentTable').on('change', 'input[type="checkbox"]', function () {
				var value = this.checked ? 1 : 0;
				$(this).val(value);
				$(this).next('input[type="hidden"]').val(value); // Atualiza o input hidden
		});

		// Adiciona funcionalidade ao botão "Selecionar Todos"
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


	// Selecionar todos 
		
	// 
</script>