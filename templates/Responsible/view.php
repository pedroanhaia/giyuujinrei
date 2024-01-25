<div class="col-md-12 content">
	<div class="row">
		<div class="col-12">
			<?= $role >= C_RoleTudo ? $this->Form->postLink(__('Excluir responsável'), ['action' => 'delete', $responsible->id], ['confirm' => __('Você confirma a exclusão deste item?', $responsible->id), 'class' => 'btn btn-danger text-white float-right m-r-5']) : '' ?>
			<?= $role >= C_RoleTudo ? $this->Html->link(__('Alterar responsável'), ['action' => 'edit', $responsible->id], ['class' => 'btn btn-warning text-white float-right m-r-5']) : '' ?>
			<?= $this->Html->link(__('Lista de responsáveis'), ['action' => 'index'], ['class' => 'btn btn-info text-white float-right m-r-5']) ?>
			<h3> <?= $title ?> </h3>
		</div>
	</div>
	<div class="card">
		<div class="column-responsive column-80">
			<div class="responsible view content">
				<h3><?= h($responsible->name) ?></h3>
				<table>
					<tr>
						<th><?= __('#') ?></th>
						<td><?= $this->Number->format($responsible->id) ?></td>
					</tr>
					<tr>
						<th><?= __('Nome') ?></th>
						<td><?= h($responsible->name) ?></td>
					</tr>
					<tr>
						<th><?= __('Fone') ?></th>
						<td><?= h($responsible->phone) ?></td>
					</tr>
					<tr>
						<th><?= __('RG') ?></th>
						<td><?= h($responsible->rg) ?></td>
					</tr>
					<tr>
						<th><?= __('Função Social') ?></th>
						<td><?= h($responsible->socialfunction) ?></td>
					</tr>
					<tr>
						<th><?= __('E-mail') ?></th>
						<td><?= h($responsible->email) ?></td>
					</tr>
					<tr>
						<th><?= __('Usuário') ?></th>
						<td> <?= $responsible->user ? $this->Html->link(__($responsible->user->name), ['controller' => 'Users', 'action' => 'view', $responsible->iduser], ['target' => '_blank', 'class' => 'link']) : '' ?> </td>
					</tr>
					<tr>
						<th><?= __('Criado em:') ?></th>
						<td><?= date_format($responsible->created, 'd/m/Y - H:i:s') ?></td>
					</tr>
					<tr>
						<th><?= __('Modificado em:') ?></th>
						<td><?= date_format($responsible->modified, 'd/m/Y - H:i:s') ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>