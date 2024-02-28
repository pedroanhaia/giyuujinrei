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
						<?= $this->Form->control('idclass', ['class' => 'form-control selectpicker', 'data-live-search', 'label' => false, 'required' => true, 'options' => $classes, 'title' => 'Selecione a turma']) ?>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label class="control-label text-muted"> Data: </label>
						<?= $this->Form->date('date', ['class' => 'form-control', 'label' => false, 'value' => date('m/d/Y'), 'required' => true, 'placeholder' => 'Informe a data da aula']) ?>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
						<?= $this->Form->button('Salvar presenças', ['class' => 'btn btn-success btn-lg mt-5']) ?>
					</div>
				</div>
				<div class="div-content">
					<div class="row row-title">
						<div class="col-9">
							<label for="Estudante" class="attendance-label"> Estudante </label>
						</div>
						<div class="col-3">
							<button class='btn btn-queequaseinfo' id="selectAll"> <i class="fa-regular fa-square-check"></i> </button>
						</div>
					</div>
					<div id="studentsList">
					</div>
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
					$('#studentsList').empty();
					$('#selectAll').html('<i class="fa-regular fa-square-check"></i>');

					// Adiciona cada estudante à lista
					$.each(students, function (index, student) {
						var row = $('<div>').addClass('row').addClass('row-student');
						var nameCell = $('<div>').text(student.name).addClass('col-9');
						var checkboxCell = $('<div>').addClass('col-3');

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

						$('#studentsList').append(row);
					});
				},
				error: function(error) { console.error('Erro ao obter opções:', error);},
				beforeSend() { preLoadGira(1, 'Carregando lista de estudantes...') },
				complete() { preLoadGira(0); }
			});
		})
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