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

		$where = ['Schedules.role' => C_ScheduleRoleAula];

		if($this->userObj->role == C_RoleProfessor) {
			$teacherUser = $this->Teachers->findByIduser($this->userObj->id)->first();
			$classesTeacher = $this->Classesteachers->find('list', ['keyField' => 'id', 'valueField' => 'class_id'])->where(['teacher_id' => $teacherUser->id])->toArray();
			$where['Classes.id IN'] = $classesTeacher;
		} 

		$schedules = $this->Schedules->find()
			->contain([
				'Cores' => ['fields' => ['name']],
				'Classes' => ['fields' => ['name']],
			])
			->where($where)
		->toArray();
	
		$this->set('title', 'Lista de presenças');
		$this->set(compact('schedules'));
	}
 
	public function view($id = null) {
		$schedule = $this->Schedules->findById($id)
			->contain([
				'Cores' => ['fields' => ['name']],
				'Classes' => ['fields' => ['name']],
				'Attendances' => ['fields' => ['idstudent', 'idschedule', 'present']],
				'Attendances.Students' => ['fields' => ['name']],
			])
			->where($id)
		->first();

		$this->set(compact('schedule'));
		$this->set('title', 'Vsualizar lista de presença');
	}

	public function edit($id = null) {
		$schedule = $this->Schedules->findById($id)
			->contain([
				'Cores' => ['fields' => ['name']],
				'Classes' => ['fields' => ['name']],
				'Attendances' => ['fields' => ['idstudent', 'idschedule', 'present']],
				'Attendances.Students' => ['fields' => ['name']],
			])
			->where($id)
		->first();

		if ($this->request->is(['patch', 'post', 'put'])) {
			$schedule = $this->Schedules->patchEntity($schedule, $this->request->getData());
			$data = $this->request->getData();
			$bError = false;

			foreach($data['attendance'] as $key => $reg) {
				$attendance = $this->Attendances->find()->where(['idstudent' => $key, 'idschedule' => $schedule->id])->first();
				$attendance->present = $reg;

				if(!$this->Attendances->save($attendance)) $bError = true;
			}

			if(!$bError) {
				$this->Flash->success(__('A lista de presença foi salva com sucesso.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('Ocorreu um erro ao salvar a lista de presença, tente novamente.'));
			}
		}

		$this->set(compact('schedule'));
		$this->set('title', 'Alterar lista de presença');
	}

	public function delete($id = null) {
		if($this->userObj->role < C_RoleTudo) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		} else {
			$schedule = $this->Schedules->findById($id)
				->contain(['Attendances'])
				->where($id)
			->first();
	
			foreach($schedule->attendances as $attendance) $this->Attendances->delete($attendance);
			
			if ($this->Schedules->delete($schedule)) {
				$this->Flash->success(__('A lista de presença foi excluída com sucesso.'));
			} else {
				$this->Flash->error(__('Não foi possível excluir a lista de presença, tente novamente.'));
			}
	
			return $this->redirect(['action' => 'index']);
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
			$schedule->idclass = $data['idclass'];
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
				$this->Flash->success(__('A lista de presença foi salva com sucesso.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('Ocorreu um erro ao salvar a lista de presença, tente novamente.'));
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