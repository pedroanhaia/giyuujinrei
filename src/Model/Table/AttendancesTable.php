<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class AttendancesTable extends Table {
	public function initialize(array $config): void {
		parent::initialize($config);

		$this->setTable('attendances');
		$this->setDisplayField('name');
		$this->setPrimaryKey('id');

		$this->hasMany('Students', ['foreignKey' => 'id']);
		$this->belongsTo('Schedules', ['foreignKey' => 'idstudent']);
	}

	public function validationDefault(Validator $validator): Validator {
		$validator
			->scalar('name')
			->maxLength('name', 200)
			->allowEmptyString('name');

		$validator
			->integer('idstudent')
			->allowEmptyString('idstudent');
			
		$validator
			->integer('idschedule')
			->allowEmptyString('idschedule');

		$validator
			->integer('idteacher')
			->allowEmptyString('idteacher');

		$validator
			->integer('idclass')
			->allowEmptyString('idclass');

		$validator
			->integer('present')
			->allowEmptyString('present');

		return $validator;
	}
}
