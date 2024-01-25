<div class="col-md-12 content">
	<div class="row">
		<div class="col-12">
			<?= $role >= C_RoleTudo ? $this->Form->postLink(__('Excluir índice'), ['action' => 'delete', $index->id], ['confirm' => __('Você confirma a exclusão deste item?', $index->id), 'class' => 'btn btn-danger text-white float-right m-r-5']) : '' ?>
			<?= $role >= C_RoleTudo ? $this->Html->link(__('Alterar índice'), ['action' => 'edit', $index->id], ['class' => 'btn btn-warning text-white float-right m-r-5']) : '' ?>
			<?= $this->Html->link(__('Lista de índices'), ['action' => 'index'], ['class' => 'btn btn-info text-white float-right m-r-5']) ?>
			<h3> <?= $title ?> </h3>
		</div>
	</div>
	<div class="card">
		<div class="column-responsive column-80">
			<div class="indexes view content">
				<h3><?= h($index->name) ?></h3>
				<table>
					<tr>
						<th><?= __('#') ?></th>
						<td><?= $this->Number->format($index->id) ?></td>
					</tr>
					<tr>
						<th><?= __('Nome') ?></th>
						<td><?= h($index->name) ?></td>
					</tr>
					<tr>
						<th><?= __('Idade mínima') ?></th>
						<td><?= $index->age_min === null ? '' : $this->Number->format($index->age_min) ?></td>
					</tr>
					<tr>
						<th><?= __('Idade máxima') ?></th>
						<td><?= $index->age_max === null ? '' : $this->Number->format($index->age_max) ?></td>
					</tr>
					<tr>
						<th><?= __('Área') ?></th>
						<td><?= $index->rating->name ?></td>
					</tr>
					<tr>
						<th><?= __('Criado em:') ?></th>
						<td><?= date_format($index->created, 'd/m/Y - H:i:s') ?></td>
					</tr>
					<tr>
						<th><?= __('Modificado em:') ?></th>
						<td><?= date_format($index->modified, 'd/m/Y - H:i:s') ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
