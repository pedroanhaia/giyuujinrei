
<div class="content">
	<div class="row">
		<div class="col-12">
			<?= $this->Html->link(__('Novo índice'), ['action' => 'add'], ['class' => 'btn btn-lg btn-success float-right']) ?>
			<?= $this->Html->link(__('Áreas'), ['controller' => 'Ratings', 'action' => 'index'], ['class' => 'btn btn-lg btn-info text-white m-r-5 float-right']) ?>
			<h3> Índices </h3>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-row-clickable" id="table">
			<thead class="text-primary">
				<tr>
					<th> Nome </th>
					<th> Área </th>
					<th> Idade mínima </th>
					<th> Idade máxima </th>
					<th class="actions"> Ações </th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($indexes as $reg): ?>
					<tr>
						<td> <?= $reg->name ?> </td>
						<td> <?= $reg->rating->name ?> </td>
						<td> <?= $reg->age_min ?> </td>
						<td> <?= $reg->age_max ?> </td>
						<td class="actions">
							<?= $this->Html->link('<i class="fa fa-eye"></i>', ["action" => "view", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Visualizar', 'class' => 'btn btn-info text-white btn-xs', 'id' => $reg->id, 'escape' => false]); ?>
							<?= $this->Html->link('<i class="fa fa-edit"></i>', ["action" => "edit", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Editar', 'class' => 'btn btn-warning text-white btn-xs', 'id' => $reg->id, 'escape' => false]); ?>
							<?= $this->Html->link('<i class="fa fa-trash"></i>', ["action" => "delete", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Excluir', 'class' => 'btn btn-danger text-white btn-xs', 'id' => $reg->id, 'escape' => false]); ?>
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
			"order" : [1, "asc"],
		});
	});
</script>