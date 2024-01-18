<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rating $rating
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Rating'), ['action' => 'edit', $rating->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Rating'), ['action' => 'delete', $rating->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rating->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ratings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Rating'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ratings view content">
            <h3><?= h($rating->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($rating->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($rating->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Age Min') ?></th>
                    <td><?= $rating->age_min === null ? '' : $this->Number->format($rating->age_min) ?></td>
                </tr>
                <tr>
                    <th><?= __('Age Max') ?></th>
                    <td><?= $rating->age_max === null ? '' : $this->Number->format($rating->age_max) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $rating->role === null ? '' : $this->Number->format($rating->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($rating->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($rating->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
