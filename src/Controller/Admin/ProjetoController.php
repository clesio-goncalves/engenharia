<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Network\Email\Email;
use App\Form\NotificarForm;


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
        $this->paginate = [
            'conditions'=>[ 'status'=>'A'],
            'order'=>['id desc']
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

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projeto = $this->Projeto->newEntity();
        if ($this->request->is('post')) {
            $projeto = $this->Projeto->patchEntity($projeto, $this->request->data);
            if ($this->Projeto->save($projeto)) {
                $this->Flash->success(__('The projeto has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The projeto could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('projeto'));
        $this->set('_serialize', ['projeto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Projeto id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projeto = $this->Projeto->get($id);
        if($projeto->status=='F'){
            $this->Flash->error(__('Projeto ja finalizado, não pode ser alterado.'));
            return $this->redirect(['action' => 'index']);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projeto = $this->Projeto->patchEntity($projeto, $this->request->data);
            if ($this->Projeto->save($projeto)) {
                $this->Flash->success(__('The projeto has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The projeto could not be saved. Please, try again.'));
            }
        }
        $projeto->previsao = str_replace(" 00:00", "", $projeto->previsao);        
        $this->set(compact('projeto'));
        $this->set('_serialize', ['projeto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Projeto id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projeto = $this->Projeto->get($id);
        if ($this->Projeto->delete($projeto)) {
            $this->Flash->success(__('The projeto has been deleted.'));
        } else {
            $this->Flash->error(__('The projeto could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function finalizar($id=null){
        $projeto = $this->Projeto->get($id);
        $projeto->status = 'F';
        if ($this->Projeto->save($projeto)) {
            $this->Flash->success(__('The projeto has been saved.'));
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__('The projeto could not be saved. Please, try again.'));
        }
    }

    public function finalizados(){
        $this->paginate = [
            'conditions'=>[
                'status'=>'F'
            ]
        ];
        $this->set('projeto', $this->paginate($this->Projeto));
        $this->set('_serialize', ['projeto']);
    }

    public function notificar($id=null){
        $this->loadModel('Usuario');
        $notificar = new NotificarForm();
        $projeto = $this->Projeto->get($id);
        if ($this->request->is('post')) {            
            if ($notificar->execute($this->request->data)) {
                $caminho = 'email/projeto/'.$id."/";
                $email = new Email('default');
                if($this->request->data['anexo']['size']>0){    
                    $arquivo = $this->upload($caminho, $this->request->data['anexo']);
                    $email->attachments([
                        $this->request->data['anexo']['name'] => [
                            'file' => $arquivo,
                            'contentId' => 'anexo'
                        ]
                    ]);
                }            
                
                $usuarios = $this->Usuario->find('all')
                    ->where(['id IN'=>$projeto->usuarios]);

                $usuarios = $usuarios->toArray();
                $emails = [];
                foreach ($usuarios as $usuario) {
                    $emails[] = $usuario->email;
                }
                if(count($emails)<=0){
                    $this->Flash->error(__('Nenhum colaborador cadastrado para esse projeto.'));
                }else{
                    $email->from(['woshington@ifpi.edu.br' => 'Administrador'])
                        ->to($emails)
                        ->subject($this->request->data['assunto'])
                        ->send($this->request->data['texto']);
                    $this->Flash->success(__('Mensagem enviado, aguarde nosso retorno.'));
                }               
            } else {
                $this->Flash->error(__('Ocorreu um problema ao enviar sua mensagem.'));
            }
        }        
        $this->set('notificar', $notificar);
        $this->set('_serialize', ['notificar']);
        $this->set('projeto', $projeto);
    }

    public function form($id=null){

    }
}
