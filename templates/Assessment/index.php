
<div class="content">
	<div class="row">
		<div class="col-12">
			<?= $this->Html->link(__('Nova avaliação'), ['action' => 'add'], ['class' => 'btn btn-lg btn-success float-right']) ?>
			<h3> Avaliações </h3>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-row-clickable" id="table">
			<thead class="text-primary">
				<tr>
					<th> # </th>
					<th> Estudante </th>
					<th> Índice </th>
					<th> Professor </th>
					<th> Valor </th>
					<th> Agendamento </th>
					<th class="actions"> Ações </th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($assessment as $reg): ?>
					<tr>
						<td> <?= $reg->id ?> </td>
						<td> <?= $reg->student->name ?> </td>
						<td> <?= $reg->index->name ?> </td>
						<td> <?= $reg->teacher->name ?> </td>
						<td> <?= $reg->value ?> </td>
						<td data-order='<?= date_format($reg->schedule->date, 'YmdHis' ) ?>'> <?= $reg->schedule->name . ' ' . date_format($reg->schedule->date, 'd/m/Y - H:i:s' ) ?> </td>
						<td class="actions">
							<?= $this->Html->link('<i class="fa fa-eye"></i>', ["action" => "view", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Visualizar', 'class' => 'btn btn-info text-white btn-xs', 'id' => $reg->id, 'escape' => false]); ?>
							<?= $this->Html->link('<i class="fa fa-edit"></i>', ["action" => "edit", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Editar', 'class' => 'btn btn-warning text-white btn-xs', 'id' => $reg->id, 'escape' => false]); ?>
							<?= $this->Html->link('<i class="fa fa-trash"></i>', ["action" => "delete", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Excluir', 'class' => 'btn btn-danger text-white btn-xs', 'id' => $reg->id, 'escape' => false]); ?></td>
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
		table.DataTable(window.datatableOptions);
	});
</script>