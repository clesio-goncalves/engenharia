<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Acao Entity.
 */
class Acao extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'tipo' => true,
        'Observacao' => true,
        'data' => true,
        'tarefa_id' => true,
        'usuario_id' => true,
    ];
}
