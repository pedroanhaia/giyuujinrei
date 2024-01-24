<div class="content">
	<div class="row">
		<div class="col-12">
			<?= $this->Html->link(__('Novo estudante'), ['action' => 'add'], ['class' => 'btn btn-lg btn-success float-right']) ?>
			<h3> Estudantes </h3>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-row-clickable" id="table">
			<thead class="text-primary">
				<tr>
					<th> # </th>
					<th> Nome </th>
					<th> Esporte </th>
					<th> Dojô </th>
					<th> Turma </th>
					<th> Graduação </th>
					<th> Responsável </th>
					<th> Idade </th>
					<th> Fone </th>
					<th> E-mail </th>
					<th class="actions"> Ações </th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($students as $reg):
					$today = new DateTime();  ?>
					<tr>
						<td> <?= $reg->id ?> </td>
						<td> <?= $reg->name ?> </td>
						<td> <?= $reg->sport->name ?> </td>
						<td> <?= $reg->core->name ?> </td>
						<td> <?= $reg->class->name ?> </td>
						<td> <?= $reg->rank->name ?> </td>
						<td> <?= $reg->responsible->name ?> </td>
						<td> 
							<?php
								$birthday = new DateTime($reg->birthday);
								$diff = $today->diff($birthday);
								echo $diff->y . " anos";
							?> 
						</td>
						<td> <?= $reg->phone ?> </td>
						<td> <?= $reg->email ?> </td>
						<td class="actions">
							<?= $this->Html->link('<i class="fa fa-eye"></i>', ["action" => "view", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Visualizar', 'class' => 'btn btn-info text-white btn-sm', 'id' => $reg->id, 'escape' => false]); ?>
							<?= $this->Html->link('<i class="fa fa-edit"></i>', ["action" => "edit", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Editar', 'class' => 'btn btn-warning text-white btn-sm', 'id' => $reg->id, 'escape' => false]); ?>
							<?= $this->Html->link('<i class="fa fa-trash"></i>', ["action" => "delete", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Excluir', 'class' => 'btn btn-danger text-white btn-sm', 'id' => $reg->id, 'escape' => false]); ?>
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