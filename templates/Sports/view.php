<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sport $sport
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sport'), ['action' => 'edit', $sport->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sport'), ['action' => 'delete', $sport->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sport->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sports'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sport'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sports view content">
            <h3><?= h($sport->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($sport->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idforeign') ?></th>
                    <td><?= h($sport->idforeign) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sport->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $sport->role === null ? '' : $this->Number->format($sport->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($sport->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($sport->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Obs1') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($sport->obs1)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
