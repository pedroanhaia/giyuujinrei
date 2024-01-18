<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * RelTeacherCore Controller
 *
 * @property \App\Model\Table\RelTeacherCoreTable $RelTeacherCore
 * @method \App\Model\Entity\RelTeacherCore[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RelTeacherCoreController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $relTeacherCore = $this->paginate($this->RelTeacherCore);

        $this->set(compact('relTeacherCore'));
    }

    /**
     * View method
     *
     * @param string|null $id Rel Teacher Core id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $relTeacherCore = $this->RelTeacherCore->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('relTeacherCore'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $relTeacherCore = $this->RelTeacherCore->newEmptyEntity();
        if ($this->request->is('post')) {
            $relTeacherCore = $this->RelTeacherCore->patchEntity($relTeacherCore, $this->request->getData());
            if ($this->RelTeacherCore->save($relTeacherCore)) {
                $this->Flash->success(__('The rel teacher core has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rel teacher core could not be saved. Please, try again.'));
        }
        $this->set(compact('relTeacherCore'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rel Teacher Core id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $relTeacherCore = $this->RelTeacherCore->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $relTeacherCore = $this->RelTeacherCore->patchEntity($relTeacherCore, $this->request->getData());
            if ($this->RelTeacherCore->save($relTeacherCore)) {
                $this->Flash->success(__('The rel teacher core has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rel teacher core could not be saved. Please, try again.'));
        }
        $this->set(compact('relTeacherCore'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rel Teacher Core id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $relTeacherCore = $this->RelTeacherCore->get($id);
        if ($this->RelTeacherCore->delete($relTeacherCore)) {
            $this->Flash->success(__('The rel teacher core has been deleted.'));
        } else {
            $this->Flash->error(__('The rel teacher core could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
