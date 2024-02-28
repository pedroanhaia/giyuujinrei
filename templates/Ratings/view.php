<div class="col-md-12 content">
	<div class="row">
		<div class="col-12">
			<?= $role >= C_RoleTudo ? $this->Form->postLink(__('Excluir área'), ['action' => 'delete', $rating->id], ['confirm' => __('Você confirma a exclusão deste item?', $rating->id), 'class' => 'btn btn-danger text-white float-right m-r-5']) : '' ?>
			<?= $role >= C_RoleTudo ? $this->Html->link(__('Alterar área'), ['action' => 'edit', $rating->id], ['class' => 'btn btn-warning text-white float-right m-r-5']) : '' ?>
			<?= $this->Html->link(__('Lista de áreas'), ['action' => 'index'], ['class' => 'btn btn-info text-white float-right m-r-5']) ?>
			<h3> <?= $title ?> </h3>
		</div>
	</div>
	<div class="card">
		<div class="column-responsive column-80">
			<div class="ratings view content">
				<h3><?= h($rating->name) ?></h3>
				<table>
					<tr>
						<th><?= __('#') ?></th>
						<td><?= $this->Number->format($rating->id) ?></td>
					</tr>
					<tr>
						<th><?= __('Nome') ?></th>
						<td><?= h($rating->name) ?></td>
					</tr>
					<tr>
						<th><?= __('Idade mínima') ?></th>
						<td><?= $rating->age_min === null ? '' : $this->Number->format($rating->age_min) ?></td>
					</tr>
					<tr>
						<th><?= __('Idade máxima') ?></th>
						<td><?= $rating->age_max === null ? '' : $this->Number->format($rating->age_max) ?></td>
					</tr>
					<tr>
						<th><?= __('Criado em:') ?></th>
						<td><?= date_format($rating->created, 'd/m/Y - H:i:s') ?></td>
					</tr>
					<tr>
						<th><?= __('Modificado em:') ?></th>
						<td><?= date_format($rating->modified, 'd/m/Y - H:i:s') ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>