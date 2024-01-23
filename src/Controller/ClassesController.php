<?php
declare(strict_types=1);

namespace App\Controller;

class ClassesController extends AppController {
	public function initialize(): void {
		parent::initialize();
		$this->loadModel('Teachers');
		$this->loadModel('Cores');
		$this->loadModel('Sports');
	}

	public function index() {
		$classes = $this->Classes->find('all')
			->contain([
				// 'Classesteachers.Teachers' => ['fields' => ['name']],
				'Cores' => ['fields' => ['name']],
				'Sports' => ['fields' => ['name']],
				'Teachers' => ['fields' => ['name']],
			])
			->order('Classes.name ASC')
		->toArray();

		$this->set('title', 'Lista de turmas');
		$this->set(compact('classes'));
	}
 
	public function view($id = null) {
		$class = $this->Classes->findById($id)
			->contain([
				'Students' => ['fields' => ['name']],
				'Teachers' => ['fields' => ['name']],
			])
		->first();

		$this->set('title', 'Visualizar turma');
		$this->set(compact('assessment'));
	}

	public function add() {
		$class = $this->Classes->newEmptyEntity();

		if ($this->request->is('post')) {
			$class = $this->Classes->patchEntity($class, $this->request->getData());
			
			if ($this->Classes->save($class)) {
				$this->Flash->success(__('A avaliação foi salva com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvar a avaliação, tente novamente.'));
		}

		$teachers = $this->Teachers->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$cores = $this->Cores->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$sports = $this->Sports->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();

		$this->set(compact('class', 'teachers', 'cores', 'sports'));
		$this->set('title', 'Cadastrar turma');
	}

	public function edit($id = null) {
		$class = $this->Classes->get($id, ['contain' => []]);
		
		if ($this->request->is(['patch', 'post', 'put'])) {
			$class = $this->Classes->patchEntity($class, $this->request->getData());

			if ($this->Classes->save($class)) {
				$this->Flash->success(__('A avaliação foi salva com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvar a avaliação, tente novamente.'));
		}

        $teachers = $this->Teachers->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$cores = $this->Cores->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();

		$this->set('teachers', $teachers);
		$this->set('cores', $cores);
		$this->set(compact('class'));
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

			$classes = $this->Ranks->find()
				->where($where)
				->select(['id', 'name'])
			->toArray();
			
			return $this->jsonResponse($classes, 200);
		}
	}
}
