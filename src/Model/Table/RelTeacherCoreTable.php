<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RelTeacherCore Model
 *
 * @method \App\Model\Entity\RelTeacherCore newEmptyEntity()
 * @method \App\Model\Entity\RelTeacherCore newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\RelTeacherCore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RelTeacherCore get($primaryKey, $options = [])
 * @method \App\Model\Entity\RelTeacherCore findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\RelTeacherCore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RelTeacherCore[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RelTeacherCore|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RelTeacherCore saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RelTeacherCore[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RelTeacherCore[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\RelTeacherCore[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RelTeacherCore[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RelTeacherCoreTable extends Table
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

        $this->setTable('rel_teacher_core');
        $this->setDisplayField('id');
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
            ->integer('idcore')
            ->requirePresence('idcore', 'create')
            ->notEmptyString('idcore');

        $validator
            ->integer('idteacher')
            ->requirePresence('idteacher', 'create')
            ->notEmptyString('idteacher');

        $validator
            ->integer('role')
            ->allowEmptyString('role');

        return $validator;
    }
}
