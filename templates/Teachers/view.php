<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Teacher $teacher
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Teacher'), ['action' => 'edit', $teacher->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Teacher'), ['action' => 'delete', $teacher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teacher->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Teachers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Teacher'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="teachers view content">
            <h3><?= h($teacher->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($teacher->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($teacher->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rg') ?></th>
                    <td><?= h($teacher->rg) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($teacher->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($teacher->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= $teacher->type === null ? '' : $this->Number->format($teacher->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $teacher->role === null ? '' : $this->Number->format($teacher->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Iduser') ?></th>
                    <td><?= $teacher->iduser === null ? '' : $this->Number->format($teacher->iduser) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($teacher->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($teacher->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
