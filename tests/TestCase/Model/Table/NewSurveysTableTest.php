<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NewSurveysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NewSurveysTable Test Case
 */
class NewSurveysTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NewSurveysTable
     */
    public $NewSurveys;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.NewSurveys',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('NewSurveys') ? [] : ['className' => NewSurveysTable::class];
        $this->NewSurveys = TableRegistry::getTableLocator()->get('NewSurveys', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NewSurveys);

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
