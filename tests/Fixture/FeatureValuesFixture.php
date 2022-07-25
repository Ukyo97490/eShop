<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FeatureValuesFixture
 */
class FeatureValuesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'feature_id' => 1,
                'created' => '2022-07-24 12:35:24',
                'modified' => '2022-07-24 12:35:24',
                'deleted' => '2022-07-24 12:35:24',
            ],
        ];
        parent::init();
    }
}
