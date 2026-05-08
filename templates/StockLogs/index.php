<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\StockLog> $stockLogs
 */
?>
<div class="stockLogs index content">
    <?= $this->Html->link(__('New Stock Log'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Stock Logs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('stock_before') ?></th>
                    <th><?= $this->Paginator->sort('stock_after') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stockLogs as $stockLog): ?>
                <tr>
                    <td><?= $this->Number->format($stockLog->id) ?></td>
                    <td><?= $stockLog->hasValue('product') ? $this->Html->link($stockLog->product->name, ['controller' => 'Products', 'action' => 'view', $stockLog->product->id]) : '' ?></td>
                    <td><?= $stockLog->hasValue('user') ? $this->Html->link($stockLog->user->name, ['controller' => 'Users', 'action' => 'view', $stockLog->user->id]) : '' ?></td>
                    <td><?= h($stockLog->type) ?></td>
                    <td><?= $this->Number->format($stockLog->quantity) ?></td>
                    <td><?= $this->Number->format($stockLog->stock_before) ?></td>
                    <td><?= $this->Number->format($stockLog->stock_after) ?></td>
                    <td><?= h($stockLog->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $stockLog->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $stockLog->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $stockLog->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $stockLog->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>