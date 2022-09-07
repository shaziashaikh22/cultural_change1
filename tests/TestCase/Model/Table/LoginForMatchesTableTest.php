<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LoginForMatchesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LoginForMatchesTable Test Case
 */
class LoginForMatchesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LoginForMatchesTable
     */
    public $LoginForMatches;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.LoginForMatches',
        'app.Users',
        'app.OnlineGames',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('LoginForMatches') ? [] : ['className' => LoginForMatchesTable::class];
        $this->LoginForMatches = TableRegistry::getTableLocator()->get('LoginForMatches', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LoginForMatches);

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
