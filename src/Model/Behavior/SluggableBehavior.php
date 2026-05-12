<?php
declare(strict_types=1);

namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\Event\EventInterface;
use Cake\Datasource\EntityInterface;
use Cake\Utility\Text;

class SluggableBehavior extends Behavior
{
    protected array $_defaultConfig = [
        'field'     => 'name',
        'slugField' => 'slug',
    ];

    public function beforeSave(EventInterface $event, EntityInterface $entity): void
    {
        $field     = $this->getConfig('field');
        $slugField = $this->getConfig('slugField');

        if ($entity->isDirty($field) || empty($entity->{$slugField})) {
            $base  = Text::slug(mb_strtolower($entity->{$field}));
            $entity->{$slugField} = $this->_uniqueSlug($base, $entity->id);
        }
    }

private function _uniqueSlug(string $base, ?int $excludeId): string
{
    $table = $this->_table;
    $slug  = $base;
    $i     = 1;

    while (true) {
        $conditions = ['slug' => $slug];
        if ($excludeId !== null) {
            $conditions['id !='] = $excludeId;
        }
        if (!$table->exists($conditions)) {
            break;
        }
        $slug = "{$base}-{$i}";
        $i++;
    }

    return $slug;
}
}
