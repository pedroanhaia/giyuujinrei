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
	}

	public function index() {
		$assessment = $this->Assessment->find()
			->contain([
				'Students' => ['fields' => ['name']],
				'Teachers' => ['fields' => ['name']],
				'Schedules' => ['fields' => ['name', 'date']],
				'Indexes' => ['fields' => ['name']],
			])
		->toArray();

		$this->set('title', 'Lista de avaliações');
		$this->set(compact('assessment'));
	}
 
	public function view($id = null) {
		$assessment = $this->Assessment->findById($id)
			->contain([
				'Students' => ['fields' => ['name']],
				'Teachers' => ['fields' => ['name']],
				'Schedules' => ['fields' => ['name', 'date']],
				'Indexes' => ['fields' => ['name']],
			])
		->first();

		$this->set('title', 'Visualizar avaliação');
		$this->set(compact('assessment'));
	}

	public function add() {
		if($this->userObj->role < C_RoleProfessor) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}

		$assessment = $this->Assessment->newEmptyEntity();

		if ($this->request->is('post')) {
			$assessment = $this->Assessment->patchEntity($assessment, $this->request->getData());
			
			if ($this->Assessment->save($assessment)) {
				$this->Flash->success(__('A avaliação foi salva com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvar a avaliação, tente novamente.'));
		}

		if($this->userObj->role == C_RoleProfessor) {
			$teacherUser = $this->Teachers->findByIduser($this->userObj->id)->first();
			$assessment->idteacher = $teacherUser->id;

			$classesTeacher = $this->Classesteachers->find('list', ['keyField' => 'id', 'valueField' => 'class_id'])->where(['teacher_id' => $teacherUser->id])->toArray();
			$students = $this->Students->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where([['Students.idclass IN' => $classesTeacher]])->order(['name ASC'])->toArray();
		} else {
			$teachers = $this->Teachers->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
			$students = $this->Students->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
			$this->set('teachers', $teachers);
		}

		$ratings = $this->Ratings->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$schedules = $this->Schedules->find('list', [
				'keyField' => 'id',
				'valueField' => function ($entity) {
					return $entity->get('name') . ' - ' . date_format($entity->get('date'), 'd/m/Y - H:i:s');
				}
			])
		->order(['DATE(date) ASC'])->toArray();

		$this->set('ratings', $ratings);
		$this->set('students', $students);
		$this->set('schedules', $schedules);
		$this->set(compact('assessment'));
		$this->set('title', 'Cadastrar avaliação');
	}

	public function assessment() {
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


		$ratings = $this->Ratings->find('all')->contain(['Indexes'])->order(['name ASC'])->toArray();

		$schedules = $this->Schedules->find('list', [
				'keyField' => 'id',
				'valueField' => function ($entity) {
					return $entity->get('name') . ' - ' . date_format($entity->get('date'), 'd/m/Y - H:i:s');
				}
			])
		->order(['DATE(date) ASC'])->toArray();

		$this->set('ratings', $ratings);
		$this->set('classes', $classes);
		$this->set('schedules', $schedules);
		$this->set('title', 'Cadastrar avaliação');
	}

	public function edit($id = null) {
		if($this->userObj->role < C_RoleTudo) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}

		$assessment = $this->Assessment->get($id, ['contain' => []]);
		
		if ($this->request->is(['patch', 'post', 'put'])) {
			$assessment = $this->Assessment->patchEntity($assessment, $this->request->getData());
			
			if ($this->Assessment->save($assessment)) {
				$this->Flash->success(__('A avaliação foi salva com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}
			
			$this->Flash->error(__('Não foi possível salvar a avaliação, tente novamente.'));
		}

		$teachers = $this->Teachers->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$students = $this->Students->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$indexes = $this->Indexes->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$schedules = $this->Schedules->find('list', [
				'keyField' => 'id',
				'valueField' => function ($entity) {
					return $entity->get('name') . ' - ' . date_format($entity->get('date'), 'd/m/Y - H:i:s');
				}
			])
		->order(['DATE(date) ASC'])->toArray();

		$this->set('indexes', $indexes);
		$this->set('students', $students);
		$this->set('teachers', $teachers);
		$this->set('schedules', $schedules);
		$this->set(compact('assessment'));
		$this->set('title', 'Alterar avaliação');
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
