<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Responsible $responsible
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Responsible'), ['action' => 'edit', $responsible->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Responsible'), ['action' => 'delete', $responsible->id], ['confirm' => __('Are you sure you want to delete # {0}?', $responsible->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Responsible'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Responsible'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="responsible view content">
            <h3><?= h($responsible->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($responsible->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($responsible->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rg') ?></th>
                    <td><?= h($responsible->rg) ?></td>
                </tr>
                <tr>
                    <th><?= __('Socialfunction') ?></th>
                    <td><?= h($responsible->socialfunction) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($responsible->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($responsible->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $responsible->role === null ? '' : $this->Number->format($responsible->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Iduser') ?></th>
                    <td><?= $responsible->iduser === null ? '' : $this->Number->format($responsible->iduser) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($responsible->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($responsible->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
