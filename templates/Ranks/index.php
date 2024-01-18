<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Rank> $ranks
 */
?>
<div class="ranks index content">
    <?= $this->Html->link(__('New Rank'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ranks') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('color') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('idsport') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('role') ?></th>
                    <th><?= $this->Paginator->sort('urlimage') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ranks as $rank): ?>
                <tr>
                    <td><?= $this->Number->format($rank->id) ?></td>
                    <td><?= h($rank->name) ?></td>
                    <td><?= h($rank->color) ?></td>
                    <td><?= h($rank->description) ?></td>
                    <td><?= $rank->idsport === null ? '' : $this->Number->format($rank->idsport) ?></td>
                    <td><?= h($rank->created) ?></td>
                    <td><?= h($rank->modified) ?></td>
                    <td><?= $rank->role === null ? '' : $this->Number->format($rank->role) ?></td>
                    <td><?= h($rank->urlimage) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $rank->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rank->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rank->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rank->id)]) ?>
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
