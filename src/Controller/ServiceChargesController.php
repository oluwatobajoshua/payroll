<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenDate;

/**
 * ServiceCharges Controller
 *
 * @property \App\Model\Table\ServiceChargesTable $ServiceCharges
 * @method \App\Model\Entity\ServiceCharge[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServiceChargesController extends AppController
{
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
        $serviceCharge = $this->ServiceCharges->newEmptyEntity();
        $company = $this->ServiceCharges->Companies->get(1);
        // debug($company);
        $trans = $this->ServiceCharges->Grades->Employees->Transactions->find()->where(['date' => new FrozenDate($company->date)])->count();

        if (!$trans) {
            // debug($trans);
            $this->Flash->error(__('Please perform transaction for the new month before adding service charge'));
            return $this->redirect(['controller'=>'Transactions','action' => 'index']);
            // exit;
        }

        if ($this->request->is('post')) {
            $serviceCharge = $this->ServiceCharges->patchEntity($serviceCharge, $this->request->getData());
            if ($this->ServiceCharges->save($serviceCharge)) {
                $this->Flash->success(__('The service charge has been saved.'));
                //get employee with service charge grade 
                $employees = $this->ServiceCharges->Grades->Employees->find('all')->where(['grade_id' => $serviceCharge->grade_id]);
                // debug($employees->all());exit;
                foreach ($employees as $emp) {
                    //get employee's transaction and update service charge
                    $transactions = $this->ServiceCharges->Grades->Employees->Transactions->find('all')->where(['employee_id' => $emp->id]);
                    foreach ($transactions as $trans) {
                        //update transactions with service charge amount 
                        $trans->service_charge = $serviceCharge->amount;
                        $trans->ilaya_xmas_bonus = $serviceCharge->ilaya_xmas_bonus;
                        $trans->end_of_year_bonus = $serviceCharge->end_of_year_bonus;
                        $trans->arrears = $serviceCharge->arrears;

                        //save trans 
                        $this->ServiceCharges->Grades->Employees->Transactions->save($trans);
                    }
                }

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The service charge could not be saved. Please, try again.'));
        }
        $grades = $this->ServiceCharges->Grades->find('list', ['limit' => 200])->all();
        $companies = $this->ServiceCharges->Companies->find('list', ['limit' => 200])->all();
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
        $serviceCharge = $this->ServiceCharges->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $serviceCharge = $this->ServiceCharges->patchEntity($serviceCharge, $this->request->getData());
            if ($this->ServiceCharges->save($serviceCharge)) {
                $this->Flash->success(__('The service charge has been saved.'));

                //get employee with service charge grade 
                $employees = $this->ServiceCharges->Grades->Employees->find('all')->where(['grade_id' => $serviceCharge->grade_id]);
                // debug($employees->all());exit;

                foreach ($employees as $emp) {
                    //get employee's transaction and update service charge
                    $transactions = $this->ServiceCharges->Grades->Employees->Transactions->find('all')->where(['employee_id' => $emp->id]);
                    foreach ($transactions as $trans) {
                        //update transactions with service charge amount 
                        $trans->service_charge = $serviceCharge->amount;
                        $trans->ilaya_xmas_bonus = $serviceCharge->ilaya_xmas_bonus;
                        $trans->end_of_year_bonus = $serviceCharge->end_of_year_bonus;
                        $trans->arrears = $serviceCharge->arrears;
                        //save trans git
                        $this->ServiceCharges->Grades->Employees->Transactions->save($trans);
                    }
                }

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The service charge could not be saved. Please, try again.'));
        }
        $grades = $this->ServiceCharges->Grades->find('list', ['limit' => 200])->all();
        $companies = $this->ServiceCharges->Companies->find('list', ['limit' => 200])->all();
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
