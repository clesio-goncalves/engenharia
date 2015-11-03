<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Tarefa Controller
 *
 * @property \App\Model\Table\TarefaTable $Tarefa
 */
class TarefaController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index($projeto_id = null)
    {
        $this->paginate = [
            'contain' => ['Projeto'],
            'conditions'=>[
                'Projeto.id'=>$projeto_id,
                'Tarefa.status'=>'A'
            ]
        ];
        $this->set('tarefa', $this->paginate($this->Tarefa));
        $this->set(compact('projeto_id'));
        $this->set('_serialize', ['tarefa']);
    }

    /**
     * View method
     *
     * @param string|null $id Tarefa id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tarefa = $this->Tarefa->get($id, [
            'contain' => ['Projeto']            
        ]);
        $this->set('tarefa', $tarefa);
        $this->set('_serialize', ['tarefa']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add($projeto_id = null)
    {
        $tarefa = $this->Tarefa->newEntity();
        if ($this->request->is('post')) {
            $tarefa = $this->Tarefa->patchEntity($tarefa, $this->request->data);
            if ($this->Tarefa->save($tarefa)) {
                $this->Flash->success(__('The tarefa has been saved.'));
                return $this->redirect(['action' => 'index', $projeto_id]);
            } else {
                $this->Flash->error(__('The tarefa could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tarefa', 'projeto_id'));
        $this->set('_serialize', ['tarefa']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tarefa id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tarefa = $this->Tarefa->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tarefa = $this->Tarefa->patchEntity($tarefa, $this->request->data);
            if ($this->Tarefa->save($tarefa)) {
                $this->Flash->success(__('The tarefa has been saved.'));
                return $this->redirect(['action' => 'index', $tarefa->projeto_id]);
            } else {
                $this->Flash->error(__('The tarefa could not be saved. Please, try again.'));
            }
        }
        $projeto = $this->Tarefa->Projeto->find('list', [
            'limit' => 200,
            'conditions'=>[
                'Projeto.status'=>'A'
            ]
        ]);
        $this->set(compact('tarefa', 'projeto'));
        $this->set('_serialize', ['tarefa']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tarefa id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tarefa = $this->Tarefa->get($id);
        if ($this->Tarefa->delete($tarefa)) {
            $this->Flash->success(__('The tarefa has been deleted.'));
        } else {
            $this->Flash->error(__('The tarefa could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function finalizar($id=null){
        $tarefa = $this->Tarefa->get($id);
        $tarefa->status = 'F';
        if ($this->Tarefa->save($tarefa)) {
            $this->Flash->success(__('The tarefa has been saved.'));
            return $this->redirect(['action' => 'index', $tarefa->projeto_id]);
        } else {
            $this->Flash->error(__('The tarefa could not be saved. Please, try again.'));
        }
    }
}
