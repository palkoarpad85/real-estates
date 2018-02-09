<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConditionofpropertiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConditionofpropertiesTable Test Case
 */
class ConditionofpropertiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ConditionofpropertiesTable
     */
    public $Conditionofproperties;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.conditionofproperties'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Conditionofproperties') ? [] : ['className' => ConditionofpropertiesTable::class];
        $this->Conditionofproperties = TableRegistry::get('Conditionofproperties', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Conditionofproperties);

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
