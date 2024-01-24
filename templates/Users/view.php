<div class="col-md-12 content">
	<div class="row">
		<div class="col-12">
			<?= $this->Form->postLink(__('Excluir usuário'), ['action' => 'delete', $user->id], ['confirm' => __('Você confirma a exclusão deste item?', $user->id), 'class' => 'btn btn-danger text-white float-right m-r-5']) ?>
			<?= $this->Html->link(__('Alterar usuário'), ['action' => 'edit', $user->id], ['class' => 'btn btn-warning text-white float-right m-r-5']) ?>
			<?= $this->Html->link(__('Lista de usuários'), ['action' => 'index'], ['class' => 'btn btn-info text-white float-right m-r-5']) ?>
			<h3> <?= $title ?> </h3>
		</div>
	</div>
	<div class="card">
		<div class="column-responsive column-80">
			<div class="users view content">
				<h3><?= h($user->name) ?></h3>
				<table>
					<tr>
						<th><?= __('#') ?></th>
						<td><?= $this->Number->format($user->id) ?></td>
					</tr>
					<tr>
						<th><?= __('E-mail') ?></th>
						<td><?= h($user->email) ?></td>
					</tr>
					<tr>
						<th><?= __('Nome') ?></th>
						<td><?= h($user->name) ?></td>
					</tr>
					<tr>
						<th><?= __('Role') ?></th>
						<td><?= UsersRoles($user->role) ?></td>
					</tr>
					<tr>
						<th><?= __('Dojô') ?></th>
						<td><?= $user->core->name ?></td>
					</tr>
					<tr>
						<th><?= __('Criado em:') ?></th>
						<td><?= date_format($user->created, 'd/m/Y - H:i:s') ?></td>
					</tr>
					<tr>
						<th><?= __('Modificado em:') ?></th>
						<td><?= date_format($user->modified, 'd/m/Y - H:i:s') ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
