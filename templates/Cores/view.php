<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Core $core
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Core'), ['action' => 'edit', $core->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Core'), ['action' => 'delete', $core->id], ['confirm' => __('Are you sure you want to delete # {0}?', $core->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Core'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cores view content">
            <h3><?= h($core->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($core->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($core->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contact') ?></th>
                    <td><?= h($core->contact) ?></td>
                </tr>
                <tr>
                    <th><?= __('Positioncontact') ?></th>
                    <td><?= h($core->positioncontact) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($core->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($core->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($core->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cont Student') ?></th>
                    <td><?= $core->cont_student === null ? '' : $this->Number->format($core->cont_student) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= $core->type === null ? '' : $this->Number->format($core->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $core->role === null ? '' : $this->Number->format($core->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($core->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($core->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
