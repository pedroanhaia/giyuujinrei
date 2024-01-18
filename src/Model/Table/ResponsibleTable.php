<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Responsible Model
 *
 * @method \App\Model\Entity\Responsible newEmptyEntity()
 * @method \App\Model\Entity\Responsible newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Responsible[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Responsible get($primaryKey, $options = [])
 * @method \App\Model\Entity\Responsible findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Responsible patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Responsible[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Responsible|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Responsible saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Responsible[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Responsible[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Responsible[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Responsible[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ResponsibleTable extends Table
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

        $this->setTable('responsible');
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
            ->scalar('phone')
            ->maxLength('phone', 50)
            ->allowEmptyString('phone');

        $validator
            ->scalar('rg')
            ->maxLength('rg', 40)
            ->allowEmptyString('rg');

        $validator
            ->scalar('socialfunction')
            ->maxLength('socialfunction', 255)
            ->allowEmptyString('socialfunction');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->integer('role')
            ->allowEmptyString('role');

        $validator
            ->integer('iduser')
            ->allowEmptyString('iduser');

        return $validator;
    }
}
