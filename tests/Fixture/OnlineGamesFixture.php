<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OnlineGamesFixture
 */
class OnlineGamesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 100, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'game_name' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'game_players_allowed' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'players_turn' => ['type' => 'integer', 'length' => 100, 'unsigned' => false, 'null' => true, 'default' => '3', 'comment' => '1st turn is for architect, when architect turn over this field will update for second player id i.e for carpenter', 'precision' => null, 'autoIncrement' => null],
        'survey_id' => ['type' => 'integer', 'length' => 100, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'shape_group_id' => ['type' => 'integer', 'length' => 100, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'status' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'start_time' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'foreign_key5' => ['type' => 'index', 'columns' => ['shape_group_id'], 'length' => []],
            'foreign_key6' => ['type' => 'index', 'columns' => ['survey_id'], 'length' => []],
            'foreign_key62' => ['type' => 'index', 'columns' => ['players_turn'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'foreign_key5' => ['type' => 'foreign', 'columns' => ['shape_group_id'], 'references' => ['shape_groups', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'foreign_key6' => ['type' => 'foreign', 'columns' => ['survey_id'], 'references' => ['surveys', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'game_name' => 'Lorem ipsum dolor sit amet',
                'game_players_allowed' => 'Lorem ipsum dolor sit amet',
                'players_turn' => 1,
                'survey_id' => 1,
                'shape_group_id' => 1,
                'status' => 'Lorem ipsum dolor sit amet',
                'start_time' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-02-18 06:05:37',
                'modified' => '2022-02-18 06:05:37',
            ],
        ];
        parent::init();
    }
}
