<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShapeGroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShapeGroupsTable Test Case
 */
class ShapeGroupsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ShapeGroupsTable
     */
    public $ShapeGroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ShapeGroups',
        'app.OnlineGames',
        'app.Shapes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ShapeGroups') ? [] : ['className' => ShapeGroupsTable::class];
        $this->ShapeGroups = TableRegistry::getTableLocator()->get('ShapeGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ShapeGroups);

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
