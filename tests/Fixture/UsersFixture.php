<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'role' => 'Lorem ipsum dolor sit amet',
                'username' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'prenom' => 'Lorem ipsum dolor sit amet',
                'nom' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-07-24 12:35:32',
                'modified' => '2022-07-24 12:35:32',
                'deleted' => '2022-07-24 12:35:32',
            ],
        ];
        parent::init();
    }
}
