<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class StudentsTable extends Table {
	public function initialize(array $config): void {
		parent::initialize($config);

		$this->setTable('students');
		$this->setDisplayField('name');
		$this->setPrimaryKey('id');

		$this->addBehavior('Timestamp');

		$this->belongsTo('Cores', ['foreignKey' => 'idcore']);
		$this->belongsTo('Responsible', ['foreignKey' => 'idresponsible']);
		$this->belongsTo('Ranks', ['foreignKey' => 'idgrank']);
	}

	public function validationDefault(Validator $validator): Validator {
		$validator
			->scalar('name')
			->maxLength('name', 150)
			->allowEmptyString('name');

		$validator
			->scalar('urlpicture')
			->maxLength('urlpicture', 255)
			->allowEmptyString('urlpicture');

		$validator
			->integer('idcore')
			->requirePresence('idcore', 'create')
			->notEmptyString('idcore');

		$validator
			->integer('idresponsible')
			->requirePresence('idresponsible', 'create')
			->notEmptyString('idresponsible');

		$validator
			->scalar('phone')
			->maxLength('phone', 50)
			->allowEmptyString('phone');

		$validator
			->integer('birthday')
			->allowEmptyString('birthday');

		$validator
			->scalar('class')
			->maxLength('class', 10)
			->allowEmptyString('class');

		$validator
			->email('email')
			->allowEmptyString('email');

		$validator
			->integer('role')
			->allowEmptyString('role');

		$validator
			->integer('iduser')
			->allowEmptyString('iduser');

		$validator
			->integer('idgrank')
			->allowEmptyString('idgrank');

		return $validator;
	}
}
