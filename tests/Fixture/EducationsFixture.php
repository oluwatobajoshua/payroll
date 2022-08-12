<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EducationsFixture
 */
class EducationsFixture extends TestFixture
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
                'institution' => 'Lorem ipsum dolor sit amet',
                'highest_education_id' => 1,
                'course_of_study' => 'Lorem ipsum dolor sit amet',
                'date' => '2022-08-05',
                'created' => '2022-08-05 21:24:34',
                'modified' => '2022-08-05 21:24:34',
            ],
        ];
        parent::init();
    }
}
