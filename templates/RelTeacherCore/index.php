<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\RelTeacherCore> $relTeacherCore
 */
?>
<div class="relTeacherCore index content">
    <?= $this->Html->link(__('New Rel Teacher Core'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Rel Teacher Core') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('idcore') ?></th>
                    <th><?= $this->Paginator->sort('idteacher') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('role') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($relTeacherCore as $relTeacherCore): ?>
                <tr>
                    <td><?= $this->Number->format($relTeacherCore->id) ?></td>
                    <td><?= $this->Number->format($relTeacherCore->idcore) ?></td>
                    <td><?= $this->Number->format($relTeacherCore->idteacher) ?></td>
                    <td><?= h($relTeacherCore->created) ?></td>
                    <td><?= h($relTeacherCore->modified) ?></td>
                    <td><?= $relTeacherCore->role === null ? '' : $this->Number->format($relTeacherCore->role) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $relTeacherCore->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $relTeacherCore->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $relTeacherCore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $relTeacherCore->id)]) ?>
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
