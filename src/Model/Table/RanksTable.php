<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class RanksTable extends Table {
	public function initialize(array $config): void {
		parent::initialize($config);

		$this->setTable('ranks');
		$this->setDisplayField('name');
		$this->setPrimaryKey('id');

		$this->addBehavior('Timestamp');
		$this->belongsTo('Sports', ['foreignKey' => 'idsport']);
	}

	public function validationDefault(Validator $validator): Validator {
		$validator
			->scalar('name')
			->maxLength('name', 255)
			->allowEmptyString('name');

		$validator
			->scalar('color')
			->maxLength('color', 255)
			->allowEmptyString('color');

		$validator
			->scalar('description')
			->maxLength('description', 255)
			->allowEmptyString('description');

		$validator
			->integer('idsport')
			->allowEmptyString('idsport');

		$validator
			->scalar('obs1')
			->allowEmptyString('obs1');

		$validator
			->scalar('obs2')
			->allowEmptyString('obs2');

		$validator
			->integer('role')
			->allowEmptyString('role');

		$validator
			->scalar('urlimage')
			->maxLength('urlimage', 255)
			->allowEmptyFile('urlimage');

		return $validator;
	}
}
