<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cores Controller
 *
 * @property \App\Model\Table\CoresTable $Cores
 * @method \App\Model\Entity\Core[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CoresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $cores = $this->paginate($this->Cores);

        $this->set(compact('cores'));
    }

    /**
     * View method
     *
     * @param string|null $id Core id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $core = $this->Cores->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('core'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $core = $this->Cores->newEmptyEntity();
        if ($this->request->is('post')) {
            $core = $this->Cores->patchEntity($core, $this->request->getData());
            if ($this->Cores->save($core)) {
                $this->Flash->success(__('The core has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The core could not be saved. Please, try again.'));
        }
        $this->set(compact('core'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Core id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $core = $this->Cores->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $core = $this->Cores->patchEntity($core, $this->request->getData());
            if ($this->Cores->save($core)) {
                $this->Flash->success(__('The core has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The core could not be saved. Please, try again.'));
        }
        $this->set(compact('core'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Core id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $core = $this->Cores->get($id);
        if ($this->Cores->delete($core)) {
            $this->Flash->success(__('The core has been deleted.'));
        } else {
            $this->Flash->error(__('The core could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
