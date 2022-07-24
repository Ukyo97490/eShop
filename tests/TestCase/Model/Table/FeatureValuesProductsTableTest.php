<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FeatureValuesProductsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FeatureValuesProductsTable Test Case
 */
class FeatureValuesProductsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FeatureValuesProductsTable
     */
    protected $FeatureValuesProducts;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.FeatureValuesProducts',
        'app.FeatureValues',
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
        $config = $this->getTableLocator()->exists('FeatureValuesProducts') ? [] : ['className' => FeatureValuesProductsTable::class];
        $this->FeatureValuesProducts = $this->getTableLocator()->get('FeatureValuesProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->FeatureValuesProducts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FeatureValuesProductsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\FeatureValuesProductsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
