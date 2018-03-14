<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SharesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SharesTable Test Case
 */
class SharesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SharesTable
     */
    public $Shares;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.shares',
        'app.posts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Shares') ? [] : ['className' => SharesTable::class];
        $this->Shares = TableRegistry::get('Shares', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Shares);

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
