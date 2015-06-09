<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Projeto Controller
 *
 * @property \App\Model\Table\ProjetoTable $Projeto
 */
class ProjetoController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    
    public function index()
    {
        $this->loadModel('Usuario');

        $usuario = $this->Usuario->get($this->Auth->user('id'));        

        $this->paginate = [
            'conditions'=>[
                'id IN '=>$usuario->projetos,
                'status'=>'A'
            ]            
        ];
        $this->set('projeto', $this->paginate($this->Projeto));
        $this->set('_serialize', ['projeto']);
    }

    /**
     * View method
     *
     * @param string|null $id Projeto id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projeto = $this->Projeto->get($id, [
            'contain' => ['Tarefa']
        ]);
        
        $this->set('projeto', $projeto);
        $this->set('_serialize', ['projeto']);
    }
}
