<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Student> $students
 */
?>
<div class="students index content">
    <?= $this->Html->link(__('New Student'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Students') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('urlpicture') ?></th>
                    <th><?= $this->Paginator->sort('idcore') ?></th>
                    <th><?= $this->Paginator->sort('idresponsible') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('age') ?></th>
                    <th><?= $this->Paginator->sort('class') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('role') ?></th>
                    <th><?= $this->Paginator->sort('iduser') ?></th>
                    <th><?= $this->Paginator->sort('idgrank') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= $this->Number->format($student->id) ?></td>
                    <td><?= h($student->name) ?></td>
                    <td><?= h($student->urlpicture) ?></td>
                    <td><?= $this->Number->format($student->idcore) ?></td>
                    <td><?= $this->Number->format($student->idresponsible) ?></td>
                    <td><?= h($student->phone) ?></td>
                    <td><?= $student->age === null ? '' : $this->Number->format($student->age) ?></td>
                    <td><?= h($student->class) ?></td>
                    <td><?= h($student->email) ?></td>
                    <td><?= h($student->created) ?></td>
                    <td><?= h($student->modified) ?></td>
                    <td><?= $student->role === null ? '' : $this->Number->format($student->role) ?></td>
                    <td><?= $student->iduser === null ? '' : $this->Number->format($student->iduser) ?></td>
                    <td><?= $student->idgrank === null ? '' : $this->Number->format($student->idgrank) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $student->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $student->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
