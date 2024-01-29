<div class="content">
	<div class="row">
		<div class="col-12">
			<?= $this->Html->link(__('Nova avaliação'), ['action' => 'add'], ['class' => 'btn btn-lg btn-success float-right m-r-5']) ?>
			<?= $this->Html->link(__('Agendamentos'), ['controller' => 'Schedules', 'action' => 'index'], ['class' => 'btn btn-lg btn-queequaseinfo float-right m-r-5']) ?>
			<h3> Avaliações </h3>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-row-clickable" id="table">
			<thead class="text-primary">
				<tr>
					<th> Aula </th>
					<th> Dojô </th>
					<th> Turma </th>
					<th class="actions"> Ações </th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($schedules as $reg): ?>
					<tr>
						<td data-order='<?= date_format($reg->date, 'YmdHis') ?>'> <?= $reg->name ?> </td>
						<td> <?= $reg->core->name ?> </td>
						<td> <?= $reg->class->name ?> </td>
						<td class="actions">
							<?= $this->Html->link('<i class="fa fa-eye"></i>', ["action" => "view", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Visualizar', 'class' => 'btn btn-info text-white btn-xs', 'id' => $reg->id, 'escape' => false]); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<script>
	$(document).ready(function() {
		var table = $('#table');
		table.DataTable({
			"pageLength": 10,
			"language": datatableOptionsLanguage,
			"order" : [0, "asc"],
		});
	});
</script>