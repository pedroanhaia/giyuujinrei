<div class="content">
	<div class="row">
		<div class="col-12">
			<?= $this->Html->link(__('Cadastrar presenças'), ['action' => 'add'], ['class' => 'btn btn-lg btn-success float-right']) ?>
			<h3> Presenças </h3>
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
							<?= $role >= C_RoleTudo ? $this->Html->link('<i class="fa fa-edit"></i>', ["action" => "edit", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Editar', 'class' => 'btn btn-warning text-white btn-xs', 'id' => $reg->id, 'escape' => false]) : '' ?>
							<?= $role >= C_RoleTudo ? $this->Html->link('<i class="fa fa-trash"></i>', ["action" => "delete", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Excluir', 'class' => 'btn btn-danger text-white btn-xs', 'id' => $reg->id, 'escape' => false]) : '' ?>
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