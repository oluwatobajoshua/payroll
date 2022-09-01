<?php

use Cake\I18n\FrozenTime;

?>
<style>
  td {
    border: 1px solid black;
    margin: 1px;
    padding: 2px;
    width: 100%;
  }

  th {
    border: 1px solid black;
    vertical-align: top;
    text-align: center;
    padding: 2px;
  }
</style>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <?= $this->Form->create(null, ['id' => 'empForm']) ?>
        <div class="callout callout-info">
          <div class="row">
            <?php
            $this->Form->setTemplates([
              'inputContainer' => '<div class="form-group input col-md-3 col-xs-6 {{type}} {{required}}">{{content}}</div>'
            ]);

            echo $this->Form->control('branch', ['options' => $branches, 'empty' => 'Select branch', 'title' => 'Select a Cadre', 'rel' => 'tooltip', 'onChange' => 'document.getElementById("empForm").submit();']);
            echo $this->Form->control('cadre', ['options' => $cadres, 'empty' => 'Select a cadre', 'title' => 'Select a Cadre', 'rel' => 'tooltip', 'onChange' => 'document.getElementById("empForm").submit();']);
            echo $this->Form->control('highest_education_id', ['options' => $highestEducations, 'empty' => 'Select Education', 'title' => 'Highest Education', 'rel' => 'tooltip', 'onChange' => 'document.getElementById("empForm").submit();']);
            echo $this->Form->control('section', ['options' => $depts, 'empty' => 'Select Education', 'title' => 'Please select a branch before selecting a section', 'rel' => 'tooltip', 'onChange' => 'document.getElementById("empForm").submit();']);

            ?>
          </div>
        </div>
        <?= $this->Form->end() ?>

        <div class="invoice p-3 mb-3">
          <!-- title row -->
          <div class="row">
            <div class="col-12">
              <h5>
                <?= h($company->name) ?>
                <?php if ($bName) {
                  echo '(';
                  echo ($bName->name);
                  echo ')';
                } ?>
              </h5>
              <?php if ($cName) {
                echo $cName->name;
              }
              ?>
              PAYROLL REGISTER FOR <?= h(strtoupper($company->date->format('M, Y'))) ?>
            </div>
            <!-- /.col -->
          </div>

          <!-- Table row -->
          <div class="row">
            <div class="col-12 table-responsive">
              <table>
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>STAFF<br>NO</th>
                    <th>GRADE</th>
                    <th style="white-space:nowrap;">NAME OF STAFF </th>
                    <th>SALARY</th>
                    <th>GENDER</th>
                    <th>DATE OF BIRTH</th>
                    <th>AGE</th>
                    <th><?= $this->Paginator->sort('date_joined', 'DATE JOINED') ?></th>
                    <th>TENOR</th>
                    <th>DEPARTMENT</th>
                    <th>STATE OF ORIGIN</th>
                    <th>LOCAL GOVT.</th>
                    <th>DESIGNATION</th>
                    <th>CADRE</th>
                    <th>MARITAL STATUS</th>
                    <th>RELIGION</th>
                    <th><?= $this->Paginator->sort('highest_education_id', 'HIGHEST EDUCATION') ?></th>
                    <th>EXPERIENCE</th>
                    <th>OTHER DEPARTMENT</th>
                    <th>NEXT OF KIN</th>
                    <th>WORK DETAILS</th>
                    <th>CHILDREN</th>
                    <th>EDUCATION</th>
                  </tr>

                  <?php $empId  = 0 ?>
                  <?php foreach ($sections as $section) : ?>
                    <?php if (count($section->employees) > 0) : ?>
                      <!--
                    <tr style="text-align:center">
                        <th colspan="24">
                            <h5> <?= h($section->name); ?> </h5>
                        </th>
                    </tr>-->
                </thead>
                <tbody>
                  <?php foreach ($section->employees as $employee) : $empId++; ?>
                    <tr>
                      <td style="text-align:center;width:5px"><?= h($empId) ?></td>
                      <td style="text-align:center"><?= h($employee->staff_no) ?></td>
                      <td style="text-align:center"><?= h($employee->grade->name) ?></td>
                      <td style="text-align:left;"><?= h($employee->full_name) ?></td>
                      <td><?= $this->Number->precision($employee->salary, 2) ?></td>
                      <td><?= h($employee->gender->name) ?></td>
                      <td><?= h($employee->date_of_birth) ?></td>
                      <td><?= h($employee->date_of_birth->diff(new FrozenTime())->format('%y years old')) ?></td>
                      <td><?= h($employee->date_joined) ?></td>
                      <td><?= h($employee->date_joined->diff(new FrozenTime('-1 day'))->format('%y years %m months and %d days')) ?></td>
                      <td><?= h($section->name) ?></td>
                      <!-- <td><?= h($employee->state->name) ?></td> -->
                      <td><?= h($employee->local->name) ?></td>
                      <td><?= h($employee->designation->name) ?></td>
                      <td><?= h($employee->cadre->name) ?></td>
                      <td><?= h($employee->marital_status->name) ?></td>
                      <td><?= h($employee->religion->name) ?></td>
                      <td><?= h($employee->highest_education->name) ?></td>
                      <td><?= h($employee->years_of_experience ? $employee->years_of_experience . ' Years' : '') ?></td>
                      <td>
                        <?php foreach ($employee->other_departments as $other_department) : ?>
                          <p><?= h($other_department ? $other_department->section->name : '') ?></p>
                        <?php endforeach; ?>
                      </td>
                      <td>
                        <?php if ($employee->next_of_kins) : ?>
                          <table>
                            <thead>
                              <th>Name</th>
                              <th>Relationship</th>
                            </thead>
                            <tbody>
                              <?php foreach ($employee->next_of_kins as $next_of_kin) : ?>
                                <tr>
                                  <td><?= h($next_of_kin->name) ?></td>
                                  <td><?= h($next_of_kin->relationship->name) ?></td>
                                </tr>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                        <?php endif; ?>
                      </td>
                      <td>
                        <?php if ($employee->work_details) : ?>
                          <table>
                            <thead>
                              <th>SN</th>
                              <th>Organization</th>
                              <th>Demartment</th>
                              <th>Job Title</th>
                              <th>Year</th>
                            </thead>
                            <tbody>
                              <?php $id = 0;
                              foreach ($employee->work_details as $work) : $id++ ?>
                                <tr>
                                  <td><?= h($id); ?>
                                  <td><?= h($work->organization) ?></td>
                                  <td><?= h($work->section) ?></td>
                                  <td><?= h($work->job_title) ?></td>
                                  <td><?= h($work->end_date) ?></td>
                                <tr>
                                <?php endforeach ?>
                            </tbody>
                          </table>
                        <?php endif; ?>
                      </td>
                      <td style="text-align:center"><?= h($employee->children_details ? count($employee->children_details) : 'None') ?></td>
                      <td>
                        <!-- eduction -->
                        <?php if ($employee->educations) : ?>
                          <table>
                            <thead>
                              <th>SN</th>
                              <th>Institution</th>
                              <th>Course of Study</th>
                              <th>Year</th>
                            </thead>
                            <tbody>
                              <?php $id = 0;
                              foreach ($employee->educations as $education) : $id++ ?>
                                <tr>
                                  <td><?= h($id) ?></td>
                                  <td><?= h($education->institution) ?></td>
                                  <td><?= h($education->course_of_study) ?></td>
                                  <td><?= h($education->date) ?></td>
                                </tr>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              <?php endif ?>
            <?php endforeach  ?>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.invoice -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</section>