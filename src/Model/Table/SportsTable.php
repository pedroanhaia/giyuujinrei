<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class SportsTable extends Table {
	public function initialize(array $config): void {
		parent::initialize($config);

		$this->setTable('sports');
		$this->setDisplayField('name');
		$this->setPrimaryKey('id');
		$this->addBehavior('Timestamp');
	}

	public function validationDefault(Validator $validator): Validator {
		$validator
			->scalar('name')
			->maxLength('name', 255)
			->allowEmptyString('name');

		$validator
			->scalar('idforeign')
			->maxLength('idforeign', 255)
			->allowEmptyString('idforeign');

		$validator
			->scalar('obs1')
			->allowEmptyString('obs1');

		$validator
			->integer('role')
			->allowEmptyString('role');

		return $validator;
	}
}
