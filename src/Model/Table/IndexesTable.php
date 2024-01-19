<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class IndexesTable extends Table {
	public function initialize(array $config): void {
		parent::initialize($config);

		$this->setTable('indexes');
		$this->setDisplayField('name');
		$this->setPrimaryKey('id');
		$this->addBehavior('Timestamp');

		$this->belongsTo('Ratings', ['foreignKey' => 'idrating']);
	}

	public function validationDefault(Validator $validator): Validator {
		$validator
			->scalar('name')
			->maxLength('name', 200)
			->allowEmptyString('name');

		$validator
			->integer('age_min')
			->allowEmptyString('age_min');

		$validator
			->integer('age_max')
			->allowEmptyString('age_max');

		$validator
			->integer('role')
			->allowEmptyString('role');

		$validator
			->integer('idrating')
			->allowEmptyString('idrating');

		return $validator;
	}
}
