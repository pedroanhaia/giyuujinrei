<div class="content">
	<div class="table-responsive">
		<table class="table table-hover table-row-clickable" id="table">
			<thead class="text-primary">
				<tr>
					<th> # </th>
					<th> Nome </th>
					<th> Data </th>
					<th> Dojô </th>
					<th class="actions"> Ações </th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($schedules as $reg): ?>
					<tr>
						<td> <?= $reg->id ?> </td>
						<td> <?= $reg->name ?> </td>
						<td data-order='<?= date_format($reg->data, 'Ymd') ?>'> <?= date_format($reg->data, 'd/m/Y') ?> </td>
						<td> <?= $reg->core->name ?> </td>
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
	<div class ='row'>
		<div class="col-12 col-paginator">
		 <?= $this->Paginator->first('<< ' . __('Primeira')) ?>
			<?= $this->Paginator->prev('< ' . __('Anterior')) ?>
			<?= $this->Paginator->numbers() ?>
			<?= $this->Paginator->next(__('Próxima') . ' >') ?>
			<?= $this->Paginator->last(__('Úlima') . ' >>') ?>
			<p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} resultado(s) de {{count}} totais')) ?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<?= $this->Html->link(__('Novo agendamento'), ['action' => 'add'], ['class' => 'btn btn-lg btn-success float-right']) ?>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		var table = $('#table').DataTable({
			dom: 'rt', // Adicione os elementos que você deseja (l - length, r - processing, t - table, i - information, p - pagination),
			"language": window.datatableOptionsLanguage,
			"paging" : false,
			"order": [0, 'DESC'],
			"bPaginate": false,
		});
	});
</script>