<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Index $index
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Index'), ['action' => 'edit', $index->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Index'), ['action' => 'delete', $index->id], ['confirm' => __('Are you sure you want to delete # {0}?', $index->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Indexes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Index'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="indexes view content">
            <h3><?= h($index->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($index->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($index->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Age Min') ?></th>
                    <td><?= $index->age_min === null ? '' : $this->Number->format($index->age_min) ?></td>
                </tr>
                <tr>
                    <th><?= __('Age Max') ?></th>
                    <td><?= $index->age_max === null ? '' : $this->Number->format($index->age_max) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $index->role === null ? '' : $this->Number->format($index->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idrating') ?></th>
                    <td><?= $index->idrating === null ? '' : $this->Number->format($index->idrating) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($index->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($index->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
