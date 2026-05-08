<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StockLog $stockLog
 * @var string[]|\Cake\Collection\CollectionInterface $products
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $stockLog->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $stockLog->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Stock Logs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="stockLogs form content">
            <?= $this->Form->create($stockLog) ?>
            <fieldset>
                <legend><?= __('Edit Stock Log') ?></legend>
                <?php
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('type');
                    echo $this->Form->control('quantity');
                    echo $this->Form->control('stock_before');
                    echo $this->Form->control('stock_after');
                    echo $this->Form->control('note');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
