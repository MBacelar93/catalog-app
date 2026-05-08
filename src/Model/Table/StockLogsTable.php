<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StockLogs Model
 *
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\StockLog newEmptyEntity()
 * @method \App\Model\Entity\StockLog newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\StockLog> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StockLog get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\StockLog findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\StockLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\StockLog> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\StockLog|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\StockLog saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\StockLog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\StockLog>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\StockLog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\StockLog> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\StockLog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\StockLog>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\StockLog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\StockLog> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StockLogsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('stock_logs');
        $this->setDisplayField('type');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('product_id')
            ->notEmptyString('product_id');

        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->scalar('type')
            ->maxLength('type', 20)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        $validator
            ->integer('stock_before')
            ->requirePresence('stock_before', 'create')
            ->notEmptyString('stock_before');

        $validator
            ->integer('stock_after')
            ->requirePresence('stock_after', 'create')
            ->notEmptyString('stock_after');

        $validator
            ->scalar('note')
            ->allowEmptyString('note');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['product_id'], 'Products'), ['errorField' => 'product_id']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
