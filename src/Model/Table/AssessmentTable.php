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
		$this->belongsTo('Indexes', ['foreignKey' => 'idindex']);

		$this->hasMany('Attendances');

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

	public function destaquesMes($mes, $ano) {
		$primeiroDia = new \DateTime("$ano-$mes-01");
		$ultimoDia = new \DateTime($primeiroDia->format('Y-m-t'));

		$where = [
			'DATE(Schedules.date) >=' => $primeiroDia->format('Y-m-d'),
			'DATE(Schedules.date) <=' => $ultimoDia->format('Y-m-d'),
			'Students.inactive' => 0,
		];
		// if(!empty($platformsIn)) $where['Games.idplatform IN'] = $platformsIn;

		// Avaliações
			$assessment = $this->find('all')
				->where($where)
				->contain(['Students', 'Schedules'])
				->select(['Students.id', 'Students.name', 'Students.inactive', 'Students.urlpicture', 'Assessment.id', 'Assessment.idstudent', 'Assessment.value', 'Assessment.idindex', 'Assessment.idschedule', 'Schedules.date'])
			->toArray();

			$array = [];

			foreach ($assessment as $avaliacao) {
				if(isset($array[$avaliacao->idstudent])) {
					$array[$avaliacao->idstudent]['Total'] += $avaliacao->value;
				} else {
					$array[$avaliacao->idstudent]['Nome'] = $avaliacao->student->name;
					$array[$avaliacao->idstudent]['Total'] = $avaliacao->value;
					$array[$avaliacao->idstudent]['Foto'] = $avaliacao->student->urlpicture;
					$array[$avaliacao->idstudent]['Presencas'] = 0;
					$array[$avaliacao->idstudent]['Faltas'] = 0;
				}
			}

		// Presenças 
			$attendances = $this->Attendances->find('all')
				->where($where)
				->contain(['Students', 'Schedules'])
				->select(['Students.id', 'Students.name', 'Students.inactive', 'Students.urlpicture', 'Attendances.id', 'Attendances.present', 'Attendances.idstudent', 'Schedules.date'])
			->toArray();

			foreach ($attendances as $presenca) {
				if(!isset($array[$presenca->idstudent])) {
					$array[$presenca->idstudent]['Nome'] = $presenca->student->name;
					$array[$presenca->idstudent]['Total'] = 0;
					$array[$presenca->idstudent]['Foto'] = $presenca->student->urlpicture;
					$array[$presenca->idstudent]['Presencas'] = 0;
					$array[$presenca->idstudent]['Faltas'] = 0;
				}

				if($presenca->present) $array[$presenca->idstudent]['Presencas']++;
				else $array[$presenca->idstudent]['Faltas']++;
			}

			foreach ($array as $key => $student) {
				if($student['Faltas'] == 0 && $student['Presencas'] > 0) $array[$key]['PresencaPct'] = 100;
				else if($student['Faltas'] == 0 && $student['Presencas'] == 0) $array[$key]['PresencaPct'] = 0;
				else $array[$key]['PresencaPct'] = round($student['Presencas'] / ($student['Presencas'] + $student['Faltas']), 2) * 100;
			}
		// 

		// Ordena o array pela quantidade, do maior para o menor
		usort($array, function($a, $b) {
			return $b['Total'] <=> $a['Total'];
		});

		return $array;
	}
}
