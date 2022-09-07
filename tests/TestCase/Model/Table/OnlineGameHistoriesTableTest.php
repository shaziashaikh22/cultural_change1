<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OnlineGameHistoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OnlineGameHistoriesTable Test Case
 */
class OnlineGameHistoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OnlineGameHistoriesTable
     */
    public $OnlineGameHistories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.OnlineGameHistories',
        'app.OnlineGames',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OnlineGameHistories') ? [] : ['className' => OnlineGameHistoriesTable::class];
        $this->OnlineGameHistories = TableRegistry::getTableLocator()->get('OnlineGameHistories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OnlineGameHistories);

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
