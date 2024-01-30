<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Filesystem\File;
use Cake\Filesystem\Folder;
use Cake\Utility\Text;

class StudentsController extends AppController {
	public function initialize(): void {
		parent::initialize();
		$this->loadModel('Responsible');
		$this->loadModel('Cores');
		$this->loadModel('Ranks');
		$this->loadModel('Users');
		$this->loadModel('Sports');
		$this->loadModel('Classes');
		$this->loadModel('Teachers');
		$this->loadModel('Classesteachers');
	}

	public function index() {
		if($this->userObj->role < C_RoleProfessor) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}

		if($this->userObj->role == C_RoleProfessor) {
			$teacherUser = $this->Teachers->findByIduser($this->userObj->id)->first();
			$classesTeacher = $this->Classesteachers->find('list', ['keyField' => 'id', 'valueField' => 'class_id'])->where(['teacher_id' => $teacherUser->id])->toArray();
			$where = ['Students.idclass IN' => $classesTeacher, 'inactive' => 0];
		} else {
			$where['inactive'] = 0;
		}

		$students = $this->Students->find('all')
			->contain([
				'Cores' => ['fields' => ['name']],
				'Sports' => ['fields' => ['name']],
				'Responsible' => ['fields' => ['name']],
				'Ranks' => ['fields' => ['name']],
				'Classes' => ['fields' => ['name']],
			])
			->where($where)
		->toArray();

		$where['inactive'] = 1;

		$inactiveStudents = $this->Students->find('all')
			->contain([
				'Cores' => ['fields' => ['name']],
				'Sports' => ['fields' => ['name']],
				'Responsible' => ['fields' => ['name']],
				'Ranks' => ['fields' => ['name']],
				'Classes' => ['fields' => ['name']],
			])
			->where($where)
		->toArray();

		$this->set(compact('students', 'inactiveStudents'));
		$this->set('title', 'Lista de estudantes');
	}

	public function view($id = null) {
		$bPermissao = true;
		
		if($this->userObj->role < C_RoleProfessor) $bPermissao = false;

		$student = $this->Students->findById($id)
			->contain([
				'Cores' => ['fields' => ['name']],
				'Sports' => ['fields' => ['name']],
				'Responsible' => ['fields' => ['name']],
				'Ranks' => ['fields' => ['name']],
				'Classes' => ['fields' => ['name']],
				'Users' => ['fields' => ['name', 'id']]
			])
		->first();

		if($this->userObj->role == C_RoleProfessor) {
			$teacherUser = $this->Teachers->findByIduser($this->userObj->id)->first();
			$classesTeacher = $this->Classesteachers->find('list', ['keyField' => 'id', 'valueField' => 'class_id'])->where(['teacher_id' => $teacherUser->id])->toArray();
			
			if(!in_array($student->idclass, $classesTeacher)) $bPermissao = false;
		}

		if($bPermissao == false) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}

		$this->set(compact('student'));
		$this->set('title', 'Visualizar estudante');
	}

	public function add() {
		$student = $this->Students->newEmptyEntity();
		if ($this->request->is('post')) {

			$student = $this->Students->patchEntity($student, $this->request->getData());
            if (!empty($this->request->getData()['urlpicture']) ) {
                $file = $this->request->getUploadedFile('urlpicture');
                if ($this->request->getUploadedFile('urlpicture')->getError() === UPLOAD_ERR_OK && $file != null)
                {


                    $uploadPath = WWW_ROOT . 'img' . DS . 'uploads' . DS;
                    $filename = Text::uuid() . '-' . $file->getClientFilename();

                    // Salvar a imagem no servidor
                    $file->moveTo($uploadPath . $filename);

                    // Atualizar o caminho da imagem no banco de dados
                    $student->urlpicture = 'uploads/'  . $filename; // Coluna 'image2'
                } else {
                    $student->urlpicture =  ''; // Coluna 'image2'
                }
            }
			if ($this->Students->save($student)) {
				// Atualiza contagem na tabela Classes e COres
				$this->Classes->updateCountStudents($student->idclass);
				$this->Cores->updateCountStudents($student->idcore);

				$this->Flash->success(__('O estudante foi salvo com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvr o estudante, tente novamente.'));
		}

		$responsibles = $this->Responsible->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$cores = $this->Cores->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$ranks = $this->Ranks->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$users = $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['role' => C_RoleEstudante])->order(['name ASC'])->toArray();
		$sports = $this->Sports->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();

		$this->set('sports', $sports);
		$this->set('users', $users);
		$this->set('ranks', $ranks);
		$this->set('cores', $cores);
		$this->set('responsibles', $responsibles);
		$this->set(compact('student'));
		$this->set('title', 'Cadastrar estudante');
	}

	public function edit($id = null) {
		$student = $this->Students->get($id);

		if ($this->request->is(['patch', 'post', 'put'])) {
			$oldCore = $student->idcore;
			$oldClass = $student->idclass;
			$oldImage = $student->urlpicture;

			$student = $this->Students->patchEntity($student, $this->request->getData());

			if (!empty($this->request->getData()['urlpicture']) ) {
				$file = $this->request->getUploadedFile('urlpicture');
				if ($this->request->getUploadedFile('urlpicture')->getError() === UPLOAD_ERR_OK && $file != null) {
					$uploadPath = WWW_ROOT . 'img' . DS . 'uploads' . DS;
					$filename = Text::uuid() . '-' . $file->getClientFilename();

					// Salvar a imagem no servidor
					$file->moveTo($uploadPath . $filename);

					// Atualizar o caminho da imagem no banco de dados
					$student->urlpicture = 'uploads/'  . $filename; // Coluna 'image2'
				} else {
					$student->urlpicture = $oldImage; // Coluna 'image2'
				}
			}

			if ($student->urlpicture == "" || $student->urlpicture == null) $student->urlpicture = $oldImage;

			if ($this->Students->save($student)) {
				// Atualiza contagem na tabela Classes e Cores
				$this->Classes->updateCountStudents($student->idclass);
				$this->Cores->updateCountStudents($student->idcore);
				if($oldClass != $student->idclass) $this->Classes->updateCountStudents($oldClass);
				if($oldCore != $student->idcore) $this->Cores->updateCountStudents($oldCore);

				$this->Flash->success(__('O estudante foi salvo com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvr o estudante, tente novamente.'));
		}

		$responsibles = $this->Responsible->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$cores = $this->Cores->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$ranks = $this->Ranks->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$users = $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['role' => C_RoleEstudante])->order(['name ASC'])->toArray();
		$sports = $this->Sports->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();

		$this->set('sports', $sports);
		$this->set('users', $users);
		$this->set('ranks', $ranks);
		$this->set('cores', $cores);
		$this->set('responsibles', $responsibles);
		$this->set(compact('student'));
		$this->set('title', 'Alterar estudante');
	}

	public function delete($id = null) {
		$student = $this->Students->get($id);

		if ($this->Students->delete($student)) {
			// Atualiza contagem na tabela Classes e Cores
			$this->Classes->updateCountStudents($student->idclass);
			$this->Cores->updateCountStudents($student->idcore);
			$this->Flash->success(__('O estudante foi excluído com sucesso.'));
		} else {
			$this->Flash->error(__('Não foi possível excluir o estudante, tente novamente.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}