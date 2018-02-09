<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PhonesRealestatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PhonesRealestatesTable Test Case
 */
class PhonesRealestatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PhonesRealestatesTable
     */
    public $PhonesRealestates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.phones_realestates',
        'app.phones',
        'app.realestates',
        'app.users',
        'app.phones_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PhonesRealestates') ? [] : ['className' => PhonesRealestatesTable::class];
        $this->PhonesRealestates = TableRegistry::get('PhonesRealestates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PhonesRealestates);

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
