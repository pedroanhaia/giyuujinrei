<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Indexes Controller
 *
 * @property \App\Model\Table\IndexesTable $Indexes
 * @method \App\Model\Entity\Index[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IndexesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $indexes = $this->paginate($this->Indexes);

        $this->set(compact('indexes'));
    }

    /**
     * View method
     *
     * @param string|null $id Index id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $index = $this->Indexes->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('index'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $index = $this->Indexes->newEmptyEntity();
        if ($this->request->is('post')) {
            $index = $this->Indexes->patchEntity($index, $this->request->getData());
            if ($this->Indexes->save($index)) {
                $this->Flash->success(__('The index has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The index could not be saved. Please, try again.'));
        }
        $this->set(compact('index'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Index id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $index = $this->Indexes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $index = $this->Indexes->patchEntity($index, $this->request->getData());
            if ($this->Indexes->save($index)) {
                $this->Flash->success(__('The index has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The index could not be saved. Please, try again.'));
        }
        $this->set(compact('index'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Index id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $index = $this->Indexes->get($id);
        if ($this->Indexes->delete($index)) {
            $this->Flash->success(__('The index has been deleted.'));
        } else {
            $this->Flash->error(__('The index could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
