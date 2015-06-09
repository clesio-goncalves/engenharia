<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ColaboradorProjeto Controller
 *
 * @property \App\Model\Table\ColaboradorProjetoTable $ColaboradorProjeto
 */
class ColaboradorProjetoController extends AppController
{
  /**
     * Index method
     *
     * @return void
     */
    public function index($projeto_id = null)
    {
        $this->loadModel('Projeto');
        $this->loadModel('Usuario');

        $this->paginate = [
            'contain' => ['Projeto', 'Usuario'],
            'conditions'=>[
                'Projeto.id'=>$projeto_id,
                'ColaboradorProjeto.ativo'=>true,                
            ]
        ];



        $projeto = $this->Projeto->get($projeto_id);
        
        $usuarios = $this->Usuario->find('all')
            ->where([
                'NOT'=>['id IN '=>$projeto->usuarios],
                'admin'=>false
            ]);
        
        $this->set('colaboradorProjeto', $this->paginate($this->ColaboradorProjeto));
        $this->set(compact('usuarios', 'projeto_id'));
        $this->set('_serialize', ['colaboradorProjeto']);
    }

    /**
     * View method
     *
     * @param string|null $id Colaborador Projeto id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $colaboradorProjeto = $this->ColaboradorProjeto->get($id, [
            'contain' => ['Projeto', 'Usuario']
        ]);
        $this->set('colaboradorProjeto', $colaboradorProjeto);
        $this->set('_serialize', ['colaboradorProjeto']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add($projeto_id = null, $usuario_id=null, $gerente = false)
    {   
        
        if ($this->request->is('post')) {
            
            $colaboradorProjeto = $this->ColaboradorProjeto->newEntity();            
            $colaboradorProjeto->projeto_id = $projeto_id;
            $colaboradorProjeto->usuario_id = $usuario_id;
            $colaboradorProjeto->gerente = $gerente;
            $colaboradorProjeto->ativo = true;
            if ($this->ColaboradorProjeto->save($colaboradorProjeto)) {
                $this->Flash->success('The colaborador projeto has been saved.');
                return $this->redirect(['action' => 'index', $projeto_id]);
            } else {
                $this->Flash->error('The colaborador projeto could not be saved. Please, try again.');
            }
        }
        $projeto = $this->ColaboradorProjeto->Projeto->find('list', ['limit' => 200]);
        $usuario = $this->ColaboradorProjeto->Usuario->find('list', ['limit' => 200]);
        $this->set(compact('colaboradorProjeto', 'projeto', 'usuario'));
        $this->set('_serialize', ['colaboradorProjeto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Colaborador Projeto id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $colaboradorProjeto = $this->ColaboradorProjeto->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $colaboradorProjeto = $this->ColaboradorProjeto->patchEntity($colaboradorProjeto, $this->request->data);
            if ($this->ColaboradorProjeto->save($colaboradorProjeto)) {
                $this->Flash->success('The colaborador projeto has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The colaborador projeto could not be saved. Please, try again.');
            }
        }
        $projeto = $this->ColaboradorProjeto->Projeto->find('list', ['limit' => 200]);
        $usuario = $this->ColaboradorProjeto->Usuario->find('list', ['limit' => 200]);
        $this->set(compact('colaboradorProjeto', 'projeto', 'usuario'));
        $this->set('_serialize', ['colaboradorProjeto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Colaborador Projeto id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $colaboradorProjeto = $this->ColaboradorProjeto->get($id);
        if ($this->ColaboradorProjeto->delete($colaboradorProjeto)) {
            $this->Flash->success('The colaborador projeto has been deleted.');
        } else {
            $this->Flash->error('The colaborador projeto could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
