<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RelTeacherCore $relTeacherCore
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Rel Teacher Core'), ['action' => 'edit', $relTeacherCore->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Rel Teacher Core'), ['action' => 'delete', $relTeacherCore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $relTeacherCore->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Rel Teacher Core'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Rel Teacher Core'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="relTeacherCore view content">
            <h3><?= h($relTeacherCore->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($relTeacherCore->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idcore') ?></th>
                    <td><?= $this->Number->format($relTeacherCore->idcore) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idteacher') ?></th>
                    <td><?= $this->Number->format($relTeacherCore->idteacher) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $relTeacherCore->role === null ? '' : $this->Number->format($relTeacherCore->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($relTeacherCore->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($relTeacherCore->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
