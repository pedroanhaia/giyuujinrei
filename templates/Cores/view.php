<div class="col-md-12 content">
	<div class="row">
		<div class="col-12">
			<?= $role >= C_RoleTudo ? $this->Form->postLink(__('Excluir dojô'), ['action' => 'delete', $core->id], ['confirm' => __('Você confirma a exclusão deste item?', $core->id), 'class' => 'btn btn-danger text-white float-right m-r-5']) : '' ?>
			<?= $role >= C_RoleTudo ? $this->Html->link(__('Alterar dojô'), ['action' => 'edit', $core->id], ['class' => 'btn btn-warning text-white float-right m-r-5']) : '' ?>
			<?= $this->Html->link(__('Lista de dojôs'), ['action' => 'index'], ['class' => 'btn btn-info text-white float-right m-r-5']) ?>
			<h3> <?= $title ?> </h3>
		</div>
	</div>
	<div class="card">
		<div class="column-responsive column-80">
			<div class="cores view content">
				<h3><?= h($core->name) ?></h3>
				<table>
					<tr>
						<th><?= __('#') ?></th>
						<td><?= $this->Number->format($core->id) ?></td>
					</tr>
					<tr>
						<th><?= __('Nome') ?></th>
						<td><?= h($core->name) ?></td>
					</tr>
					<tr>
						<th><?= __('Cidade') ?></th>
						<td><?= h($core->city) ?></td>
					</tr>
					<tr>
						<th><?= __('Contato') ?></th>
						<td><?= h($core->contact) ?></td>
					</tr>
					<tr>
						<th><?= __('Cargo') ?></th>
						<td><?= h($core->positioncontact) ?></td>
					</tr>
					<tr>
						<th><?= __('Fone') ?></th>
						<td><?= h($core->phone) ?></td>
					</tr>
					<tr>
						<th><?= __('E-mail') ?></th>
						<td><?= h($core->email) ?></td>
					</tr>
					<tr>
						<th><?= __('Quantidade de estudantes') ?></th>
						<td><?= $core->cont_student === null ? '' : $this->Number->format($core->cont_student) ?></td>
					</tr>
					<tr>
						<th><?= __('Tipo') ?></th>
						<td><?= $core->type === null ? '' : CoresTypes($core->type) ?></td>
					</tr>
					<tr>
						<th><?= __('Criado em:') ?></th>
						<td><?= date_format($core->created, 'd/m/Y - H:i:s') ?></td>
					</tr>
					<tr>
						<th><?= __('Modificado em:') ?></th>
						<td><?= date_format($core->modified, 'd/m/Y - H:i:s') ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
