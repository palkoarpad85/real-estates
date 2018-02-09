<?php
use Migrations\AbstractMigration;

class UsersPhones extends AbstractMigration
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
        $this->table('phones_users')


            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])


            ->addColumn('phone_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])

            ->create();
    }
}
