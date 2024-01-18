<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Assessment Controller
 *
 * @property \App\Model\Table\AssessmentTable $Assessment
 * @method \App\Model\Entity\Assessment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AssessmentController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $assessment = $this->paginate($this->Assessment);

        $this->set(compact('assessment'));
    }

    /**
     * View method
     *
     * @param string|null $id Assessment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $assessment = $this->Assessment->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('assessment'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $assessment = $this->Assessment->newEmptyEntity();
        if ($this->request->is('post')) {
            $assessment = $this->Assessment->patchEntity($assessment, $this->request->getData());
            if ($this->Assessment->save($assessment)) {
                $this->Flash->success(__('The assessment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The assessment could not be saved. Please, try again.'));
        }
        $this->set(compact('assessment'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Assessment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $assessment = $this->Assessment->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $assessment = $this->Assessment->patchEntity($assessment, $this->request->getData());
            if ($this->Assessment->save($assessment)) {
                $this->Flash->success(__('The assessment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The assessment could not be saved. Please, try again.'));
        }
        $this->set(compact('assessment'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Assessment id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $assessment = $this->Assessment->get($id);
        if ($this->Assessment->delete($assessment)) {
            $this->Flash->success(__('The assessment has been deleted.'));
        } else {
            $this->Flash->error(__('The assessment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
