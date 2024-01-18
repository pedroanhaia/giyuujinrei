<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Responsible> $responsible
 */
?>
<div class="responsible index content">
    <?= $this->Html->link(__('New Responsible'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Responsible') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('rg') ?></th>
                    <th><?= $this->Paginator->sort('socialfunction') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('role') ?></th>
                    <th><?= $this->Paginator->sort('iduser') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($responsible as $responsible): ?>
                <tr>
                    <td><?= $this->Number->format($responsible->id) ?></td>
                    <td><?= h($responsible->name) ?></td>
                    <td><?= h($responsible->phone) ?></td>
                    <td><?= h($responsible->rg) ?></td>
                    <td><?= h($responsible->socialfunction) ?></td>
                    <td><?= h($responsible->email) ?></td>
                    <td><?= h($responsible->created) ?></td>
                    <td><?= h($responsible->modified) ?></td>
                    <td><?= $responsible->role === null ? '' : $this->Number->format($responsible->role) ?></td>
                    <td><?= $responsible->iduser === null ? '' : $this->Number->format($responsible->iduser) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $responsible->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $responsible->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $responsible->id], ['confirm' => __('Are you sure you want to delete # {0}?', $responsible->id)]) ?>
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
