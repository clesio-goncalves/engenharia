<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Tarefa Controller
 *
 * @property \App\Model\Table\TarefaTable $Tarefa
 */
class TarefaController extends AppController
{

    public function beforeFilter(Event $event){
        $this->loadModel('ColaboradorProjeto');
        parent::beforeFilter($event);
    }
    /**
     * Index method
     *
     * @return void
     */
    public function index($projeto_id = null)
    {
        $this->loadModel('Projeto');
        
        $this->paginate = [
            'contain' => ['Projeto'],
            'conditions'=>[
                'Projeto.id'=>$projeto_id,
                'Tarefa.status'=>'A'
            ]
        ];
        
        $projeto = $this->Projeto->get($projeto_id);
        $colaborador_proj = $this->ColaboradorProjeto->find()        
            ->where([
                'projeto_id'=>$projeto_id, 
                'usuario_id'=>$this->Auth->user('id')
            ])->first();
        
        $this->set('tarefa', $this->paginate($this->Tarefa));
        $this->set(compact('colaborador_proj', 'projeto'));
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

    public function add($projeto_id = null)
    {
        $colaborador_proj = $this->ColaboradorProjeto->find('all')
            ->where([
                'projeto_id'=>$projeto_id, 
                'usuario_id'=>$this->Auth->user('id')
            ]);
        $colaborador_proj = $colaborador_proj->first();
        if(!$colaborador_proj->gerente){
            $this->Flash->error(__('Acesso negado!.'.$colaborador_proj->gerente));
            return $this->redirect(['action' => 'index', $projeto_id]);
        }
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
    
    public function finalizar($id=null){
        $tarefa = $this->Tarefa->get($id);
        $colaborador_proj = $this->ColaboradorProjeto->find()
            ->where(['projeto_id'=>$tarefa->projeto_id, 'usuario_id'=>$this->Auth->user('id')])
            ->first();
            

        if(!$colaborador_proj->gerente){
            $this->Flash->error(__('Acesso negado!.'.$colaborador_proj->gerente));
            return $this->redirect(['action' => 'index', $tarefa->projeto_id]);
        }

        $tarefa->status = 'F';
        if ($this->Tarefa->save($tarefa)) {
            $this->Flash->success(__('The tarefa has been saved.'));
            return $this->redirect(['action' => 'index', $tarefa->projeto_id]);
        } else {
            $this->Flash->error(__('The tarefa could not be saved. Please, try again.'));
        }
    }

}
