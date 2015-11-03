<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ColaboradorProjetoFixture
 *
 */
class ColaboradorProjetoFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'colaborador_projeto';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'projeto_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'usuario_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'gerente' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null],
        'ativo' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => '1', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_projeto_has_usuario_usuario1_idx' => ['type' => 'index', 'columns' => ['usuario_id'], 'length' => []],
            'fk_projeto_has_usuario_projeto1_idx' => ['type' => 'index', 'columns' => ['projeto_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['projeto_id', 'usuario_id'], 'length' => []],
            'fk_projeto_has_usuario_projeto1' => ['type' => 'foreign', 'columns' => ['projeto_id'], 'references' => ['projeto', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_projeto_has_usuario_usuario1' => ['type' => 'foreign', 'columns' => ['usuario_id'], 'references' => ['usuario', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'projeto_id' => 1,
            'usuario_id' => 1,
            'gerente' => 1,
            'ativo' => 1
        ],
    ];
}
