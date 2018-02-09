<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RealestatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RealestatesTable Test Case
 */
class RealestatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RealestatesTable
     */
    public $Realestates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.realestates',
        'app.users',
        'app.phones',
        'app.phones_realestates',
        'app.phones_users',
        'app.roles',
        'app.permissions',
        'app.permissions_roles',
        'app.roles_users',
        'app.types',
        'app.categories',
        'app.convenience_grades',
        'app.heating_types',
        'app.condition_of_properties',
        'app.parkings',
        'app.images'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Realestates') ? [] : ['className' => RealestatesTable::class];
        $this->Realestates = TableRegistry::get('Realestates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Realestates);

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
