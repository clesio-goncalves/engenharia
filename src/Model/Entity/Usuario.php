<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
/**
 * Usuario Entity.
 */
class Usuario extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = ['*'=> true];

    protected function _setSenha($senha){
        return (new DefaultPasswordHasher)->hash($senha);
    }

    protected function _getProjetos()
    {
        $colaboradores = TableRegistry::get('ColaboradorProjeto');
        return $colaboradores->find('list',['valueField'=>'projeto_id'])
            ->where(['usuario_id' => $this->id, 'ativo'=>true])
            ->toArray();
    }
}
