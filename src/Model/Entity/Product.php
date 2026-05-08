<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property int $category_id
 * @property int $user_id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property string $price
 * @property int $stock_quantity
 * @property int $min_stock
 * @property bool $is_active
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\StockLog[] $stock_logs
 * @property \App\Model\Entity\Tag[] $tags
 */
class Product extends Entity
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
        'category_id' => true,
        'user_id' => true,
        'name' => true,
        'slug' => true,
        'description' => true,
        'price' => true,
        'stock_quantity' => true,
        'min_stock' => true,
        'is_active' => true,
        'created' => true,
        'modified' => true,
        'category' => true,
        'user' => true,
        'stock_logs' => true,
        'tags' => true,
    ];
}
