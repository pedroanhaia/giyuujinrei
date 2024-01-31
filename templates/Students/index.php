<div class="content">
	<div class="row">
		<div class="col-12">
			<?= $role >= C_RoleProfessor ? $this->Html->link(__('Novo estudante'), ['action' => 'add'], ['class' => 'btn btn-lg btn-success float-right']) : '' ?>
			<h3> Estudantes </h3>
		</div>
	</div>
	<?php if($role >= C_RoleProfessor) { ?>
		<ul class="nav nav-tabs customtab" role="tablist">
			<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#ativos" role="tab" aria-selected="true"><span class="hidden-sm-up"> </span> <span class="hidden-xs-down"> Ativos </span></a> </li>
			<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#inativos" role="tab" aria-selected="false"><span class="hidden-sm-up"> </span> <span class="hidden-xs-down"> Inativos </span></a> </li>
		</ul>
	<?php } ?>
	<div class="tab-content">
		<div class="tab-pane active" id="ativos">
			<div class="table-responsive">
				<table class="table table-hover table-row-clickable" id="table-ativos">
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
									<?= $role >= C_RoleTudo ? $this->Html->link('<i class="fa fa-edit"></i>', ["action" => "edit", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Editar', 'class' => 'btn btn-warning text-white btn-sm', 'id' => $reg->id, 'escape' => false]) : '' ?>
									<?= $role >= C_RoleTudo ? $this->Html->link('<i class="fa fa-trash"></i>', ["action" => "delete", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Excluir', 'class' => 'btn btn-danger text-white btn-sm', 'id' => $reg->id, 'escape' => false]) : '' ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<?php if($role >= C_RoleProfessor) { ?>
			<div class="tab-pane" id="inativos">
				<div class="table-responsive">
					<table class="table table-hover table-row-clickable" id="table-inativo">
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
							<?php foreach ($inactiveStudents as $reg):
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
										<?= $role >= C_RoleTudo ? $this->Html->link('<i class="fa fa-edit"></i>', ["action" => "edit", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Editar', 'class' => 'btn btn-warning text-white btn-sm', 'id' => $reg->id, 'escape' => false]) : '' ?>
										<?= $role >= C_RoleTudo ? $this->Html->link('<i class="fa fa-trash"></i>', ["action" => "delete", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Excluir', 'class' => 'btn btn-danger text-white btn-sm', 'id' => $reg->id, 'escape' => false]) : '' ?>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
<script>
	$(document).ready(function() {
		var table = $('#table-ativos, #table-inativo');
		table.DataTable({
			"pageLength": 10,
			"language": datatableOptionsLanguage,
			"order" : [1, "asc"],
		});
	});
</script>
