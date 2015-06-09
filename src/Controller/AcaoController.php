<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Acao Controller
 *
 * @property \App\Model\Table\AcaoTable $Acao
 */
class AcaoController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index($tarefa_id = null)
    {
        $this->paginate = [
            'conditions'=>[
                'tarefa_id'=>$tarefa_id,
                'usuario_id'=>$this->Auth->user('id')
            ]
        ];
        $this->set('acao', $this->paginate($this->Acao));
        $this->set('_serialize', ['acao']);
    }

    /**
     * View method
     *
     * @param string|null $id Acao id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $acao = $this->Acao->get($id, [
            'contain' => []
        ]);
        $this->set('acao', $acao);
        $this->set('_serialize', ['acao']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add($tarefa_id = null)
    {
        $acao = $this->Acao->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['tarefa_id']=$tarefa_id;
            $this->request->data['usuario_id']=$this->Auth->user('id');
            pr($this->request->data);
            $acao = $this->Acao->patchEntity($acao, $this->request->data);
            if ($this->Acao->save($acao)) {
                $this->Flash->success('The acao has been saved.');
                return $this->redirect(['action' => 'index', $tarefa_id]);
            } else {
                $this->Flash->error('The acao could not be saved. Please, try again.');
            }
        }
        $this->set(compact('acao', 'tarefa_id'));
        $this->set('_serialize', ['acao']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Acao id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $acao = $this->Acao->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $acao = $this->Acao->patchEntity($acao, $this->request->data);
            if ($this->Acao->save($acao)) {
                $this->Flash->success('The acao has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The acao could not be saved. Please, try again.');
            }
        }
        $this->set(compact('acao'));
        $this->set('_serialize', ['acao']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Acao id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $acao = $this->Acao->get($id);
        if ($this->Acao->delete($acao)) {
            $this->Flash->success('The acao has been deleted.');
        } else {
            $this->Flash->error('The acao could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
