<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PhonesUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PhonesUsersTable Test Case
 */
class PhonesUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PhonesUsersTable
     */
    public $PhonesUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.phones_users',
        'app.users',
        'app.phones',
        'app.realestates',
        'app.phones_realestates'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PhonesUsers') ? [] : ['className' => PhonesUsersTable::class];
        $this->PhonesUsers = TableRegistry::get('PhonesUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PhonesUsers);

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
