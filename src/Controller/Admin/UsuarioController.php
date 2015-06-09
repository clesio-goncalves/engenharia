<?php
namespace App\Controller\Admin; 

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

/**
 * Usuario Controller
 *
 * @property \App\Model\Table\UsuarioTable $Usuario
 */
class UsuarioController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['add', 'login']);
    }

    public function home(){
        
    }
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('usuario', $this->paginate($this->Usuario));
        $this->set('_serialize', ['usuario']);
    }

    /**
     * View method
     *
     * @param string|null $id Usuario id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('ColaboradorProjeto');
        $usuario = $this->Usuario->get($id, [
            'contain' => ['ColaboradorProjeto']
        ]);
        $projetos = $this->ColaboradorProjeto->find('all', [
            'conditions'=>[
                'Projeto.id IN'=>$usuario->projetos,
                'Usuario.id'=>$id
            ],
            'contain'=>['Projeto', 'Usuario']
        ]);
        $this->set('usuario', $usuario);
        $this->set('projetos', $projetos);
        $this->set('_serialize', ['usuario']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usuario = $this->Usuario->newEntity();
        if ($this->request->is('post')) {
            $usuario = $this->Usuario->patchEntity($usuario, $this->request->data);
            if ($this->Usuario->save($usuario)) {
                $this->Flash->success('The usuario has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The usuario could not be saved. Please, try again.');
            }
        }
        $this->set(compact('usuario'));
        $this->set('_serialize', ['usuario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuario = $this->Usuario->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuario->patchEntity($usuario, $this->request->data);
            if ($this->Usuario->save($usuario)) {
                $this->Flash->success('The usuario has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The usuario could not be saved. Please, try again.');
            }
        }
        $this->set(compact('usuario'));
        $this->set('_serialize', ['usuario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuario id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Usuario->get($id);
        if ($this->Usuario->delete($usuario)) {
            $this->Flash->success('The usuario has been deleted.');
        } else {
            $this->Flash->error('The usuario could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
