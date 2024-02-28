<div class="col-md-12 content">
	<div class="row">
		<div class="col-12">
			<?= $role >= C_RoleTudo ? $this->Form->postLink(__('Excluir graduação'), ['action' => 'delete', $rank->id], ['confirm' => __('Você confirma a exclusão deste item?', $rank->id), 'class' => 'btn btn-danger text-white float-right m-r-5']) : '' ?>
			<?= $role >= C_RoleTudo ? $this->Html->link(__('Alterar graduação'), ['action' => 'edit', $rank->id], ['class' => 'btn btn-warning text-white float-right m-r-5']) : '' ?>
			<?= $this->Html->link(__('Lista de graduações'), ['action' => 'index'], ['class' => 'btn btn-info text-white float-right m-r-5']) ?>
			<h3> <?= $title ?> </h3>
		</div>
	</div>
	<div class="card">
		<div class="column-responsive column-80">
			<div class="ranks view content">
				<h3><?= h($rank->name) ?></h3>
				<table>
					<tr>
						<th><?= __('#') ?></th>
						<td><?= $this->Number->format($rank->id) ?></td>
					</tr>
					<tr>
					<tr>
						<th><?= __('Nome') ?></th>
						<td><?= h($rank->name) ?></td>
					</tr>
					<tr>
						<th><?= __('Cor') ?></th>
						<td><?= h($rank->color) ?></td>
					</tr>
					<tr>
						<th><?= __('Descrição') ?></th>
						<td><?= h($rank->description) ?></td>
					</tr>
					<tr>
						<th><?= __('Imagem') ?></th>
						<td><?= h($rank->urlimage) ?></td>
					</tr>
						<th><?= __('Esporte') ?></th>
						<td><?= $rank->sport->name ?></td>
					</tr>
					<tr>
						<th><?= __('Criado em:') ?></th>
						<td><?= date_format($rank->created, 'd/m/Y - H:i:s') ?></td>
					</tr>
					<tr>
						<th><?= __('Modificado em:') ?></th>
						<td><?= date_format($rank->modified, 'd/m/Y - H:i:s') ?></td>
					</tr>
				</table>
				<div class="text">
					<strong><?= __('Obs1') ?></strong>
					<blockquote>
						<?= $this->Text->autoParagraph(h($rank->obs1)); ?>
					</blockquote>
				</div>
				<div class="text">
					<strong><?= __('Obs2') ?></strong>
					<blockquote>
						<?= $this->Text->autoParagraph(h($rank->obs2)); ?>
					</blockquote>
				</div>
			</div>
		</div>
	</div>
</div>
