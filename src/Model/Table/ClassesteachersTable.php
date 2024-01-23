<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ClassesteachersTable extends Table {
	public function initialize(array $config): void {
		parent::initialize($config);

		$this->setTable('classesteachers');
		$this->setPrimaryKey('id');
		$this->addBehavior('Timestamp');

		$this->belongsTo('Classes');
        $this->belongsTo('Teachers');
	}

	public function validationDefault(Validator $validator): Validator {
		$validator
			->scalar('name')
			->maxLength('name', 200)
			->allowEmptyString('name');

		$validator
			->integer('idteacher')
			->allowEmptyString('idteacher');
			
		$validator
			->integer('idclass')
			->allowEmptyString('idclass');

		return $validator;
	}
}
