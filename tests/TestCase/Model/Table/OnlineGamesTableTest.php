<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OnlineGamesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OnlineGamesTable Test Case
 */
class OnlineGamesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OnlineGamesTable
     */
    public $OnlineGames;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.OnlineGames',
        'app.UserTypes',
        'app.Surveys',
        'app.ShapeGroups',
        'app.LoginForMatches',
        'app.OnlineGameHistories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OnlineGames') ? [] : ['className' => OnlineGamesTable::class];
        $this->OnlineGames = TableRegistry::getTableLocator()->get('OnlineGames', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OnlineGames);

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
