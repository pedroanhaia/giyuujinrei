<?= $this->Html->css(['assessment.css']); ?>
<div class="col-md-12 content">
	<h3> <?= $title ?> </h3>
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<label class="control-label text-muted"> Nome: </label>
					<?= $schedule->name ?>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<label class="control-label text-muted"> Turma: </label>
					<?= $schedule->class->name ?>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<label class="control-label text-muted"> Data: </label>
					<?= date_format($schedule->date, 'd/m/Y');  ?>
				</div>
			</div>
			<div class="div-content">
				<table id="studentTable">
					<thead>
						<tr>
							<th width='80%'> Estudante </th>
							<th> Ações </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($students as $reg) { ?>
							<tr>
								<td class="tdPresenca"> <?= $reg['name'] ?> </td>
								<td>
									<?= $this->Html->link('<i class="fa fa-eye"></i>', ["action" => "questionsview", $reg['id'], $schedule->id], ['rel' => 'tooltip', 'title' => 'Visualizar', 'class' => 'btn btn-info text-white btn-xs btn-view', 'escape' => false]); ?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal-questions">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"> Avaliação </h4>
				<?= $this->Html->link('<i class="fa fa-edit"></i>', ["#"], ['rel' => 'tooltip', 'title' => 'Alterar', 'class' => 'btn btn-warning btn-edit text-white btn-xs', 'escape' => false]); ?>
			</div>
			<div class="modal-body">
			</div>
		</div>
	</div>
</div>
<script>
	$('.btn-view').click(function(e) {
		e.preventDefault();
		var url = $(this).attr('href');
		$.ajax({
			url: url,
			dataType: 'html', 
			success: function(data) {
				$('.modal-body').html(data);
				$('.modal-body').fadeIn();
				$('.btn-edit').show();
				$('#modal-questions').modal('toggle');
			},
			error: function(error) {
				console.error('Erro ao obter opções:', error);
			},
			beforeSend() { preLoadGira(1, 'Carregando avaliação...') },
			complete() { preLoadGira(0); }
		});
	}) 
</script>