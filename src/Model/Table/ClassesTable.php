<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ClassesTable extends Table {
	public function initialize(array $config): void {
		parent::initialize($config);

		$this->setTable('classes');
		$this->setDisplayField('name');
		$this->setPrimaryKey('id');

		$this->hasMany('Students', ['foreignKey' => 'id']);
		$this->belongsTo('Cores', ['foreignKey' => 'idcore']);
		$this->belongsTo('Sports', ['foreignKey' => 'idsport']);

		$this->hasMany('Classesteachers');
        $this->belongsToMany('Teachers', [
            'through' => 'Classesteachers',
        ]);
	}

	public function validationDefault(Validator $validator): Validator {
		$validator
			->scalar('name')
			->maxLength('name', 200)
			->allowEmptyString('name');

		$validator
			->integer('idcore')
			->allowEmptyString('idcore');
			
		$validator
			->integer('idsport')
			->allowEmptyString('idsport');

		$validator
			->integer('count_students')
			->allowEmptyString('count_students');
			

		return $validator;
	}

	public function afterSave($event, $entity, $options) {
		// Verifica se o campo 'teachers._ids' está presente nos dados
		if ($entity->isDirty('teachers')) {
			// Obtém os IDs dos professores do campo 'teachers._ids'
			$teachers = $entity->get('teachers');

			// Obtém o ID da classe recém-salva
			$classId = $entity->get('id');

			// Remove todos os registros existentes na tabela Classesteachers para esta classe
			$this->Classesteachers->deleteAll(['class_id' => $classId]);

			// Salva os novos registros na tabela Classesteachers
			foreach ($teachers['_ids'] as $teacherId) {
				$rel = $this->Classesteachers->newEmptyEntity();
				$rel->teacher_id = $teacherId;
				$rel->class_id = $classId;
				$this->Classesteachers->save($rel);
			}
		}
	}

	public function updateCountStudents($classId) {
		$count = $this->Students->find()->where(['idclass' => $classId])->count();
		$class = $this->get($classId);
		$class->set('count_students', $count);
		$this->save($class);
	}
}
