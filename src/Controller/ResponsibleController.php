<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Responsible Controller
 *
 * @property \App\Model\Table\ResponsibleTable $Responsible
 * @method \App\Model\Entity\Responsible[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ResponsibleController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $responsible = $this->paginate($this->Responsible);

        $this->set(compact('responsible'));
    }

    /**
     * View method
     *
     * @param string|null $id Responsible id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $responsible = $this->Responsible->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('responsible'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $responsible = $this->Responsible->newEmptyEntity();
        if ($this->request->is('post')) {
            $responsible = $this->Responsible->patchEntity($responsible, $this->request->getData());
            if ($this->Responsible->save($responsible)) {
                $this->Flash->success(__('The responsible has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The responsible could not be saved. Please, try again.'));
        }
        $this->set(compact('responsible'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Responsible id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $responsible = $this->Responsible->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $responsible = $this->Responsible->patchEntity($responsible, $this->request->getData());
            if ($this->Responsible->save($responsible)) {
                $this->Flash->success(__('The responsible has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The responsible could not be saved. Please, try again.'));
        }
        $this->set(compact('responsible'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Responsible id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $responsible = $this->Responsible->get($id);
        if ($this->Responsible->delete($responsible)) {
            $this->Flash->success(__('The responsible has been deleted.'));
        } else {
            $this->Flash->error(__('The responsible could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
