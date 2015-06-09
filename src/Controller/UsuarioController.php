<?php
namespace App\Controller;

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
        $usuario = $this->Usuario->get($id, [
            'contain' => ['ColaboradorProjeto']
        ]);
        $this->set('usuario', $usuario);
        $this->set('_serialize', ['usuario']);
    }
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                if($this->Auth->user('admin')){
                    return $this->redirect(['prefix'=>'admin', 'controller'=>'projeto']);
                }else{
                    return $this->redirect(['prefix'=>false, 'controller'=>'projeto']);
                }
                
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
