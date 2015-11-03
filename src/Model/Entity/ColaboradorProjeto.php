<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ColaboradorProjeto Entity.
 */
class ColaboradorProjeto extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'gerente' => true,
        'ativo' => true,
        'projeto' => true,
        'usuario' => true,
    ];
}
