<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DomainesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DomainesTable Test Case
 */
class DomainesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DomainesTable
     */
    public $Domaines;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.domaines'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Domaines') ? [] : ['className' => DomainesTable::class];
        $this->Domaines = TableRegistry::get('Domaines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Domaines);

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
}
