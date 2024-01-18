<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Sports Controller
 *
 * @property \App\Model\Table\SportsTable $Sports
 * @method \App\Model\Entity\Sport[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SportsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $sports = $this->paginate($this->Sports);

        $this->set(compact('sports'));
    }

    /**
     * View method
     *
     * @param string|null $id Sport id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sport = $this->Sports->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('sport'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sport = $this->Sports->newEmptyEntity();
        if ($this->request->is('post')) {
            $sport = $this->Sports->patchEntity($sport, $this->request->getData());
            if ($this->Sports->save($sport)) {
                $this->Flash->success(__('The sport has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sport could not be saved. Please, try again.'));
        }
        $this->set(compact('sport'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sport id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sport = $this->Sports->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sport = $this->Sports->patchEntity($sport, $this->request->getData());
            if ($this->Sports->save($sport)) {
                $this->Flash->success(__('The sport has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sport could not be saved. Please, try again.'));
        }
        $this->set(compact('sport'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sport id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sport = $this->Sports->get($id);
        if ($this->Sports->delete($sport)) {
            $this->Flash->success(__('The sport has been deleted.'));
        } else {
            $this->Flash->error(__('The sport could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
