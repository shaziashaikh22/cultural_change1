<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlayerSurveyQuestionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlayerSurveyQuestionsTable Test Case
 */
class PlayerSurveyQuestionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PlayerSurveyQuestionsTable
     */
    public $PlayerSurveyQuestions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PlayerSurveyQuestions',
        'app.PlayerSurveyAnswers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PlayerSurveyQuestions') ? [] : ['className' => PlayerSurveyQuestionsTable::class];
        $this->PlayerSurveyQuestions = TableRegistry::getTableLocator()->get('PlayerSurveyQuestions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PlayerSurveyQuestions);

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
