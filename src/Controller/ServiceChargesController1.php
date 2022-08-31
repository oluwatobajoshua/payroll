<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * ServiceCharges Controller
 *
 * @property \App\Model\Table\ServiceChargesTable $ServiceCharges
 * @method \App\Model\Entity\ServiceCharge[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServiceChargesController extends AppController
{
    public function initialize(): void
    {
        $this->loadModel('Transactions');
        $this->loadModel('Employees');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Grades', 'Companies'],
        ];
        $serviceCharges = $this->paginate($this->ServiceCharges);

        $this->set(compact('serviceCharges'));
    }

    /**
     * View method
     *
     * @param string|null $id Service Charge id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $serviceCharge = $this->ServiceCharges->get($id, [
            'contain' => ['Grades', 'Companies'],
        ]);

        $this->set(compact('serviceCharge'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $serviceCharge = $this->ServiceCharges->newEntity([
            'contain' => []
        ]);
        if ($this->request->is('post')) {
            $serviceCharge = $this->ServiceCharges->patchEntity($serviceCharge, $this->request->getData());
            if ($this->ServiceCharges->save($serviceCharge)) {
                $this->Flash->success(__('The {0} has been saved.', 'Service Charge'));
                //get employee with service charge grade 
                $employees = $this->Employees->find('all')->where(['grade_id' => $serviceCharge->grade_id]);

                foreach ($employees as $emp) {
                    //get employee's transaction and update service charge
                    $transactions = $this->Transactions->find('all')->where(['employee_id' => $emp->id]);
                    foreach ($transactions as $trans) {
                        //update transactions with service charge amount 
                        $trans->service_charge = $serviceCharge->amount;
                        $trans->ilaya_xmas_bonus = $serviceCharge->ilaya_xmas_bonus;
                        $trans->end_of_year_bonus = $serviceCharge->end_of_year_bonus;
                        $trans->arrears = $serviceCharge->arrears;

                        //save trans 
                        $this->Transactions->save($trans);
                    }
                }

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Service Charge'));
        }
        $grades = $this->ServiceCharges->Grades->find('list', ['limit' => 200]);
        $companies = $this->ServiceCharges->Companies->find('list', ['limit' => 200]);
        $this->set(compact('serviceCharge', 'grades', 'companies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Service Charge id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('Transactions');
        $this->loadModel('Employees');

        $serviceCharge = $this->ServiceCharges->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $serviceCharge = $this->ServiceCharges->patchEntity($serviceCharge, $this->request->getData());
            if ($this->ServiceCharges->save($serviceCharge)) {
                $this->Flash->success(__('The {0} has been saved.', 'Service Charge'));
                //get employee with service charge grade 
                $employees = $this->Employees->find('all')->where(['grade_id' => $serviceCharge->grade_id]);

                foreach ($employees as $emp) {
                    //get employee's transaction and update service charge
                    $transactions = $this->Transactions->find('all')->where(['employee_id' => $emp->id]);
                    foreach ($transactions as $trans) {
                        //update transactions with service charge amount 
                        $trans->service_charge = $serviceCharge->amount;
                        $trans->ilaya_xmas_bonus = $serviceCharge->ilaya_xmas_bonus;
                        $trans->end_of_year_bonus = $serviceCharge->end_of_year_bonus;
                        $trans->arrears = $serviceCharge->arrears;
                        //save trans 
                        $this->Transactions->save($trans);
                    }
                }
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Service Charge'));
        }
        $grades = $this->ServiceCharges->Grades->find('list', ['limit' => 200]);
        $companies = $this->ServiceCharges->Companies->find('list', ['limit' => 200]);
        $this->set(compact('serviceCharge', 'grades', 'companies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Service Charge id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $serviceCharge = $this->ServiceCharges->get($id);
        if ($this->ServiceCharges->delete($serviceCharge)) {
            $this->Flash->success(__('The service charge has been deleted.'));
        } else {
            $this->Flash->error(__('The service charge could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
