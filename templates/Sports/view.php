<div class="col-md-12 content">
	<div class="row">
		<div class="col-12">
			<?= $this->Form->postLink(__('Excluir esporte'), ['action' => 'delete', $sport->id], ['confirm' => __('Você confirma a exclusão deste item?', $sport->id), 'class' => 'btn btn-danger text-white float-right m-r-5']) ?>
			<?= $this->Html->link(__('Alterar esporte'), ['action' => 'edit', $sport->id], ['class' => 'btn btn-warning text-white float-right m-r-5']) ?>
			<?= $this->Html->link(__('Lista de esportes'), ['action' => 'index'], ['class' => 'btn btn-info text-white float-right m-r-5']) ?>
			<h3> <?= $title ?> </h3>
		</div>
	</div>
	<div class="card">
		<div class="column-responsive column-80">
			<div class="sports view content">
				<h3><?= h($sport->name) ?></h3>
				<table>
					<tr>
						<th><?= __('#') ?></th>
						<td><?= $this->Number->format($sport->id) ?></td>
					</tr>
					<tr>
						<th><?= __('Nome') ?></th>
						<td><?= h($sport->name) ?></td>
					</tr>
					<tr>
						<th><?= __('Idforeign') ?></th>
						<td><?= h($sport->idforeign) ?></td>
					</tr>
					<tr>
						<th><?= __('Criado em:') ?></th>
						<td><?= date_format($sport->created, 'd/m/Y - H:i:s') ?></td>
					</tr>
					<tr>
						<th><?= __('Modificado em:') ?></th>
						<td><?= date_format($sport->modified, 'd/m/Y - H:i:s') ?></td>
					</tr>
				</table>
				<div class="text">
					<strong><?= __('Obs1') ?></strong>
					<blockquote>
						<?= $this->Text->autoParagraph(h($sport->obs1)); ?>
					</blockquote>
				</div>
			</div>
		</div>
	</div>
</div>