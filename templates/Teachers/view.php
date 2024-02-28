<div class="col-md-12 content">
	<div class="row">
		<div class="col-12">
			<?= $this->Form->postLink(__('Excluir professor'), ['action' => 'delete', $teacher->id], ['confirm' => __('Você confirma a exclusão deste item?', $teacher->id), 'class' => 'btn btn-danger text-white float-right m-r-5']) ?>
			<?= $this->Html->link(__('Alterar professor'), ['action' => 'edit', $teacher->id], ['class' => 'btn btn-warning text-white float-right m-r-5']) ?>
			<?= $this->Html->link(__('Lista de professores'), ['action' => 'index'], ['class' => 'btn btn-info text-white float-right m-r-5']) ?>
			<h3> <?= $title ?> </h3>
		</div>
	</div>
	<div class="card">
		<div class="column-responsive column-80">
			<div class="teachers view content">
				<h3><?= h($teacher->name) ?></h3>
				<table>
					<tr>
						<th><?= __('#') ?></th>
						<td><?= $this->Number->format($teacher->id) ?></td>
					</tr>
					<tr>
						<th><?= __('Nome') ?></th>
						<td><?= h($teacher->name) ?></td>
					</tr>
					<tr>
						<th><?= __('Fone') ?></th>
						<td><?= h($teacher->phone) ?></td>
					</tr>
					<tr>
						<th><?= __('RG') ?></th>
						<td><?= h($teacher->rg) ?></td>
					</tr>
					<tr>
						<th><?= __('E-mail') ?></th>
						<td><?= h($teacher->email) ?></td>
					</tr>
					<tr>
						<th><?= __('Tipo') ?></th>
						<td><?= $teacher->type === null ? '' : TeachersTypes($teacher->type) ?></td>
					</tr>
					<tr>
						<th><?= __('Usuário') ?></th>
						<td> <?= $teacher->user ? $this->Html->link(__($teacher->user->name), ['controller' => 'Users', 'action' => 'view', $teacher->iduser], ['target' => '_blank', 'class' => 'link']) : '' ?> </td>
					</tr>
					<tr>
						<th><?= __('Criado em:') ?></th>
						<td><?= date_format($teacher->created, 'd/m/Y - H:i:s') ?></td>
					</tr>
					<tr>
						<th><?= __('Modificado em:') ?></th>
						<td><?= date_format($teacher->modified, 'd/m/Y - H:i:s') ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
