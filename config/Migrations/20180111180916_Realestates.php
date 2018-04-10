<?php
use Migrations\AbstractMigration;

class Realestates extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $this->table('realestates')

        ->addColumn('user_id', 'integer', [
            'limit' => 10,
            'null' => false,
        ])
        ->addColumn('type_id', 'integer', [
            'limit' => 10,
            'null' => true,
        ])
        ->addColumn('category_id', 'integer', [
            'limit' => 10,
            'null' => true,
        ])
        ->addColumn('convenienceGrade_id', 'integer', [
            'default' => null,
            'limit' => 10,
            'null' => true,
        ])
        ->addColumn('heatingType_id', 'integer', [
            'default' => null,
            'limit' => 10,
            'null' => true,
        ])
        ->addColumn('conditionOfProperty_id', 'integer', [
            'default' => null,
            'limit' => 10,
            'null' => true,
        ])
        ->addColumn('parking_id', 'integer', [
            'default' => null,
            'limit' => 10,
            'null' => true,
        ])

        ->addColumn('price', 'decimal', [
            'default' => null,
            'limit' => 10,
            'null' => false,
        ])
        ->addColumn('rooms_numbers', 'integer', [
            'default' => null,
            'limit' => 10,
            'null' => true,
        ])
        ->addColumn('half_room_numbers', 'integer', [
            'default' => null,
            'limit' => 10,
            'null' => true,
        ])
        ->addColumn('floor_number', 'integer', [
            'default' => null,
            'limit' => 10,
            'null' => true,
        ])
        ->addColumn('floor_number_sum', 'integer', [
            'default' => null,
            'limit' => 10,
            'null' => true,
        ])
        ->addColumn('floor_area', 'integer', [
            'default' => null,
            'limit' => 10,
            'null' => true,
        ])
        ->addColumn('land_area', 'integer', [
            'default' => null,
            'limit' => 10,
            'null' => true,
        ])
        ->addColumn('elevator', 'boolean', [
            'default' => null,
            'limit' => null,
            'null' => true,
        ])
        ->addColumn('external_storage', 'boolean', [
            'default' => null,
            'limit' => null,
            'null' => true,
        ])
        ->addColumn('comment', 'text', [
            'default' => null,
            'null' => false,
        ])
        ->addColumn('premium', 'datetime', [
            'default' => null,
            'null' => true,
        ])
        ->addColumn('visitors', 'integer', [
            'default' => null,
            'limit' => 10,
            'null' => true,
        ])
        ->addColumn('built_year', 'integer', [
            'default' => null,
            'limit' => 10,
            'null' => true,
        ])
        ->addColumn('zipCode', 'string', [
            'default' => null,
            'limit' => 10,
            'null' => true,
        ])
        ->addColumn('state', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ])
        ->addColumn('city', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ])
        ->addColumn('street', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ])
        ->addColumn('houseNumber', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ])
        ->addColumn('district', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ])
        ->addColumn('latitude', 'decimal', [
            'default' => null,
            'null' => false,
            'precision' => 10,
            'scale' => 8,
        ])
        ->addColumn('longitude', 'decimal', [
            'default' => null,
            'null' => false,
            'precision' => 11,
            'scale' => 8,
        ])
        ->addColumn('active', 'boolean', [
            'default' => null,
            'limit' => null,
            'null' => true,
        ])
        ->addColumn('created', 'timestamp', [
            'default' => 'CURRENT_TIMESTAMP',
            'null' => false,
        ])
        ->addColumn('created_by', 'integer', [
            'default' => null,
            'null' => false,
        ])
        ->addColumn('modified', 'timestamp', [
            'default' => 'CURRENT_TIMESTAMP',
            'null' => false,
        ])
        ->addColumn('modified_by', 'integer', [
            'default' => null,
            'null' => false,
        ])
        ->create();
    }
}
