<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Student'), ['action' => 'edit', $student->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Student'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Students'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Student'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="students view content">
            <h3><?= h($student->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($student->name) ?></td>
                </tr>
                <div class="row">
                    <?= $this->Html->image($student->urlpicture,['style' => 'width: 25%; height: auto;'])?>
                </div>
                <tr>
                    <th><?= __('Urlpicture') ?></th>
                    <td><?= h($student->urlpicture) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($student->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Class') ?></th>
                    <td><?= h($student->class) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($student->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($student->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idcore') ?></th>
                    <td><?= $this->Number->format($student->idcore) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idresponsible') ?></th>
                    <td><?= $this->Number->format($student->idresponsible) ?></td>
                </tr>
                <tr>
                    <th><?= __('Age') ?></th>
                    <td><?= $student->age === null ? '' : $this->Number->format($student->age) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $student->role === null ? '' : $this->Number->format($student->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Iduser') ?></th>
                    <td><?= $student->iduser === null ? '' : $this->Number->format($student->iduser) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idgrank') ?></th>
                    <td><?= $student->idgrank === null ? '' : $this->Number->format($student->idgrank) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($student->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($student->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
