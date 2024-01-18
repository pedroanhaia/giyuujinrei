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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sport->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sport->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Sports'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sports form content">
            <?= $this->Form->create($sport) ?>
            <fieldset>
                <legend><?= __('Edit Sport') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('idforeign');
                    echo $this->Form->control('obs1');
                    echo $this->Form->control('role');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
