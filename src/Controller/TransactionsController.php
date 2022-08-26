<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\I18n\Date;
use Cake\I18n\FrozenTime;

/**
 * Transactions Controller
 *
 * @property \App\Model\Table\TransactionsTable $Transactions
 * @method \App\Model\Entity\Transaction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransactionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $company = $this->Transactions->Companies->get(1);
        $transactions = $this->Transactions->find()->where(['Transactions.date' => new FrozenTime($company->date)]);
        $keyword = '';
        $staff_no = '';
        if($this->request->is('post'))
        {
            //delete using id
            $keyword = $this->request->getData('staff_no'); 
            
            if(!empty($keyword) && is_numeric($keyword)){
                //using find matching to get the transaction by staff no
                $trans= $this->Transactions->find()->where(['Transactions.date' => new FrozenTime($company->date)])->matching('Employees', function ($q) { 
                    $keyword = $this->request->getData('staff_no'); 
                    return $q->where(['Employees.staff_no' => $keyword]); });
                //debug($trans);
                if($trans->count()>0){
                    $transactions = $trans; 
                }else{
                    $this->Flash->error(__('There is no employee with staff no {0} ',$keyword));
                }
            }else{
                if(!empty($keyword) && is_string($keyword)){
                    $trans= $this->Transactions->find()->where(['Transactions.date' => new FrozenTime($company->date)])->matching('Employees', function ($q) { 
                        $keyword = $this->request->getData('staff_no'); 
                        return $q->where(['Employees.first_name LIKE'=> '%'.$keyword.'%']); });
                    if($trans->count()>0){
                        $transactions = $trans; 
                    }elseif($trans= $this->Transactions->find()->where(['Transactions.date' => new FrozenTime($company->date)])->matching('Employees', function ($q) { 
                        $keyword = $this->request->getData('staff_no'); 
                        return $q->where(['Employees.last_name LIKE'=> '%'.$keyword.'%']); })){
                        if($trans->count()>0){
                            $transactions = $trans; 
                        }else{
                            $this->Flash->error(__('There is no employee with first or last name {0} ',$keyword));
                        }                        
                    }
                }
            }
        }

        $this->paginate = [
            'contain' => ['Employees','Companies'],
            'limit' => 10
        ];
        $transactions = $this->paginate($transactions);

        $this->set(compact('transactions'));
    }

    /**
     * View method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transaction = $this->Transactions->get($id, [
            'contain' => ['Employees', 'Companies'],
        ]);

        $this->set(compact('transaction'));
    }

    /**
     * New Month
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function newMonth()
    {
        $this->request->allowMethod(['post', 'delete']);
        $company = $this->Transactions->Companies->get(1);
                
        $employees = $this->Transactions->Employees->find('all')->contain(['Cadres','Sections'])->where(['Employees.status_id' => 1]);        

        foreach($employees as $employeed){
            if($employeed->section){
                // debug($employeed);
            $transaction = $this->Transactions->newEntity(['associated' => 'Employees']);            
            $transaction->employee_id               = $employeed->id;
            $transaction->company_id                = $company->id;
            $transaction->section_id                = $employeed->section->id;
            $transaction->date                      = new FrozenTime($company->date);
            $transaction->basic_salary              = round(($employeed->salary/12),2);
            $transaction->transport_allowance       = round($employeed->transport_allowance/12,2); 
            $transaction->housing_allowance         = round($employeed->housing_allowance/12,2);
            $transaction->utility_allowance         = round($employeed->utility_allowance/12,2);
            $transaction->entertainment_allowance   = round($employeed->entertainment_allowance/12,2);
            $transaction->medical_allowance         = round($employeed->medical_allowance/12,2); 
            $transaction->other_allowance           = round($employeed->other_allowance/12,2);
            $transaction->union_due                 = round($employeed->salary/12 *($employeed->cadre->union_due * 0.01),2);
            $transaction->pension_deduction         = round((($employeed->salary + $employeed->housing_allowance + $employeed->transport_allowance)/12)*($employeed->cadre->pension * 0.01),2);
            $transaction->paye                      = round(($employeed->salary/12*($employeed->cadre->tax_due * 0.01)),2); 
            $transaction->ctcs                      = round($employeed->whl_cics + $employeed->bro_cics,2);            
            $transaction->personal_loan             = round((int)$employeed->pers_loan_rep,2); 
            $transaction->gross                     = round(($transaction->basic_salary + $transaction->transport_allowance + + $transaction->leave_allowance + 
                                                            $transaction->housing_allowance + $transaction->utility_allowance + $transaction->entertainment_allowance + 
                                                            $transaction->medical_allowance + $transaction->arrears + $transaction->other_allowance),2);            
            $transaction->total_deduction           = round(($transaction->paye + $transaction->personal_loan + $transaction->ctcs +
                                                            $transaction->salary_advance + $transaction->surcharge + $transaction->union_due + 
                                                            $transaction->pension_deduction + $transaction->bar_account + $transaction->other_deduction),2);
            $transaction->net_pay                   = round(($transaction->gross - $transaction->total_deduction),2);
            }

            // debug($transaction);

            if ($this->Transactions->save($transaction)) {                
                $this->Flash->success(__('The {0} has been saved', $employeed->full_name));
            }else{
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', $employeed->full_name));
            }            
        }
        
        $this->Flash->success(__('New months created successfully'));
        $this->redirect(['action'=>'index']);
        $this->autoRender = false;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($employeeid = null)
    {
        $company = $this->Transactions->Companies->get(1);   
        if ($this->request->is(['post']) && $this->request->getData('emp')) {
            // debug($this->request->getData()); 
            return $this->redirect(['action'=> 'add', $this->request->getData('emp')]);  
        }         
        $employeed = $this->Transactions->Employees->find('all')->contain(['Cadres','Sections'])->where(['Employees.id' => $employeeid,'Employees.status_id' => 1])->first(); 
        $employees = $this->Transactions->Employees->find('list')->contain(['Cadres','Sections']);           

        // foreach($employees as $employeed){
            if($employeed->section){
                //debug($employeed);
                $transaction = $this->Transactions->newEntity(['associated' => 'Employees']);
                $transaction->date                      = new FrozenTime($company->date);  
                $transaction->employee_id               = $employeed->id;   
                $transaction->basic_salary              = round(($employeed->salary/12),2);
                $transaction->transport_allowance       = round($employeed->transport_allowance/12,2); 
                $transaction->housing_allowance         = round($employeed->housing_allowance/12,2);
                $transaction->utility_allowance         = round($employeed->utility_allowance/12,2);
                $transaction->entertainment_allowance   = round($employeed->entertainment_allowance/12,2);
                $transaction->medical_allowance         = round($employeed->medical_allowance/12,2); 
                $transaction->other_allowance           = round($employeed->other_allowance/12,2);
                $transaction->union_due                 = round($employeed->salary/12 *($employeed->cadre->union_due * 0.01),2);
                $transaction->pension_deduction         = round((($employeed->salary + $employeed->housing_allowance + $employeed->transport_allowance)/12)*($employeed->cadre->pension * 0.01),2);
                $transaction->paye                      = round(($employeed->salary/12*($employeed->cadre->tax_due * 0.01)),2); 
                $transaction->ctcs                      = round($employeed->whl_cics + $employeed->bro_cics,2);            
                $transaction->personal_loan             = round((int)$employeed->pers_loan_rep,2); 
                $transaction->gross                     = round(($transaction->basic_salary + $transaction->transport_allowance + + $transaction->leave_allowance + 
                                                                $transaction->housing_allowance + $transaction->utility_allowance + $transaction->entertainment_allowance + 
                                                                $transaction->medical_allowance + $transaction->arrears + $transaction->other_allowance),2);            
                $transaction->total_deduction           = round(($transaction->paye + $transaction->personal_loan + $transaction->ctcs +
                                                                $transaction->salary_advance + $transaction->surcharge + $transaction->union_due + 
                                                                $transaction->pension_deduction + $transaction->bar_account + $transaction->other_deduction),2);
                $transaction->net_pay                   = round(($transaction->gross - $transaction->total_deduction),2);
            }
        // }
        if ($this->request->is(['post']) && !$this->request->getData('emp')) {
            $transaction = $this->Transactions->patchEntity($transaction, $this->request->getData());
            $transaction->employee_id               = $employeed->id;
            $transaction->company_id                = $company->id;
            $transaction->staff_no                  = $employeed->staff_no;
            $transaction->section_id                = $employeed->section->id;
            
            // debug($transaction);
            if ($this->Transactions->save($transaction)) {                
                $this->Flash->success(__('The {0} has been saved', $employeed->full_name));
            }else{
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', $employeed->full_name));
            } 
        }
        
        $this->set(compact('transaction','employees','employeed'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transaction = $this->Transactions->get($id, [
            'contain' => ['Employees','Companies']
        ]);
        $employees = $this->Transactions->Employees->find('list')->contain(['Cadres','Sections'])->where(['Employees.status_id' => 1]); 
        if ($this->request->is(['post']) && $this->request->getData('emp')) {
            $employeed = $this->Transactions->Employees->find('all')->contain(['Transactions'])->where(['Employees.id' => $this->request->getData('emp'),'Employees.status_id' => 1])->first(); 
            // debug($employeed->transactions[-1]); 
            // return $this->redirect(['action'=> 'add', $this->request->getData('emp')]);  
        } 
        if ($this->request->is(['patch', 'post', 'put'])) {

            $transaction = $this->Transactions->patchEntity($transaction, $this->request->getData());
            // debug($this->request->getData());
            $transaction->gross =   $transaction->basic_salary + 
                                    $transaction->transport_allowance + 
                                    $transaction->housing_allowance + 
                                    $transaction->utility_allowance + 
                                    $transaction->leave_allowance + 
                                    $transaction->entertainment_allowance + 
                                    $transaction->medical_allowance + 
                                    $transaction->arrears + 
                                    $transaction->other_allowance;
            
            $transaction->total_deduction   =   $transaction->paye + 
                                                $transaction->personal_loan + 
                                                $transaction->ctcs +
                                                $transaction->salary_advance + 
                                                $transaction->surcharge + 
                                                $transaction->union_due + 
                                                $transaction->pension_deduction + 
                                                $transaction->bar_account + 
                                                $transaction->other_deduction;
            //debug($transaction->total_deduction);
            $transaction->net_pay              =  $transaction->gross - $transaction->total_deduction;

            if ($this->Transactions->save($transaction)) {
                $this->Flash->success(__('The {0} has been saved.', 'Transaction'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Transaction'));
        }
        $employee = $this->Transactions->Employees->find('list')->where(['id' => $transaction->employee_id]);
        $companies = $this->Transactions->Companies->find('list')->where(['id' => $transaction->company_id]);
        $this->set(compact('transaction', 'employee','employees', 'companies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transaction = $this->Transactions->get($id);
        if ($this->Transactions->delete($transaction)) {
            $this->Flash->success(__('The transaction has been deleted.'));
        } else {
            $this->Flash->error(__('The transaction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
