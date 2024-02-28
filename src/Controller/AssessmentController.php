<?php
declare(strict_types=1);

namespace App\Controller;

class AssessmentController extends AppController {
	public function initialize(): void {
		parent::initialize();
		$this->loadModel('Classes');
		$this->loadModel('Teachers');
		$this->loadModel('Classesteachers');
		$this->loadModel('Students');
		$this->loadModel('Schedules');
		$this->loadModel('Indexes');
		$this->loadModel('Ratings');
		$this->loadModel('Responsible');
	}

	public function index() {
		if($this->userObj->role < C_RoleResponsável) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}

		$where = ['Schedules.role' => C_ScheduleRoleAvaliacao];

		if($this->userObj->role == C_RoleTudo) {
			$schedules = $this->Schedules->find()
				->contain([
					'Cores' => ['fields' => ['name']],
					'Classes' => ['fields' => ['name']],
					'Assessment' => ['fields' => ['id', 'idstudent', 'idschedule']],
					'Assessment.Students' => ['fields' => ['id', 'idresponsible', 'name']],
				])
				->where($where)
			->toArray();
		} else if($this->userObj->role == C_RoleProfessor) {
			$teacherUser = $this->Teachers->findByIduser($this->userObj->id)->first();
			$classesTeacher = $this->Classesteachers->find('list', ['keyField' => 'id', 'valueField' => 'class_id'])->where(['teacher_id' => $teacherUser->id])->toArray();
			$where['Classes.id IN'] = $classesTeacher;

			$schedules = $this->Schedules->find()
				->contain([
					'Cores' => ['fields' => ['name']],
					'Classes' => ['fields' => ['name']],
					'Assessment' => ['fields' => ['id', 'idstudent', 'idschedule']],
					'Assessment.Students' => ['fields' => ['id', 'idresponsible', 'name']],
				])
				->where($where)
			->toArray();
		} else if($this->userObj->role == C_RoleResponsável) {
			$responsibleUser = $this->Responsible->findByIduser($this->userObj->id)->first();
			$where = ['Assessment.Students.idresponsible' => $responsibleUser->id, 'inactive' => 0];

			$assessment = $this->Assessment->find()
				->contain([
					'Schedules',
					'Schedules.Cores' => ['fields' => ['name']],
					'Schedules.Classes' => ['fields' => ['name']],
					'Students' => ['fields' => ['id', 'idresponsible', 'inactive']]
				])
				->where(['Students.idresponsible' => $responsibleUser->id, 'Students.inactive' => 0])
			->toArray();

			$shcedules = [];

			foreach($assessment as $reg) {
				$schedules[$reg->schedule->id] = $reg->schedule;
			}
		} 

		$this->set('title', 'Lista de avaliações');
		$this->set(compact('schedules'));
	}
 
	public function view($id = null) {
		$schedule = $this->Schedules->findById($id)
			->contain([
				'Cores' => ['fields' => ['name']],
				'Classes' => ['fields' => ['name']],
				'Assessment' => ['fields' => ['idstudent', 'idindex', 'value', 'idschedule']],
				'Assessment.Students' => ['fields' => ['name']],
			])
			->where($id)
		->first();

		$students = [];

		foreach($schedule->assessment as $avaliacao) {
			$students[$avaliacao->idstudent]['name'] = $avaliacao->student->name;
			$students[$avaliacao->idstudent]['id'] = $avaliacao->idstudent;
		}

		$this->set(compact('schedule', 'students'));
		$this->set('title', 'Visualizar avaliação');
	}

	public function add() {
		if($this->userObj->role < C_RoleProfessor) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}

		if($this->userObj->role == C_RoleProfessor) {
			$teacherUser = $this->Teachers->findByIduser($this->userObj->id)->first();

			$classesTeacher = $this->Classesteachers->find('list', ['keyField' => 'id', 'valueField' => 'class_id'])->where(['teacher_id' => $teacherUser->id])->toArray();
			$classes = $this->Classes->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where([['id IN' => $classesTeacher]])->order(['name ASC'])->toArray();
		} else {
			$teachers = $this->Teachers->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
			$classes = $this->Classes->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
			$this->set('teachers', $teachers);
		}

		if ($this->request->is('post')) {
			$data = $this->request->getData();

			$bError = false;

			foreach($data['index'] as $idindex => $value) {
				$assessment = $this->Assessment->newEmptyEntity();
				$assessment->idindex = $idindex;
				$assessment->idteacher = $this->userObj->role == C_RoleProfessor ? $teacherUser->id : $data['idteacher'];
				$assessment->idstudent = $data['idstudent'];
				$assessment->idschedule = $data['idschedule'];
				$assessment->value = $value;

				if (!$this->Assessment->save($assessment)) $bError = true;
			}

			if (!$bError) {
				$this->Flash->success(__('A avaliação foi salva com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvar a avaliação, tente novamente.'));
		}

		$this->set('classes', $classes);
		$this->set('title', 'Cadastrar avaliação');
	}

	public function questions($idstudent) {
		$ratings = $this->Ratings->find('all')->contain(['Indexes'])->order(['name ASC'])->toArray();
		$this->set('ratings', $ratings);
		
		$student = $this->Students->findById($idstudent)->select(['birthday', 'urlpicture'])->first();
		$today = new \DateTime(); 
		$diff = $today->diff($student->birthday);
		$studentAge = $diff->y;
		$this->set('studentAge', $studentAge);
		$this->set('urlpicture', $student->urlpicture);
	}

	public function questionsview($idstudent, $idschedule) {
		$ratings = $this->Ratings->find('all')->contain(['Indexes'])->order(['name ASC'])->toArray();
		$this->set('ratings', $ratings);

		$assessmentList = $this->Assessment->find()
			->where([
				'Assessment.idstudent' => $idstudent,
				'Assessment.idschedule' => $idschedule,
			])
			->select(['idindex', 'id', 'value'])
		->toArray();
		foreach ($assessmentList as $avaliacao) $assessment[$avaliacao->idindex] = ['value' => $avaliacao->value, 'id' => $avaliacao->id];
		$this->set('assessment', $assessment);

		$ratings = $this->Ratings->find('all')->contain(['Indexes'])->order(['name ASC'])->toArray();
		$this->set('ratings', $ratings);
		
		$student = $this->Students->findById($idstudent)->select(['birthday', 'urlpicture'])->first();
		$today = new \DateTime(); 
		$diff = $today->diff($student->birthday);
		$studentAge = $diff->y;
		$this->set('studentAge', $studentAge);
		$this->set('urlpicture', $student->urlpicture);
		$this->set('idstudent', $idstudent);
		$this->set('idschedule', $idschedule);

		if ($this->request->is(['post', 'put'])) {
			$data = $this->request->getData();
			$bError = false;

			foreach($data['assessment'] as $assessmentId => $value) {
				$assessment = $this->Assessment->findById($assessmentId)->first();
				$assessment->value = $value;

				if (!$this->Assessment->save($assessment)) $bError = true;
			}

			if (!$bError) {
				return $this->jsonResponse('A avaliação foi salva com sucesso.', 200);
			} else {
				return $this->jsonResponse('Não foi possível salvar a avaliação, tente novamente.', 400);
			}
		}
	}

	public function delete($id = null) {
		if($this->userObj->role < C_RoleTudo) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}

		$assessment = $this->Assessment->get($id);
		if ($this->Assessment->delete($assessment)) {
			$this->Flash->success(__('A avaliação foi excluída com sucesso.'));
		} else {
			$this->Flash->error(__('Não foi possível excluir a avaliação, tente novamente.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
