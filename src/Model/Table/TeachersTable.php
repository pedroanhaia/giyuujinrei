<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class TeachersTable extends Table {
	public function initialize(array $config): void {
		parent::initialize($config);

		$this->setTable('teachers');
		$this->setDisplayField('name');
		$this->setPrimaryKey('id');
		$this->addBehavior('Timestamp');

		$this->belongsTo('Users', ['foreignKey' => 'iduser']);
	}

	public function validationDefault(Validator $validator): Validator {
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
			->integer('type')
			->allowEmptyString('type');

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