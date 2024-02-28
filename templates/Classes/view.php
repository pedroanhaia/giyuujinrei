
<div class="col-md-12 content">
	<div class="row">
		<div class="col-12">
			<?= $role >= C_RoleTudo ? $this->Form->postLink(__('Excluir turma'), ['action' => 'delete', $class->id], ['confirm' => __('Você confirma a exclusão deste item?', $class->id), 'class' => 'btn btn-danger text-white float-right m-r-5']) : '' ?>
			<?= $role >= C_RoleTudo ? $this->Html->link(__('Alterar turma'), ['action' => 'edit', $class->id], ['class' => 'btn btn-warning text-white float-right m-r-5']) : '' ?>
			<?= $this->Html->link(__('Lista de turmas'), ['action' => 'index'], ['class' => 'btn btn-info text-white float-right m-r-5'])?>
			<h3> <?= $title ?> </h3>
		</div>
	</div>
	<div class="card">
		<div class="column-responsive column-80">
			<div class="classes view content">
				<h3><?= h($class->name) ?></h3>
				<table>
					<tr>
						<th><?= __('Nome') ?></th>
						<td><?= h($class->name) ?></td>
					</tr>
					<tr>
						<th><?= __('Dojô') ?></th>
						<td><?= h($class->core->name) ?></td>
					</tr>
					<tr>
						<th><?= __('Esporte') ?></th>
						<td><?= h($class->sport->name) ?></td>
					</tr>
					<tr>
						<th><?= __('Professores') ?></th>
						<td> <?php foreach($class->teachers as $teacher) echo $teacher->name . ' <br> ' ?> </td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>