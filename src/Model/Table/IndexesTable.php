<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Indexes Model
 *
 * @method \App\Model\Entity\Index newEmptyEntity()
 * @method \App\Model\Entity\Index newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Index[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Index get($primaryKey, $options = [])
 * @method \App\Model\Entity\Index findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Index patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Index[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Index|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Index saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Index[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Index[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Index[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Index[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class IndexesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('indexes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('name')
            ->maxLength('name', 200)
            ->allowEmptyString('name');

        $validator
            ->integer('age_min')
            ->allowEmptyString('age_min');

        $validator
            ->integer('age_max')
            ->allowEmptyString('age_max');

        $validator
            ->integer('role')
            ->allowEmptyString('role');

        $validator
            ->integer('idrating')
            ->allowEmptyString('idrating');

        return $validator;
    }
}
