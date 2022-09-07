<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlayerSurveyAnswersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlayerSurveyAnswersTable Test Case
 */
class PlayerSurveyAnswersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PlayerSurveyAnswersTable
     */
    public $PlayerSurveyAnswers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PlayerSurveyAnswers',
        'app.PlayerSurveyQuestions',
        'app.UserTypes',
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
        $config = TableRegistry::getTableLocator()->exists('PlayerSurveyAnswers') ? [] : ['className' => PlayerSurveyAnswersTable::class];
        $this->PlayerSurveyAnswers = TableRegistry::getTableLocator()->get('PlayerSurveyAnswers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PlayerSurveyAnswers);

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
