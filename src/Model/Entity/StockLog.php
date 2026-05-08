<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StockLog Entity
 *
 * @property int $id
 * @property int $product_id
 * @property int $user_id
 * @property string $type
 * @property int $quantity
 * @property int $stock_before
 * @property int $stock_after
 * @property string|null $note
 * @property \Cake\I18n\DateTime $created
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\User $user
 */
class StockLog extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'product_id' => true,
        'user_id' => true,
        'type' => true,
        'quantity' => true,
        'stock_before' => true,
        'stock_after' => true,
        'note' => true,
        'created' => true,
        'product' => true,
        'user' => true,
    ];
}
