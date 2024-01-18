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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $responsible->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $responsible->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Responsible'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="responsible form content">
            <?= $this->Form->create($responsible) ?>
            <fieldset>
                <legend><?= __('Edit Responsible') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('rg');
                    echo $this->Form->control('socialfunction');
                    echo $this->Form->control('email');
                    echo $this->Form->control('role');
                    echo $this->Form->control('iduser');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
