<div class="content">
	<div class="row">
		<div class="col-12">
			<?= $this->Html->link(__('Novo usuáiro'), ['action' => 'add'], ['class' => 'btn btn-lg btn-success float-right']) ?>
			<h3> Usuários </h3>
		</div>
	</div>
	<ul class="nav nav-tabs customtab" role="tablist">
		<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#admins" role="tab" aria-selected="true"><span class="hidden-sm-up"> </span> <span class="hidden-xs-down"> Admins </span></a> </li>
		<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#teachers" role="tab" aria-selected="false"><span class="hidden-sm-up"> </span> <span class="hidden-xs-down"> Professores </span></a> </li>
		<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#responsibles" role="tab" aria-selected="false"><span class="hidden-sm-up"> </span> <span class="hidden-xs-down"> Responsáveis </span></a> </li>
		<!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#studentes" role="tab" aria-selected="false"><span class="hidden-sm-up"> </span> <span class="hidden-xs-down"> Estudantes </span></a> </li> -->
		<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#inactives" role="tab" aria-selected="false"><span class="hidden-sm-up"> </span> <span class="hidden-xs-down"> Inativos </span></a> </li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="admins">
			<div class="table-responsive">
				<table class="table table-hover table-row-clickable" id="table-admins">
					<thead class="text-primary">
						<tr>
							<th> # </th>
							<th> Nome </th>
							<th> E-mail </th>
							<th> Dojô </th>
							<th class="actions"> Ações </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($admins as $reg): ?>
							<tr>
								<td> <?= $reg->id ?> </td>
								<td> <?= $reg->name ?> </td>
								<td> <?= $reg->email ?> </td>
								<td> <?= $reg->core->name ?> </td>
								<td class="actions">
									<?= $this->Html->link('<i class="fa fa-eye"></i>', ["action" => "view", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Visualizar', 'class' => 'btn btn-info text-white btn-sm', 'id' => $reg->id, 'escape' => false]); ?>
									<?= $this->Html->link('<i class="fa fa-edit"></i>', ["action" => "edit", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Editar', 'class' => 'btn btn-warning text-white btn-sm', 'id' => $reg->id, 'escape' => false]); ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="tab-pane" id="teachers">
			<div class="table-responsive">
				<table class="table table-hover table-row-clickable" id="table-teachers">
					<thead class="text-primary">
						<tr>
							<th> # </th>
							<th> Nome </th>
							<th> E-mail </th>
							<th> Dojô </th>
							<th class="actions"> Ações </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($teachers as $reg): ?>
							<tr>
								<td> <?= $reg->id ?> </td>
								<td> <?= $reg->name ?> </td>
								<td> <?= $reg->email ?> </td>
								<td> <?= $reg->core->name ?> </td>
								<td class="actions">
									<?= $this->Html->link('<i class="fa fa-eye"></i>', ["action" => "view", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Visualizar', 'class' => 'btn btn-info text-white btn-sm', 'id' => $reg->id, 'escape' => false]); ?>
									<?= $this->Html->link('<i class="fa fa-edit"></i>', ["action" => "edit", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Editar', 'class' => 'btn btn-warning text-white btn-sm', 'id' => $reg->id, 'escape' => false]); ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="tab-pane" id="responsibles">
			<div class="table-responsive">
				<table class="table table-hover table-row-clickable" id="table-responsibles">
					<thead class="text-primary">
						<tr>
							<th> # </th>
							<th> Nome </th>
							<th> E-mail </th>
							<th> Dojô </th>
							<th class="actions"> Ações </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($responsibles as $reg): ?>
							<tr>
								<td> <?= $reg->id ?> </td>
								<td> <?= $reg->name ?> </td>
								<td> <?= $reg->email ?> </td>
								<td> <?= $reg->core->name ?> </td>
								<td class="actions">
									<?= $this->Html->link('<i class="fa fa-eye"></i>', ["action" => "view", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Visualizar', 'class' => 'btn btn-info text-white btn-sm', 'id' => $reg->id, 'escape' => false]); ?>
									<?= $this->Html->link('<i class="fa fa-edit"></i>', ["action" => "edit", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Editar', 'class' => 'btn btn-warning text-white btn-sm', 'id' => $reg->id, 'escape' => false]); ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="tab-pane" id="studentes">
			<div class="table-responsive">
				<table class="table table-hover table-row-clickable" id="table-students">
					<thead class="text-primary">
						<tr>
							<th> # </th>
							<th> Nome </th>
							<th> E-mail </th>
							<th> Dojô </th>
							<th class="actions"> Ações </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($studentes as $reg): ?>
							<tr>
								<td> <?= $reg->id ?> </td>
								<td> <?= $reg->name ?> </td>
								<td> <?= $reg->email ?> </td>
								<td> <?= $reg->core->name ?> </td>
								<td class="actions">
									<?= $this->Html->link('<i class="fa fa-eye"></i>', ["action" => "view", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Visualizar', 'class' => 'btn btn-info text-white btn-sm', 'id' => $reg->id, 'escape' => false]); ?>
									<?= $this->Html->link('<i class="fa fa-edit"></i>', ["action" => "edit", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Editar', 'class' => 'btn btn-warning text-white btn-sm', 'id' => $reg->id, 'escape' => false]); ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="tab-pane" id="inactives">
			<div class="table-responsive">
				<table class="table table-hover table-row-clickable" id="table-inactives">
					<thead class="text-primary">
						<tr>
							<th> # </th>
							<th> Nome </th>
							<th> E-mail </th>
							<th> Dojô </th>
							<th> Tipo </th>
							<th class="actions"> Ações </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($inactive as $reg): ?>
							<tr>
								<td> <?= $reg->id ?> </td>
								<td> <?= $reg->name ?> </td>
								<td> <?= $reg->email ?> </td>
								<td> <?= $reg->core->name ?> </td>
								<td> <?= UsersRoles($reg->role) ?> </td>
								<td class="actions">
									<?= $this->Html->link('<i class="fa fa-eye"></i>', ["action" => "view", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Visualizar', 'class' => 'btn btn-info text-white btn-sm', 'id' => $reg->id, 'escape' => false]); ?>
									<?= $this->Html->link('<i class="fa fa-edit"></i>', ["action" => "edit", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Editar', 'class' => 'btn btn-warning text-white btn-sm', 'id' => $reg->id, 'escape' => false]); ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		var dataTableAdmins = $('#table-admins').DataTable({"pageLength": 10, "language": datatableOptionsLanguage, "order" : [0, "asc"]});
		var dataTableTeachers = $('#table-teachers').DataTable({"pageLength": 10, "language": datatableOptionsLanguage, "order" : [0, "asc"]});
		var dataTableResponsibles = $('#table-responsibles').DataTable({"pageLength": 10, "language": datatableOptionsLanguage, "order" : [0, "asc"]});
		var dataTableStudents = $('#table-students').DataTable({"pageLength": 10, "language": datatableOptionsLanguage, "order" : [0, "asc"]});
		var dataTableInativos = $('#table-inativos').DataTable({"pageLength": 10, "language": datatableOptionsLanguage, "order" : [0, "asc"]});

		$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
			var targetTab = $(e.target).attr('href');
			if (targetTab === '#admins') {
				dataTableAdmins.columns.adjust().draw();
			} else if (targetTab === '#teachers') {
				dataTableTeachers.columns.adjust().draw();
			} else if (targetTab === '#responsibles') {
				dataTableResponsibles.columns.adjust().draw();
			} else if (targetTab === '#students') {
				dataTableStudents.columns.adjust().draw();
			} else if (targetTab === '#inativos') {
				dataTableInativos.columns.adjust().draw();
			} 
		});
	});
</script>
