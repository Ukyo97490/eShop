<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FeatureValuesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FeatureValuesTable Test Case
 */
class FeatureValuesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FeatureValuesTable
     */
    protected $FeatureValues;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.FeatureValues',
        'app.Features',
        'app.Products',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('FeatureValues') ? [] : ['className' => FeatureValuesTable::class];
        $this->FeatureValues = $this->getTableLocator()->get('FeatureValues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->FeatureValues);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FeatureValuesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\FeatureValuesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
