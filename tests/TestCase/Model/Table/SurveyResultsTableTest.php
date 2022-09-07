<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SurveyResultsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SurveyResultsTable Test Case
 */
class SurveyResultsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SurveyResultsTable
     */
    public $SurveyResults;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.SurveyResults',
        'app.Users',
        'app.UserTypes',
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
        $config = TableRegistry::getTableLocator()->exists('SurveyResults') ? [] : ['className' => SurveyResultsTable::class];
        $this->SurveyResults = TableRegistry::getTableLocator()->get('SurveyResults', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SurveyResults);

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
