<?php
declare(strict_types=1);

namespace App\Controller;

class AssessmentController extends AppController {
	public function initialize(): void {
		parent::initialize();
		$this->loadModel('Teachers');
		$this->loadModel('Students');
		$this->loadModel('Schedules');
		$this->loadModel('Indexes');
	}

	public function index() {
		$this->paginate = [
			'limit' => 25,
			'order' => ['Assessment.id' => 'DESC'],
			'contain' => [
				'Students' => ['fields' => ['name']],
				'Teachers' => ['fields' => ['name']],
				'Schedules' => ['fields' => ['name', 'date']],
				'Indexes' => ['fields' => ['name']],
			],
		];

		$assessment = $this->paginate($this->Assessment);

		$this->set('title', 'Lista de avaliações');
		$this->set(compact('assessment'));
	}
 
	public function view($id = null) {
		$assessment = $this->Assessment->findById($id)
			->contain([
				'Students' => ['fields' => ['name']],
				'Teachers' => ['fields' => ['name']],
			])
		->first();

		$this->set('title', 'z de avaliações');
		$this->set(compact('assessment'));
	}

	public function add() {
		$assessment = $this->Assessment->newEmptyEntity();

		if ($this->request->is('post')) {
			$assessment = $this->Assessment->patchEntity($assessment, $this->request->getData());
			
			if ($this->Assessment->save($assessment)) {
				$this->Flash->success(__('A avaliação foi salva com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('Não foi possível salvar a avaliação, tente novamente.'));
		}

		$professores = $this->Teachers->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$estudantes = $this->Students->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$indexes = $this->Indexes->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$schedules = $this->Schedules->find('list', [
				'keyField' => 'id',
				'valueField' => function ($entity) {
					return $entity->get('name') . ' - ' . date_format($entity->get('date'), 'd/m/Y - H:i:s');
				}
			])
		->order(['DATE(date) ASC'])->toArray();

		$this->set(compact('assessment'));
		$this->set('indexes', $indexes);
		$this->set('estudantes', $estudantes);
		$this->set('professores', $professores);
		$this->set('schedules', $schedules);
		$this->set('title', 'Cadastrar avaliação');
	}

	public function edit($id = null) {
		$assessment = $this->Assessment->get($id, ['contain' => []]);
		
		if ($this->request->is(['patch', 'post', 'put'])) {
			$assessment = $this->Assessment->patchEntity($assessment, $this->request->getData());
			if ($this->Assessment->save($assessment)) {
				$this->Flash->success(__('The assessment has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The assessment could not be saved. Please, try again.'));
		}

		$professores = $this->Teachers->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$estudantes = $this->Students->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();

		$this->set(compact('assessment'));
		$this->set('estudantes', $estudantes);
		$this->set('professores', $professores);
		$this->set('title', 'Alterar avaliação');
	}

	public function delete($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$assessment = $this->Assessment->get($id);
		if ($this->Assessment->delete($assessment)) {
			$this->Flash->success(__('A avaliação foi excluída com sucesso.'));
		} else {
			$this->Flash->error(__('Não foi possível excluir a avaliação, tente novamente.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
