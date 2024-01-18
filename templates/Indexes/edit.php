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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $index->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $index->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Indexes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="indexes form content">
            <?= $this->Form->create($index) ?>
            <fieldset>
                <legend><?= __('Edit Index') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('age_min');
                    echo $this->Form->control('age_max');
                    echo $this->Form->control('role');
                    echo $this->Form->control('idrating');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
