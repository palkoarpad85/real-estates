<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HeatingtypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HeatingtypesTable Test Case
 */
class HeatingtypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HeatingtypesTable
     */
    public $Heatingtypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.heatingtypes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Heatingtypes') ? [] : ['className' => HeatingtypesTable::class];
        $this->Heatingtypes = TableRegistry::get('Heatingtypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Heatingtypes);

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
}
