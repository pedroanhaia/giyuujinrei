<div class="col-md-12 content">
	<div class="row">
		<div class="col-12">
			<?= $this->Form->postLink(__('Excluir avaliação'), ['action' => 'delete', $assessment->id], ['confirm' => __('Você confirma a exclusão deste item?', $assessment->id), 'class' => 'btn btn-danger text-white float-right m-r-5']) ?>
			<?= $this->Html->link(__('Alterar avaliação'), ['action' => 'edit', $assessment->id], ['class' => 'btn btn-warning text-white float-right m-r-5']) ?>
			<?= $this->Html->link(__('Lista de avaliações'), ['action' => 'index'], ['class' => 'btn btn-info text-white float-right m-r-5']) ?>
			<h3> <?= $title ?> </h3>
		</div>
	</div>
	<div class="card">
		<div class="column-responsive column-80">
			<div class="assessment view content">
				<table>
					<tr>
						<th><?= __('#') ?></th>
						<td><?= $this->Number->format($assessment->id) ?></td>
					</tr>
					<tr>
						<th><?= __('Índice') ?></th>
						<td><?= $assessment->index->name ?></td>
					</tr>
					<tr>
						<th><?= __('Professor') ?></th>
						<td><?= $assessment->teacher->name ?></td>
					</tr>
					<tr>
						<th><?= __('Estudante') ?></th>
						<td><?= $assessment->student->name ?></td>
					</tr>
					<tr>
						<th><?= __('Valor') ?></th>
						<td><?= $assessment->student->name ?></td>
					</tr>
					<tr>
						<th><?= __('Agendamento') ?></th>
						<td><?= $assessment->schedule->name ?></td>
					</tr>
					<tr>
						<th><?= __('Criado em:') ?></th>
						<td><?= date_format($assessment->created, 'd/m/Y - H:i:s') ?></td>
					</tr>
					<tr>
						<th><?= __('Modificado em:') ?></th>
						<td><?= date_format($assessment->modified, 'd/m/Y - H:i:s') ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>