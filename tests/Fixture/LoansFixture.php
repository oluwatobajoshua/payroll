<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LoansFixture
 */
class LoansFixture extends TestFixture
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
                'employee_id' => 1,
                'principal' => 1.5,
                'tenor' => 1,
                'rate' => 1,
                'interest' => 1.5,
                'total' => 1.5,
                'deduction' => 1.5,
                'date' => '2022-09-02',
                'remark' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'status_id' => 1,
                'created' => '2022-09-02 10:45:02',
                'modified' => '2022-09-02 10:45:02',
            ],
        ];
        parent::init();
    }
}
