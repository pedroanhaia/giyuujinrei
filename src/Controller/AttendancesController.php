<?php
declare(strict_types=1);

namespace App\Controller;

class AttendancesController extends AppController {
	public function initialize(): void {
		parent::initialize();
		$this->loadModel('Teachers');
		$this->loadModel('Classes');
		$this->loadModel('Classesteachers');
		$this->loadModel('Cores');
		$this->loadModel('Sports');
		$this->loadModel('Students');
		$this->loadModel('Schedules');
	}

	public function index() {
		if($this->userObj->role < C_RoleProfessor) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}

		if($this->userObj->role == C_RoleProfessor) {
			$teacherUser = $this->Teachers->findByIduser($this->userObj->id)->first();
			$classesTeacher = $this->Classesteachers->find('list', ['keyField' => 'id', 'valueField' => 'class_id'])->where(['teacher_id' => $teacherUser->id])->toArray();
			$where = ['Classes.id IN' => $classesTeacher];
		} else {
			$where = [];
		}

		$schedules = $this->Schedules->find()
			->contain(['Cores' => ['fields' => ['name']]])
		->toArray();

		$this->set('title', 'Lista de turmas');
		$this->set(compact('classes'));
	}
 
	public function view($id = null) {
		$bPermissao = true;
		
		if($this->userObj->role < C_RoleProfessor) $bPermissao = false;

		if($this->userObj->role == C_RoleProfessor) {
			$teacherUser = $this->Teachers->findByIduser($this->userObj->id)->first();
			$classesTeacher = $this->Classesteachers->find('list', ['keyField' => 'id', 'valueField' => 'class_id'])->where(['teacher_id' => $teacherUser->id])->toArray();
			
			if(!in_array($id, $classesTeacher)) $bPermissao = false;
		}

		if($bPermissao == false) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}

		$class = $this->Classes->findById($id)
			->contain([
				'Cores' => ['fields' => ['name']],
				'Sports' => ['fields' => ['name']],
				'Teachers' => ['fields' => ['name']],
			])
		->first();

		$this->set('title', 'Visualizar turma');
		$this->set(compact('class'));
	}

	public function edit($id = null) {
		$class = $this->Classes->get($id, ['contain' => ['Teachers']]);
		
		if ($this->request->is(['patch', 'post', 'put'])) {
			$class = $this->Classes->patchEntity($class, $this->request->getData());

			if ($this->Classes->save($class)) {
				$this->Flash->success(__('A turma foi salva com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvar a turma, tente novamente.'));
		}

		$teachers = $this->Teachers->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$cores = $this->Cores->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$sports = $this->Sports->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();

		$this->set(compact('class', 'teachers', 'cores', 'sports'));
		$this->set('title', 'Alterar turma');
	}

	public function delete($id = null) {
		$class = $this->Classes->get($id);
		if ($this->Classes->delete($class)) {
			$this->Flash->success(__('A turma foi excluída com sucesso.'));
		} else {
			$this->Flash->error(__('Não foi possível excluir a turma, tente novamente.'));
		}

		return $this->redirect(['action' => 'index']);
	}

	public function classesopt() {
		if($this->request->is('ajax')) {
			$data = $this->request->getData();

			$where = [];
			if(!empty($data['idsport'])) $where['idsport'] = $data['idsport'];
			if(!empty($data['idcore'])) $where['idcore'] = $data['idcore'];

			$classes = $this->Classes->find()
				->where($where)
				->select(['id', 'name'])
			->toArray();
			
			return $this->jsonResponse($classes, 200);
		}
	}

	public function add() {
		if($this->userObj->role < C_RoleProfessor) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}

		$teacherUser = $this->Teachers->findByIduser($this->userObj->id)->first();
		if($this->userObj->role == C_RoleProfessor) {
			$classesTeacher = $this->Classesteachers->find('list', ['keyField' => 'id', 'valueField' => 'class_id'])->where(['teacher_id' => $teacherUser->id])->toArray();
			$where = ['Classes.id IN' => $classesTeacher];
		} else {
			$where = [];
		}

		if ($this->request->is('post')) {
			$data = $this->request->getData();

			$class = $this->Classes->findById($data['idclass'])->select(['id', 'idcore'])->first();

			$schedule = $this->Schedules->newEmptyEntity();
			$schedule->role = C_ScheduleRoleAula;
			$schedule->date = $data['date'];
			$schedule->name = 'Aula - ' . formatarData($data['date']);
			$schedule->idcore = $class->idcore;
			$this->Schedules->save($schedule);

			$bError = false;
			foreach($data['attendance'] as $key => $reg) {
				$attendance = $this->Attendances->newEmptyEntity();
				$attendance->idstudent = $key;
				$attendance->idschedule = $schedule->id;
				$attendance->present = $reg;
				$attendance->idclass = $class->id;
				if(!empty($teacherUser)) $attendance->idteacher = $teacherUser->id;

				if(!$this->Attendances->save($attendance)) $bError = true;
			}

			if(!$bError) {
				$this->Flash->success(__('A lista de presenças foi salva com sucesso.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('Ocorreu um erro ao salvar a lista de presenças, tente novamente.'));
			}
		}


		$classes = $this->Classes->find('list', ['keyField' => 'id', 'valueField' => 'name'])
			->order('Classes.name ASC')
			->where($where)
		->toArray();

		$this->set('title', 'Lista de presença');
		$this->set(compact('classes'));
	}
}

