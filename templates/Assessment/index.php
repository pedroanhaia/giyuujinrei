
<div class="content">
	<div class="table-responsive">
		<table class="table table-hover table-row-clickable" id="tableBets">
			<thead class="text-primary">
				<tr>
					<th> # </th>
					<th> Index </th>
					<th> Professor </th>
					<th> Estudante </th>
					<th> Valor </th>
					<th> Calendário </th>
					<th> Data </th>
					<th class="actions"> Ações </th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($assessment as $reg): ?>
					<tr>
						<td> <?= $reg->id ?> </td>
						<td> <?= $reg->idindex ?> </td>
						<td> <?= $reg->idteacher ?> </td>
						<td> <?= $reg->idstudent ?> </td>
						<td> <?= $reg->value ?> </td>
						<td> <?= $reg->idschedule === null ? '' : $this->Number->format($assessment->idschedule) ?> </td>
						<td> <?= date_format($assessment->created, 'd/m/Y') ?> </td>
						<td> <?= $assessment->role === null ? '' : $this->Number->format($assessment->role) ?> </td>
						<td class="actions">
							<?= $this->Html->link(__('View'), ['action' => 'view', $assessment->id]) ?>
							<?= $this->Html->link(__('Edit'), ['action' => 'edit', $assessment->id]) ?>
							<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $assessment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assessment->id)]) ?>
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
			<?= $this->Html->link(__('Nova avaliação'), ['action' => 'add'], ['class' => 'btn btn-lg btn-success float-right']) ?>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		var table = $('#tableBets').DataTable({
			dom: 'rt', // Adicione os elementos que você deseja (l - length, r - processing, t - table, i - information, p - pagination),
			"language": window.datatableOptionsLanguage,
			"paging" : false,
			"order": [0, 'DESC'],
			"bPaginate": false,
		});

		$('#customSearch').on('keyup', function() {
			table.search(this.value).draw();
		});
	});
</script>