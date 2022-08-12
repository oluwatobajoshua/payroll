<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProfilesFixture
 */
class ProfilesFixture extends TestFixture
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
                'last_name' => 'Lorem ipsum dolor sit amet',
                'first_name' => 'Lorem ipsum dolor sit amet',
                'dob' => '2022-08-08',
                'phone' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet',
                'passport' => 'Lorem ipsum dolor sit amet',
                'sign' => 'Lorem ipsum dolor sit amet',
                'status_id' => 1,
                'account_id' => 1,
                'user_id' => 1,
            ],
        ];
        parent::init();
    }
}
