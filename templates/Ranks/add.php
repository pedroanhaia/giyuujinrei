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
            <?= $this->Html->link(__('List Ranks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ranks form content">
            <?= $this->Form->create($rank) ?>
            <fieldset>
                <legend><?= __('Add Rank') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('color');
                    echo $this->Form->control('description');
                    echo $this->Form->control('idsport');
                    echo $this->Form->control('obs1');
                    echo $this->Form->control('obs2');
                    echo $this->Form->control('role');
                    echo $this->Form->control('urlimage');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
