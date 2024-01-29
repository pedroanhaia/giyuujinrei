<div class="col-md-12 content">
	<div class="row">
		<div class="col-12">
			<?= $this->Form->postLink(__('Excluir agendamento'), ['action' => 'delete', $schedule->id], ['confirm' => __('Você confirma a exclusão deste item?', $schedule->id), 'class' => 'btn btn-danger text-white float-right m-r-5']) ?>
			<?= $this->Html->link(__('Alterar agendamento'), ['action' => 'edit', $schedule->id], ['class' => 'btn btn-warning text-white float-right m-r-5']) ?>
			<?= $this->Html->link(__('Lista de agendamentos'), ['action' => 'index'], ['class' => 'btn btn-info text-white float-right m-r-5']) ?>
			<h3> <?= $title ?> </h3>
		</div>
	</div>
	<div class="card">
		<div class="column-responsive column-80">
			<div class="schedules view content">
				<h3><?= h($schedule->name) ?></h3>
				<table>
					<tr>
						<th><?= __('#') ?></th>
						<td><?= $this->Number->format($schedule->id) ?></td>
					</tr>
					<tr>
						<th><?= __('Nome') ?></th>
						<td><?= h($schedule->name) ?></td>
					</tr>
					<tr>
						<th><?= __('Dojô') ?></th>
						<td><?= $schedule->core->name ?></td>
					<tr>
					<tr>
						<th><?= __('Turma') ?></th>
						<td><?= $schedule->class->name ?></td>
					<tr>
						<th><?= __('Data') ?></th>
						<td><?= date_format($schedule->date, 'd/m/Y - H:i:s') ?></td>
					</tr>
					<tr>
						<th><?= __('Criado em:') ?></th>
						<td><?= date_format($schedule->created, 'd/m/Y - H:i:s') ?></td>
					</tr>
					<tr>
						<th><?= __('Modificado em:') ?></th>
						<td><?= date_format($schedule->modified, 'd/m/Y - H:i:s') ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>