<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
/**
 * Projeto Entity.
 */
class Projeto extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = ['*'=>true];

    protected function _getUsuarios()
    {
        $colaboradores = TableRegistry::get('ColaboradorProjeto');
        return $colaboradores->find('list',['valueField'=>'usuario_id'])
            ->where(['projeto_id' => $this->id, 'ativo'=>true])
            ->contain(['Usuario'])
            ->toArray();
    }
}
