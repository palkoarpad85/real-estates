<?php
use Migrations\AbstractMigration;

class ConvenienceGrades extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {$this->table('convenienceGrades')

        ->addColumn('active', 'boolean', [
            'default' => null,
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

        $this->table('convenienceGrades_i18n')

            ->addColumn('locale', 'string', [
                'default' => null,
                'limit' => 6,
                'null' => false,
            ])
            ->addColumn('model', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('foreign_key', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('field', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('content', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
           
            ->addColumn('modified', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
          
            ->addIndex(
                [
                    'locale',
                    'model',
                    'foreign_key',
                    'field',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'model',
                    'foreign_key',
                    'field',
                ]
            )
            ->create();
    }
}
