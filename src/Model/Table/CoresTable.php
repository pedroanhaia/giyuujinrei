<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class CoresTable extends Table {
	public function initialize(array $config): void {
		parent::initialize($config);

		$this->setTable('cores');
		$this->setDisplayField('name');
		$this->setPrimaryKey('id');
		$this->addBehavior('Timestamp');

		$this->hasMany('Students', ['foreignKey' => 'id']);
	}

	public function validationDefault(Validator $validator): Validator {
		$validator
			->scalar('name')
			->maxLength('name', 200)
			->allowEmptyString('name');

		$validator
			->scalar('city')
			->maxLength('city', 200)
			->allowEmptyString('city');

		$validator
			->integer('count_students')
			->allowEmptyString('count_students');

		$validator
			->integer('type')
			->allowEmptyString('type');

		$validator
			->scalar('contact')
			->maxLength('contact', 255)
			->allowEmptyString('contact');

		$validator
			->scalar('positioncontact')
			->maxLength('positioncontact', 255)
			->allowEmptyString('positioncontact');

		$validator
			->scalar('phone')
			->maxLength('phone', 50)
			->allowEmptyString('phone');

		$validator
			->email('email')
			->allowEmptyString('email');

		$validator
			->integer('role')
			->allowEmptyString('role');

		return $validator;
	}

	public function updateCountStudents($coreId) {
		$count = $this->Students->find()->where(['idcore' => $coreId])->count();
        $core = $this->get($coreId);
        $core->set('count_students', $count);
        $this->save($core);
	}
}
