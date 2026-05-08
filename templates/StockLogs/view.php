<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StockLog $stockLog
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Stock Log'), ['action' => 'edit', $stockLog->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Stock Log'), ['action' => 'delete', $stockLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stockLog->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Stock Logs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Stock Log'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="stockLogs view content">
            <h3><?= h($stockLog->type) ?></h3>
            <table>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $stockLog->hasValue('product') ? $this->Html->link($stockLog->product->name, ['controller' => 'Products', 'action' => 'view', $stockLog->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $stockLog->hasValue('user') ? $this->Html->link($stockLog->user->name, ['controller' => 'Users', 'action' => 'view', $stockLog->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($stockLog->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($stockLog->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($stockLog->quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stock Before') ?></th>
                    <td><?= $this->Number->format($stockLog->stock_before) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stock After') ?></th>
                    <td><?= $this->Number->format($stockLog->stock_after) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($stockLog->created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Note') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($stockLog->note)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>