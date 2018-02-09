<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConveniencegradesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConveniencegradesTable Test Case
 */
class ConveniencegradesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ConveniencegradesTable
     */
    public $Conveniencegrades;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.conveniencegrades'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Conveniencegrades') ? [] : ['className' => ConveniencegradesTable::class];
        $this->Conveniencegrades = TableRegistry::get('Conveniencegrades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Conveniencegrades);

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
