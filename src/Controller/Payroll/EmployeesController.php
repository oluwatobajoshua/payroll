<?php
declare(strict_types=1);

namespace App\Controller\Payroll;

use App\Controller\AppController;

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
            'contain' => ['Cadres','Sections','Grades','Statuses'],
            // 'contain' => ['Branches', 'Grades', 'Sections', 'Cadres', 'Banks', 'Genders', 'Religions', 'Locals', 'States', 'PhysicalPostures', 'MaritalStatuses', 'HighestEducations', 'Designations', 'Statuses', 'Users'],
            'order' => [
                'Employees.id' => 'asc'
            ],
            'limit' => 100
        ];
        $employees = $this->paginate($this->Employees);

        // debug($this->request->getAttribute('paging'));

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
            'contain' => ['Branches', 'Grades', 'Sections', 'Cadres', 'Banks', 'Genders', 'Religions', 'Locals', 'States', 'PhysicalPostures', 'MaritalStatuses', 'HighestEducations', 'Designations', 'Statuses', 'Users', 'Addresses', 'ChildrenDetails', 'Companies', 'Educations', 'Leaves', 'NextOfKins', 'OtherDepartments', 'Transactions','WorkDetails'],
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
        $userId = $this->Authentication->getIdentity()->getIdentifier();
        // debug($userId);
        $employee = $this->Employees->newEmptyEntity();

        $childCount         =  0;
        $nextOfKinCount     =  1;
        $educationCount     =  1;
        $workCount          =  1;
        $addressCount       =  1;
        $otherDepartmentCount =  1;

        if ($this->request->is('post') && $this->request->getData('educationCount')) {
            $educationCount = $this->request->getData('educationCount');
            //debug($this->request->getData());
            //exit;
        }
        if ($this->request->is('post') && $this->request->getData('workCount')) {
            $workCount = $this->request->getData('workCount');
            //debug($this->request->getData());s
            //exit;
        }
        if ($this->request->is('post') && $this->request->getData('childCount')) {
            $childCount = $this->request->getData('childCount');
            //debug($this->request->getData());s
            //exit;
        }
        if ($this->request->is('post') && $this->request->getData('addressCount')) {
            $addressCount = $this->request->getData('addressCount');
            //debug($this->request->getData());s
            //exit;
        }

        if ($this->request->is('post')) {
            // debug($this->request->getData());
            // exit;
        }

        if ($this->request->is('post') && !$this->request->getData('workCount') && !$this->request->getData('childCount') && !$this->request->getData('educationCount')) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            $employee->user_id  = $userId;
            // debug($employee);exit;

            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $maritalStatuses = $this->Employees->MaritalStatuses->find('list', ['limit' => 200]);
        $physicalPostures = $this->Employees->PhysicalPostures->find('list', ['limit' => 200]);
        $genders = $this->Employees->Genders->find('list', ['limit' => 200]);
        $banks = $this->Employees->Banks->find('list', ['limit' => 200]);
        $religions = $this->Employees->Religions->find('list', ['limit' => 200]);
        $locals = $this->Employees->Locals->find('list');
        $states = $this->Employees->States->find('list', ['limit' => 200, 'order' => 'name']);
        $highestEducations = $this->Employees->HighestEducations->find('list', ['limit' => 200, 'order' => 'name']);
        $serviceCharges = $this->Employees->ServiceCharges->find('list', ['limit' => 200]);
        $sections = $this->Employees->Sections->find('list', ['limit' => 200, 'order' => 'name']);

        $grades = $this->Employees->Grades->find('list', ['limit' => 200]);
        $designations = $this->Employees->Designations->find('list', ['limit' => 200, 'order' => 'name']);
        $branches = $this->Employees->Branches->find('list', ['limit' => 200, 'order' => 'name']);
        $statuses = $this->Employees->Statuses->find('list', ['limit' => 200, 'order' => 'name']);
        $cadres = $this->Employees->Cadres->find('list', ['limit' => 200]);
        $relationships = $this->Employees->NextOfKins->Relationships->find('list', ['limit' => 200, 'order' => 'name']);
        $addressTypes = $this->Employees->Addresses->AddressTypes->find('list', ['limit' => 200]);
        $users = $this->Employees->Users->find('list', ['limit' => 200]);
        $viewVars = [
            'states',
            'physicalPostures',
            'genders',
            'maritalStatuses',
            'users',
            'religions',
            'highestEducations',
            'locals',
            'branches',
            'employee',
            'banks',
            'serviceCharges',
            'sections',
            'grades',
            'designations',
            'statuses',
            'cadres',
            'relationships',
            'addressTypes',
            'childCount',
            'nextOfKinCount',
            'educationCount',
            'workCount',
            'addressCount',
            'otherDepartmentCount'
        ];
        $this->set(compact($viewVars));
        if ($this->request->is('ajax')) {
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([$viewVars]));
        }
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
            'contain' => ['NextOfKins', 'WorkDetails', 'Educations', 'ChildrenDetails', 'Addresses', 'OtherDepartments.Sections'],
        ]);

        $childCount         = count($employee->children_details) ? count($employee->children_details) : 0;
        $nextOfKinCount     = count($employee->next_of_kins) ? count($employee->next_of_kins) : 1;
        $educationCount     = count($employee->educations) ? count($employee->educations) : 1;
        $workCount          = count($employee->work_details) ? count($employee->work_details) : 1;
        $addressCount       = count($employee->addresses) ? count($employee->addresses) : 1;
        $otherDepartmentCount = count($employee->other_departments) ? count($employee->other_departments) : 1;

        if ($this->request->is('post') && $this->request->getData('educationCount')) {
            $educationCount = $this->request->getData('educationCount');
            //debug($this->request->getData());
            //exit;
        }
        if ($this->request->is('post') && $this->request->getData('workCount')) {
            $workCount = $this->request->getData('workCount');
            //debug($this->request->getData());s
            //exit;
        }
        if ($this->request->is('post') && $this->request->getData('childCount')) {
            $childCount = $this->request->getData('childCount');
            //debug($this->request->getData());s
            //exit;
        }
        if ($this->request->is('post') && $this->request->getData('addressCount')) {
            $addressCount = $this->request->getData('addressCount');
            //debug($this->request->getData());s
            //exit;
        }

        //debug(count($employee->children_details));
        if ($this->request->is(['patch', 'post', 'put']) && !$this->request->getData('workCount') && !$this->request->getData('childCount') && !$this->request->getData('educationCount')) {
            //debug($this->request->getData()); exit;
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'view', $employee->id]);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }

        $maritalStatuses = $this->Employees->MaritalStatuses->find('list', ['limit' => 200]);
        $physicalPostures = $this->Employees->PhysicalPostures->find('list', ['limit' => 200]);
        $genders = $this->Employees->Genders->find('list', ['limit' => 200]);
        $banks = $this->Employees->Banks->find('list', ['limit' => 200]);
        $religions = $this->Employees->Religions->find('list', ['limit' => 200]);
        $locals = $this->Employees->Locals->find('list')->where(['Locals.state_id' => $employee->state_id]);
        $states = $this->Employees->States->find('list', ['limit' => 200, 'order' => 'name']);
        $highestEducations = $this->Employees->HighestEducations->find('list', ['limit' => 200, 'order' => 'name']);
        $serviceCharges = $this->Employees->ServiceCharges->find('list', ['limit' => 200]);
        $sections = $this->Employees->Sections->find('list', ['limit' => 200, 'order' => 'name']);

        $grades = $this->Employees->Grades->find('list', ['limit' => 200]);
        $designations = $this->Employees->Designations->find('list', ['limit' => 200, 'order' => 'name']);
        $branches = $this->Employees->Branches->find('list', ['limit' => 200, 'order' => 'name']);
        $statuses = $this->Employees->Statuses->find('list', ['limit' => 200, 'order' => 'name']);
        $cadres = $this->Employees->Cadres->find('list', ['limit' => 200]);
        $relationships = $this->Employees->NextOfKins->Relationships->find('list', ['limit' => 200, 'order' => 'name']);
        $addressTypes = $this->Employees->Addresses->AddressTypes->find('list', ['limit' => 200]);
        $users = $this->Employees->Users->find('list', ['limit' => 200]);
        $viewVars = [
            'states',
            'physicalPostures',
            'genders',
            'maritalStatuses',
            'users',
            'religions',
            'highestEducations',
            'locals',
            'branches',
            'employee',
            'banks',
            'serviceCharges',
            'sections',
            'grades',
            'designations',
            'statuses',
            'cadres',
            'relationships',
            'addressTypes',
            'childCount',
            'nextOfKinCount',
            'educationCount',
            'workCount',
            'addressCount',
            'otherDepartmentCount'
        ];
        $this->set(compact($viewVars));
        if ($this->request->is('ajax')) {
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([$viewVars]));
        }
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

    public function ajax()
    {
        $this->autoRender = false;
        $stateId = $this->request->getData('data');
        $locals = $this->Employees->Locals->find()->where(['Locals.state_id' => $stateId])->toArray();
        $json_data = json_encode($locals);
        $response = $this->response->withType('json')->withStringBody($json_data);
        return $response;
    }

    public function employee()
    {
        $this->autoRender = false;
        $employeeId = $this->request->getData('data');
        $employee = $this->Employees->get($employeeId, ['contain' => ['Cadres']]);
        $json_data = json_encode($employee);
        $response = $this->response->withType('json')->withStringBody($json_data);
        return $response;
    }
}
