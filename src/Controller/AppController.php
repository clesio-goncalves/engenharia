<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;

use Cake\Event\Event;

use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()
    {
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => 'Controller',
            'authenticate' => [            
                'Form' => [
                    'userModel'=>'Usuario', 
                    'fields' => ['username' => 'email', 'password' => 'senha']
                ]
            ],
            'authError' => 'Acesso negado!',
            'loginAction' => [
                'controller' => 'usuario', 
                'action' => 'login',
                'prefix'=>false
            ],
            'loginRedirect' => [
                'controller' => 'projeto',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'projeto',
                'action' => 'index',
                'home'
            ]
        ]);
    }

    public function beforeFilter(Event $event)
    {
        // $this->Auth->allow(['index', 'view', 'display']);
        if($this->Auth->user()){
            $this->set('logado', $this->Auth->user());
            $this->layout = 'bootstrap';
        }else{
            $this->layout = 'login';
        }        
    }
    public function isAuthorized($user = null)
    {
        // Any registered user can access public functions
        if (empty($this->request->params['prefix'])) {
            return true;
        }

        // Only admins can access admin functions
        if ($this->request->params['prefix'] === 'admin') {
            return (bool)($user['admin'] === true);
        }        
        return false;
    }

    public function upload($dir, $arquivo, $nome=null){
        $uploaddir = WWW_ROOT.$dir;
        
        $folder = new Folder();
        $info = pathinfo($arquivo['name']);

        // $nome .= ".".$info['extension'];
        $nome=$arquivo['name'];


        $folder->create($uploaddir);
        $uploadfile = $uploaddir . basename($nome);

        if (move_uploaded_file($arquivo['tmp_name'], $uploadfile)) {
            return $uploadfile;
        } 
        return false;
    }
}
