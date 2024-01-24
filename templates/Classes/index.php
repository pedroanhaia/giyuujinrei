
<div class="content">
	<div class="row">
		<div class="col-12">
			<?= $this->Html->link(__('Nova turma'), ['action' => 'add'], ['class' => 'btn btn-lg btn-success float-right']) ?>
			<h3> Turmas </h3>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-row-clickable" id="table">
			<thead class="text-primary">
				<tr>
					<th> Nome </th>
					<th> Qtd. Estudantes </th>
					<th> Professores </th>
					<th> Núcleo </th>
					<th class="actions"> Ações </th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($classes as $reg): ?>
					<tr>
						<td> <?= $reg->name ?> </td>
						<td> <?= $reg->count_students ?> </td>
						<td> <?php foreach($reg->teachers as $teacher) echo $teacher->name . ' <br> ' ?> </td>
						<td> <?= $reg->core->name ?> </td>
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
		table.DataTable({
			"pageLength": 10,
			"language": datatableOptionsLanguage,
			"order" : [0, "asc"],
		});
	});
</script>