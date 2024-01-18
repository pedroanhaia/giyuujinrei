<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rank $rank
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Rank'), ['action' => 'edit', $rank->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Rank'), ['action' => 'delete', $rank->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rank->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ranks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Rank'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ranks view content">
            <h3><?= h($rank->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($rank->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Color') ?></th>
                    <td><?= h($rank->color) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($rank->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Urlimage') ?></th>
                    <td><?= h($rank->urlimage) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($rank->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idsport') ?></th>
                    <td><?= $rank->idsport === null ? '' : $this->Number->format($rank->idsport) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $rank->role === null ? '' : $this->Number->format($rank->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($rank->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($rank->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Obs1') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($rank->obs1)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Obs2') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($rank->obs2)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
