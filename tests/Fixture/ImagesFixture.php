<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ImagesFixture
 */
class ImagesFixture extends TestFixture
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
                'file_dir' => 'Lorem ipsum dolor sit amet',
                'file' => 'Lorem ipsum dolor sit amet',
                'alt' => 'Lorem ipsum dolor sit amet',
                'product_id' => 1,
                'created' => '2022-07-24 12:35:24',
                'modified' => '2022-07-24 12:35:24',
                'deleted' => '2022-07-24 12:35:24',
            ],
        ];
        parent::init();
    }
}
