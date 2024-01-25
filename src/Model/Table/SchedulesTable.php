<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class SchedulesTable extends Table {
	public function initialize(array $config): void {
		parent::initialize($config);

		$this->setTable('schedules');
		$this->setDisplayField('name');
		$this->setPrimaryKey('id');
		$this->addBehavior('Timestamp');

		$this->belongsTo('Cores', ['foreignKey' => 'idcore']);
		$this->belongsTo('Users', ['foreignKey' => 'iduser']);
	}

	public function validationDefault(Validator $validator): Validator {
		$validator
			->dateTime('date')
			->allowEmptyDateTime('date');

		$validator
			->integer('idcore')
			->allowEmptyString('idcore');

		$validator
			->integer('role')
			->allowEmptyString('role');

		$validator
			->scalar('name')
			->maxLength('name', 255)
			->allowEmptyString('name');

		return $validator;
	}
}