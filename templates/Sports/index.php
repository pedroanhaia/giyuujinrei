<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Sport> $sports
 */
?>
<div class="sports index content">
    <?= $this->Html->link(__('New Sport'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Sports') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('idforeign') ?></th>
                    <th><?= $this->Paginator->sort('role') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sports as $sport): ?>
                <tr>
                    <td><?= $this->Number->format($sport->id) ?></td>
                    <td><?= h($sport->name) ?></td>
                    <td><?= h($sport->idforeign) ?></td>
                    <td><?= $sport->role === null ? '' : $this->Number->format($sport->role) ?></td>
                    <td><?= h($sport->created) ?></td>
                    <td><?= h($sport->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $sport->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sport->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sport->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sport->id)]) ?>
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
