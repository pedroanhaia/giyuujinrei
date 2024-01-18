<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Core> $cores
 */
?>
<div class="cores index content">
    <?= $this->Html->link(__('New Core'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cores') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('city') ?></th>
                    <th><?= $this->Paginator->sort('cont_student') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th><?= $this->Paginator->sort('contact') ?></th>
                    <th><?= $this->Paginator->sort('positioncontact') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('role') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cores as $core): ?>
                <tr>
                    <td><?= $this->Number->format($core->id) ?></td>
                    <td><?= h($core->name) ?></td>
                    <td><?= h($core->city) ?></td>
                    <td><?= $core->cont_student === null ? '' : $this->Number->format($core->cont_student) ?></td>
                    <td><?= $core->type === null ? '' : $this->Number->format($core->type) ?></td>
                    <td><?= h($core->contact) ?></td>
                    <td><?= h($core->positioncontact) ?></td>
                    <td><?= h($core->phone) ?></td>
                    <td><?= h($core->email) ?></td>
                    <td><?= h($core->created) ?></td>
                    <td><?= h($core->modified) ?></td>
                    <td><?= $core->role === null ? '' : $this->Number->format($core->role) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $core->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $core->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $core->id], ['confirm' => __('Are you sure you want to delete # {0}?', $core->id)]) ?>
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
