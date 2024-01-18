<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ranks Model
 *
 * @method \App\Model\Entity\Rank newEmptyEntity()
 * @method \App\Model\Entity\Rank newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Rank[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rank get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rank findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Rank patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rank[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rank|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rank saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rank[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rank[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rank[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rank[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RanksTable extends Table
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

        $this->setTable('ranks');
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
            ->maxLength('name', 255)
            ->allowEmptyString('name');

        $validator
            ->scalar('color')
            ->maxLength('color', 255)
            ->allowEmptyString('color');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmptyString('description');

        $validator
            ->integer('idsport')
            ->allowEmptyString('idsport');

        $validator
            ->scalar('obs1')
            ->allowEmptyString('obs1');

        $validator
            ->scalar('obs2')
            ->allowEmptyString('obs2');

        $validator
            ->integer('role')
            ->allowEmptyString('role');

        $validator
            ->scalar('urlimage')
            ->maxLength('urlimage', 255)
            ->allowEmptyFile('urlimage');

        return $validator;
    }
}
