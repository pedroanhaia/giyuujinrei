<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Rating> $ratings
 */
?>
<div class="ratings index content">
    <?= $this->Html->link(__('New Rating'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ratings') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('age_min') ?></th>
                    <th><?= $this->Paginator->sort('age_max') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('role') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ratings as $rating): ?>
                <tr>
                    <td><?= $this->Number->format($rating->id) ?></td>
                    <td><?= h($rating->name) ?></td>
                    <td><?= $rating->age_min === null ? '' : $this->Number->format($rating->age_min) ?></td>
                    <td><?= $rating->age_max === null ? '' : $this->Number->format($rating->age_max) ?></td>
                    <td><?= h($rating->created) ?></td>
                    <td><?= h($rating->modified) ?></td>
                    <td><?= $rating->role === null ? '' : $this->Number->format($rating->role) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $rating->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rating->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rating->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rating->id)]) ?>
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
