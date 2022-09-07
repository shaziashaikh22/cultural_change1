<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GameStepsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GameStepsTable Test Case
 */
class GameStepsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GameStepsTable
     */
    public $GameSteps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.GameSteps',
        'app.Results',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('GameSteps') ? [] : ['className' => GameStepsTable::class];
        $this->GameSteps = TableRegistry::getTableLocator()->get('GameSteps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GameSteps);

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
