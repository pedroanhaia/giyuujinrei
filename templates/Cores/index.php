
<div class="content">
	<div class="row">
		<div class="col-12">
			<?= $role >= C_RoleTudo ? $this->Html->link(__('Novo dojô'), ['action' => 'add'], ['class' => 'btn btn-lg btn-success float-right']) : '' ?>
			<h3> Dojôs </h3>
		</div>
	</div>
	<?php if($role >= C_RoleTudo) { ?>
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
							<th> Nome </th>
							<th> Cidade </th>
							<th> Qtd. Estudantes </th>
							<th> Tipo </th>
							<th> Contato  </th>
							<th> Cargo  </th>
							<th> Fone </th>
							<th> E-mail </th>
							<th class="actions"> Ações </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($cores as $reg): ?>
							<tr>
								<td> <?= $reg->name ?> </td>
								<td> <?= $reg->city ?> </td>
								<td> <?= $reg->count_students ? $reg->count_students : 0 ?> </td>
								<td> <?= CoresTypes($reg->type) ?> </td>
								<td> <?= $reg->contact ?> </td>
								<td> <?= $reg->positioncontact ?> </td>
								<td> <?= $reg->phone ?> </td>
								<td> <?= $reg->email ?> </td>
								<td class="actions">
									<?= $this->Html->link('<i class="fa fa-eye"></i>', ["action" => "view", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Visualizar', 'class' => 'btn btn-info text-white btn-xs', 'id' => $reg->id, 'escape' => false]); ?>
									<?= $role >= C_RoleTudo ? $this->Html->link('<i class="fa fa-edit"></i>', ["action" => "edit", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Editar', 'class' => 'btn btn-warning text-white btn-xs', 'id' => $reg->id, 'escape' => false]) : '' ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="tab-pane" id="inativos">
			<div class="table-responsive">
				<table class="table table-hover table-row-clickable" id="table-inativos">
					<thead class="text-primary">
						<tr>
							<th> Nome </th>
							<th> Cidade </th>
							<th> Qtd. Estudantes </th>
							<th> Tipo </th>
							<th> Contato  </th>
							<th> Cargo  </th>
							<th> Fone </th>
							<th> E-mail </th>
							<th class="actions"> Ações </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($inactiveCores as $reg): ?>
							<tr>
								<td> <?= $reg->name ?> </td>
								<td> <?= $reg->city ?> </td>
								<td> <?= $reg->count_students ? $reg->count_students : 0 ?> </td>
								<td> <?= CoresTypes($reg->type) ?> </td>
								<td> <?= $reg->contact ?> </td>
								<td> <?= $reg->positioncontact ?> </td>
								<td> <?= $reg->phone ?> </td>
								<td> <?= $reg->email ?> </td>
								<td class="actions">
									<?= $this->Html->link('<i class="fa fa-eye"></i>', ["action" => "view", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Visualizar', 'class' => 'btn btn-info text-white btn-xs', 'id' => $reg->id, 'escape' => false]); ?>
									<?= $role >= C_RoleTudo ? $this->Html->link('<i class="fa fa-edit"></i>', ["action" => "edit", $reg->id, '0'], ['rel' => 'tooltip', 'title' => 'Editar', 'class' => 'btn btn-warning text-white btn-xs', 'id' => $reg->id, 'escape' => false]) : '' ?>
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
		var dataTableAtivos = $('#table-ativos').DataTable({"pageLength": 10, "language": datatableOptionsLanguage, "order" : [0, "asc"]});
		var dataTableInativos = $('#table-inativos').DataTable({"pageLength": 10, "language": datatableOptionsLanguage, "order" : [0, "asc"]});

		$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
			var targetTab = $(e.target).attr('href');
			if (targetTab === '#ativos') {
				dataTableAtivos.columns.adjust().draw();
			} else if (targetTab === '#inativos') {
				dataTableInativos.columns.adjust().draw();
			}
		});
	});
</script>