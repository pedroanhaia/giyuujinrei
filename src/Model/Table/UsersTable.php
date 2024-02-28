<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table {
	public function initialize(array $config): void {
		parent::initialize($config);

		$this->setTable('users');
		$this->setDisplayField('name');
		$this->setPrimaryKey('id');
		$this->addBehavior('Timestamp');

		$this->belongsTo('Cores', ['foreignKey' => 'idcore']);
	}

	public function validationDefault(Validator $validator): Validator {
		$validator
			->email('email')
			->maxLength('password', 255)
			->allowEmptyString('email');

		$validator
			->scalar('password')
			->maxLength('password', 255)
			->allowEmptyString('password');

		$validator
			->integer('role')
			->allowEmptyString('role');

		$validator
			->scalar('name')
			->maxLength('name', 255)
			->allowEmptyString('name');

		$validator
			->integer('idcore')
			->allowEmptyString('idcore');

		$validator
			->integer('inactive')
			->allowEmptyString('inactive');

		return $validator;
	}

	public function buildRules(RulesChecker $rules): RulesChecker {
		$rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

		return $rules;
	}
}
