<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Tag'), ['action' => 'edit', $tag->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tag'), ['action' => 'delete', $tag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tag->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tags'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tag'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="tags view content">
            <h3><?= h($tag->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($tag->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($tag->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($tag->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($tag->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($tag->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Products') ?></h4>
                <?php if (!empty($tag->products)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Category Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Slug') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Stock Quantity') ?></th>
                            <th><?= __('Min Stock') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($tag->products as $product) : ?>
                        <tr>
                            <td><?= h($product->id) ?></td>
                            <td><?= h($product->category_id) ?></td>
                            <td><?= h($product->user_id) ?></td>
                            <td><?= h($product->name) ?></td>
                            <td><?= h($product->slug) ?></td>
                            <td><?= h($product->description) ?></td>
                            <td><?= h($product->price) ?></td>
                            <td><?= h($product->stock_quantity) ?></td>
                            <td><?= h($product->min_stock) ?></td>
                            <td><?= h($product->is_active) ?></td>
                            <td><?= h($product->created) ?></td>
                            <td><?= h($product->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $product->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $product->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Products', 'action' => 'delete', $product->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $product->id),
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