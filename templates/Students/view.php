<?php

use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;
?>
<div class="col-md-12 content">
	<div class="row">
		<div class="col-12">
			<?= $role >= C_RoleTudo ? $this->Form->postLink(__('Excluir estudante'), ['action' => 'delete', $student->id], ['confirm' => __('Você confirma a exclusão deste item?', $student->id), 'class' => 'btn btn-danger text-white float-right m-r-5']) : '' ?>
			<?= $role >= C_RoleTudo ? $this->Html->link(__('Alterar estudante'), ['action' => 'edit', $student->id], ['class' => 'btn btn-warning text-white float-right m-r-5']) : '' ?>
			<?= $this->Html->link(__('Lista de estudantes'), ['action' => 'index'], ['class' => 'btn btn-info text-white float-right m-r-5']) ?>
			<h3> <?= $title ?> </h3>
		</div>
	</div>
	<div class="card">
		<div class="column-responsive column-80">
			<div class="students view content">
				<h3><?= h($student->name) ?></h3>
				<table>
					<tr>
						<th><?= __('#') ?></th>
						<td><?= $this->Number->format($student->id) ?></td>
					</tr>
					<tr>
						<th><?= __('Nome') ?></th>
						<td><?= h($student->name) ?></td>
					</tr>
					<div class="row">
						<?= $this->Html->image($student->urlpicture, ['style' => 'max-height: 133px; max-width: 100px;'])?>
					</div>
					<tr>
						<th><?= __('Esporte') ?></th>
						<td><?= $student->sport->name ?></td>
					</tr>
					<tr>
						<th><?= __('Dojô') ?></th>
						<td><?= $student->core->name ?></td>
					</tr>
					<tr>
						<th><?= __('Turma') ?></th>
						<td><?= h($student->class->name) ?></td>
					</tr>
					<tr>
						<th><?= __('Graduação') ?></th>
						<td><?= $student->rank->name ?></td>
					</tr>
					<tr>
						<th><?= __('Responsável') ?></th>
						<td><?= $student->responsible->name ?></td>
					</tr>
					<tr>
						<th><?= __('Idade') ?></th>
						<td>
							<?php
								$today = new DateTime(); 
								$birthday = new DateTime($student->birthday);
								$diff = $today->diff($birthday);
								echo $diff->y . " anos"; 
							?>
						</td>
					</tr>
					<tr>
						<th><?= __('Fone') ?></th>
						<td><?= h($student->phone) ?></td>
					</tr>
					<tr>
						<th><?= __('E-mail') ?></th>
						<td><?= h($student->email) ?></td>
					</tr>
					<tr>
						<th><?= __('Usuário') ?></th>
						<td> <?= $student->user ? $this->Html->link(__($student->user->name), ['controller' => 'Users', 'action' => 'view', $student->iduser], ['target' => '_blank', 'class' => 'link']) : '' ?> </td>
					</tr>
					<tr>
						<th><?= __('Criado em:') ?></th>
						<td><?= date_format($student->created, 'd/m/Y - H:i:s') ?></td>
					</tr>
					<tr>
						<th><?= __('Modificado em:') ?></th>
						<td><?= date_format($student->modified, 'd/m/Y - H:i:s') ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
