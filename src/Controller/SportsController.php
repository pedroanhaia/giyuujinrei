<?php
declare(strict_types=1);

namespace App\Controller;

class SportsController extends AppController {
	public function index() {
		$this->paginate = [
			'limit' => 25,
			'order' => ['Schedules.id' => 'DESC'],
			'contain' => [
				'Cores' => ['fields' => ['name']],
			],
		];

		$sports = $this->paginate($this->Sports);

		$this->set(compact('sports'));
		$this->set('title', 'Lista de esportes');
	}

	public function view($id = null) {
		$sport = $this->Sports->get($id, [
			'contain' => [],
		]);

		$this->set(compact('sport'));
		$this->set('title', 'Visualizar esporte');
	}

	public function add() {
		$sport = $this->Sports->newEmptyEntity();
		if ($this->request->is('post')) {
			$sport = $this->Sports->patchEntity($sport, $this->request->getData());

			if ($this->Sports->save($sport)) {
				$this->Flash->success(__('O esporte foi salvo com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvar o esporte, tente novamente.'));
		}

		$this->set(compact('sport'));
		$this->set('title', 'Cadastrar esporte');
	}

	public function edit($id = null) {
		$sport = $this->Sports->get($id, [
			'contain' => [],
		]);

		if ($this->request->is(['patch', 'post', 'put'])) {
			$sport = $this->Sports->patchEntity($sport, $this->request->getData());
			
			if ($this->Sports->save($sport)) {
				$this->Flash->success(__('O esporte foi salvo com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvar o esporte, tente novamente.'));
		}

		$this->set(compact('sport'));
		$this->set('title', 'Alterar esporte');
	}

	public function delete($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$sport = $this->Sports->get($id);

		if ($this->Sports->delete($sport)) {
			$this->Flash->success(__('O esporte foi excuído com sucesso.'));
		} else {
			$this->Flash->error(__('Não foi possível excluir o esporte, tente novamente.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
