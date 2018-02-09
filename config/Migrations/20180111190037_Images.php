<?php
use Migrations\AbstractMigration;

class Images extends AbstractMigration
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
        $this->table('images')

        ->addColumn('realestate_id', 'integer', [
            'default' => null,
            'limit' => 10,
            'null' => false,

        ])

        ->addColumn('active', 'boolean', [
            'default' => 1,
            'limit' => null,
            'null' => false,
        ])
        ->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ])
        ->addColumn('created', 'timestamp', [
            'default' => 'CURRENT_TIMESTAMP',
            'limit' => null,
            'null' => false,
        ])
        ->addColumn('created_by', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ])
        ->addColumn('modified', 'timestamp', [
            'default' => 'CURRENT_TIMESTAMP',
            'limit' => null,
            'null' => false,
        ])
        ->addColumn('modified_by', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ])
        ->create();
    }
}
