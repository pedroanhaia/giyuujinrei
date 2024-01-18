<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assessment $assessment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Assessment'), ['action' => 'edit', $assessment->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Assessment'), ['action' => 'delete', $assessment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assessment->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Assessment'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Assessment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="assessment view content">
            <h3><?= h($assessment->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($assessment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idindex') ?></th>
                    <td><?= $this->Number->format($assessment->idindex) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idteacher') ?></th>
                    <td><?= $this->Number->format($assessment->idteacher) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idstudent') ?></th>
                    <td><?= $this->Number->format($assessment->idstudent) ?></td>
                </tr>
                <tr>
                    <th><?= __('Value') ?></th>
                    <td><?= $this->Number->format($assessment->value) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idschedule') ?></th>
                    <td><?= $assessment->idschedule === null ? '' : $this->Number->format($assessment->idschedule) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $assessment->role === null ? '' : $this->Number->format($assessment->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($assessment->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($assessment->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
