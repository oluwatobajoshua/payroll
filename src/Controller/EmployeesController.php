<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Employees Controller
 *
 * @property \App\Model\Table\EmployeesTable $Employees
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Branches', 'Grades', 'Sections', 'Cadres', 'Banks', 'Genders', 'Religions', 'Locals', 'States', 'PhysicalPostures', 'MaritalStatuses', 'HighestEducations', 'Designations', 'Statuses', 'Users'],
        ];
        $employees = $this->paginate($this->Employees);

        $this->set(compact('employees'));
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => ['Branches', 'Grades', 'Sections', 'Cadres', 'Banks', 'Genders', 'Religions', 'Locals', 'States', 'PhysicalPostures', 'MaritalStatuses', 'HighestEducations', 'Designations', 'Statuses', 'Users', 'Addresses', 'ChildrenDetails', 'Companies', 'Educations', 'Leaves', 'NextOfKins', 'OtherDepartments', 'Transactions', 'WorkDetails'],
        ]);

        $this->set(compact('employee'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employee = $this->Employees->newEmptyEntity();
        if ($this->request->is('post')) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $branches = $this->Employees->Branches->find('list', ['limit' => 200])->all();
        $grades = $this->Employees->Grades->find('list', ['limit' => 200])->all();
        $sections = $this->Employees->Sections->find('list', ['limit' => 200])->all();
        $cadres = $this->Employees->Cadres->find('list', ['limit' => 200])->all();
        $banks = $this->Employees->Banks->find('list', ['limit' => 200])->all();
        $genders = $this->Employees->Genders->find('list', ['limit' => 200])->all();
        $religions = $this->Employees->Religions->find('list', ['limit' => 200])->all();
        $locals = $this->Employees->Locals->find('list', ['limit' => 200])->all();
        $states = $this->Employees->States->find('list', ['limit' => 200])->all();
        $physicalPostures = $this->Employees->PhysicalPostures->find('list', ['limit' => 200])->all();
        $maritalStatuses = $this->Employees->MaritalStatuses->find('list', ['limit' => 200])->all();
        $highestEducations = $this->Employees->HighestEducations->find('list', ['limit' => 200])->all();
        $designations = $this->Employees->Designations->find('list', ['limit' => 200])->all();
        $statuses = $this->Employees->Statuses->find('list', ['limit' => 200])->all();
        $users = $this->Employees->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('employee', 'branches', 'grades', 'sections', 'cadres', 'banks', 'genders', 'religions', 'locals', 'states', 'physicalPostures', 'maritalStatuses', 'highestEducations', 'designations', 'statuses', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => [],
        ]);


        
        $childCount         = $employee->children_details ? count($employee->children_details) : 0;
        $nextOfKinCount     = $employee->next_of_kins ? count($employee->next_of_kins) : 1;
        $educationCount     = $employee->educations ? count($employee->educations) : 1;
        $workCount          = $employee->work_details ? count($employee->work_details) : 1;
        $addressCount       = $employee->addresses ? count($employee->addresses) : 1;
        $otherDepartmentCount = $employee->other_departments ? count($employee->other_departments) : 1;
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $branches = $this->Employees->Branches->find('list', ['limit' => 200])->all();
        $grades = $this->Employees->Grades->find('list', ['limit' => 200])->all();
        $sections = $this->Employees->Sections->find('list', ['limit' => 200])->all();
        $cadres = $this->Employees->Cadres->find('list', ['limit' => 200])->all();
        $banks = $this->Employees->Banks->find('list', ['limit' => 200])->all();
        $genders = $this->Employees->Genders->find('list', ['limit' => 200])->all();
        $religions = $this->Employees->Religions->find('list', ['limit' => 200])->all();
        $locals = $this->Employees->Locals->find('list', ['limit' => 200])->all();
        $states = $this->Employees->States->find('list', ['limit' => 200])->all();
        $physicalPostures = $this->Employees->PhysicalPostures->find('list', ['limit' => 200])->all();
        $maritalStatuses = $this->Employees->MaritalStatuses->find('list', ['limit' => 200])->all();
        $highestEducations = $this->Employees->HighestEducations->find('list', ['limit' => 200])->all();
        $designations = $this->Employees->Designations->find('list', ['limit' => 200])->all();
        $statuses = $this->Employees->Statuses->find('list', ['limit' => 200])->all();
        $users = $this->Employees->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('childCount',
            'nextOfKinCount',
            'educationCount',
            'workCount',
            'addressCount',
            'otherDepartmentCount','employee', 'branches', 'grades', 'sections', 'cadres', 'banks', 'genders', 'religions', 'locals', 'states', 'physicalPostures', 'maritalStatuses', 'highestEducations', 'designations', 'statuses', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employees->get($id);
        if ($this->Employees->delete($employee)) {
            $this->Flash->success(__('The employee has been deleted.'));
        } else {
            $this->Flash->error(__('The employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
