<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="products view content">
            <h3><?= h($product->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td><?= $product->hasValue('category') ? $this->Html->link($product->category->name, ['controller' => 'Categories', 'action' => 'view', $product->category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $product->hasValue('user') ? $this->Html->link($product->user->name, ['controller' => 'Users', 'action' => 'view', $product->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($product->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($product->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($product->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($product->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stock Quantity') ?></th>
                    <td><?= $this->Number->format($product->stock_quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Min Stock') ?></th>
                    <td><?= $this->Number->format($product->min_stock) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($product->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($product->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $product->is_active ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($product->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Tags') ?></h4>
                <?php if (!empty($product->tags)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Slug') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($product->tags as $tag) : ?>
                        <tr>
                            <td><?= h($tag->id) ?></td>
                            <td><?= h($tag->name) ?></td>
                            <td><?= h($tag->slug) ?></td>
                            <td><?= h($tag->created) ?></td>
                            <td><?= h($tag->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Tags', 'action' => 'view', $tag->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Tags', 'action' => 'edit', $tag->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Tags', 'action' => 'delete', $tag->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $tag->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Stock Logs') ?></h4>
                <?php if (!empty($product->stock_logs)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Type') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Stock Before') ?></th>
                            <th><?= __('Stock After') ?></th>
                            <th><?= __('Note') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($product->stock_logs as $stockLog) : ?>
                        <tr>
                            <td><?= h($stockLog->id) ?></td>
                            <td><?= h($stockLog->user_id) ?></td>
                            <td><?= h($stockLog->type) ?></td>
                            <td><?= h($stockLog->quantity) ?></td>
                            <td><?= h($stockLog->stock_before) ?></td>
                            <td><?= h($stockLog->stock_after) ?></td>
                            <td><?= h($stockLog->note) ?></td>
                            <td><?= h($stockLog->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'StockLogs', 'action' => 'view', $stockLog->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'StockLogs', 'action' => 'edit', $stockLog->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'StockLogs', 'action' => 'delete', $stockLog->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $stockLog->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>