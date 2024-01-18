<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Index> $indexes
 */
?>
<div class="indexes index content">
    <?= $this->Html->link(__('New Index'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Indexes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('age_min') ?></th>
                    <th><?= $this->Paginator->sort('age_max') ?></th>
                    <th><?= $this->Paginator->sort('role') ?></th>
                    <th><?= $this->Paginator->sort('idrating') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($indexes as $index): ?>
                <tr>
                    <td><?= $this->Number->format($index->id) ?></td>
                    <td><?= h($index->name) ?></td>
                    <td><?= $index->age_min === null ? '' : $this->Number->format($index->age_min) ?></td>
                    <td><?= $index->age_max === null ? '' : $this->Number->format($index->age_max) ?></td>
                    <td><?= $index->role === null ? '' : $this->Number->format($index->role) ?></td>
                    <td><?= $index->idrating === null ? '' : $this->Number->format($index->idrating) ?></td>
                    <td><?= h($index->created) ?></td>
                    <td><?= h($index->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $index->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $index->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $index->id], ['confirm' => __('Are you sure you want to delete # {0}?', $index->id)]) ?>
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
