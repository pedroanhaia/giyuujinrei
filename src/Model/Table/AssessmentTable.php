<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class AssessmentTable extends Table {
	public function initialize(array $config): void {
		parent::initialize($config);

		$this->setTable('assessment');
		$this->setDisplayField('id');
		$this->setPrimaryKey('id');

		$this->belongsTo('Students', ['foreignKey' => 'idstudent']);
		$this->belongsTo('Teachers', ['foreignKey' => 'idteacher']);
		$this->belongsTo('Schedules', ['foreignKey' => 'idschedule']);

		$this->addBehavior('Timestamp');
	}

	public function validationDefault(Validator $validator): Validator {
		$validator
			->integer('idindex')
			->requirePresence('idindex', 'create')
			->notEmptyString('idindex');

		$validator
			->integer('idteacher')
			->requirePresence('idteacher', 'create')
			->notEmptyString('idteacher');

		$validator
			->integer('idstudent')
			->requirePresence('idstudent', 'create')
			->notEmptyString('idstudent');

		$validator
			->integer('value')
			->requirePresence('value', 'create')
			->notEmptyString('value');

		$validator
			->integer('idschedule')
			->allowEmptyString('idschedule');

		$validator
			->integer('role')
			->allowEmptyString('role');

		return $validator;
	}
}
