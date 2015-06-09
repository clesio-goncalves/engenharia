<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ColaboradorProjetoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ColaboradorProjetoTable Test Case
 */
class ColaboradorProjetoTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.colaborador_projeto',
        'app.projeto',
        'app.tarefa',
        'app.usuario'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ColaboradorProjeto') ? [] : ['className' => 'App\Model\Table\ColaboradorProjetoTable'];
        $this->ColaboradorProjeto = TableRegistry::get('ColaboradorProjeto', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ColaboradorProjeto);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
