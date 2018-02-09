<?php
use Migrations\AbstractMigration;

class Phones extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $this->table('phones')

        ->addColumn('active', 'boolean', [
            'default' => null,
            'limit' => null,
            'null' => false,
        ])
        ->addColumn('phoneNumber', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ])

        ->addColumn('created', 'timestamp', [
            'default' => 'CURRENT_TIMESTAMP',
            'limit' => null,
            'null' => false,
        ])
        ->addColumn('created_by', 'integer', [
            'default' => null,
            'limit' => 10,
            'null' => false,
        ])
        ->addColumn('modified', 'timestamp', [
            'default' => 'CURRENT_TIMESTAMP',
            'limit' => null,
            'null' => false,
        ])
        ->addColumn('modified_by', 'integer', [
            'default' => null,
            'limit' => 10,
            'null' => false,
        ])
        ->create();
    }
}
