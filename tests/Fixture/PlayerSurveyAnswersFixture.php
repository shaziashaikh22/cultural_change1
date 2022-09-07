<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PlayerSurveyAnswersFixture
 */
class PlayerSurveyAnswersFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 100, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'player_survey_question_id' => ['type' => 'integer', 'length' => 100, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_type_id' => ['type' => 'integer', 'length' => 100, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_id' => ['type' => 'integer', 'length' => 100, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'answer_txt' => ['type' => 'string', 'length' => 1000, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'online_game_id' => ['type' => 'integer', 'length' => 100, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'status' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_20' => ['type' => 'index', 'columns' => ['online_game_id'], 'length' => []],
            'fk_21' => ['type' => 'index', 'columns' => ['player_survey_question_id'], 'length' => []],
            'fk_22' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
            'fk_23' => ['type' => 'index', 'columns' => ['user_type_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_20' => ['type' => 'foreign', 'columns' => ['online_game_id'], 'references' => ['online_games', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_21' => ['type' => 'foreign', 'columns' => ['player_survey_question_id'], 'references' => ['player_survey_questions', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_22' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_23' => ['type' => 'foreign', 'columns' => ['user_type_id'], 'references' => ['user_types', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'player_survey_question_id' => 1,
                'user_type_id' => 1,
                'user_id' => 1,
                'answer_txt' => 'Lorem ipsum dolor sit amet',
                'online_game_id' => 1,
                'status' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-04-18',
                'modified' => '2022-04-18',
            ],
        ];
        parent::init();
    }
}
