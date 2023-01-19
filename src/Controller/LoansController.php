<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Loans Controller
 *
 * @property \App\Model\Table\LoansTable $Loans
 * @method \App\Model\Entity\Loan[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LoansController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees', 'Statuses','LoanTypes'],
        ];
        $loans = $this->paginate($this->Loans);

        $this->set(compact('loans'));
    }

    /**
     * View method
     *
     * @param string|null $id Loan id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $loan = $this->Loans->get($id, [
            'contain' => ['Employees', 'Statuses'],
        ]);

        $this->set(compact('loan'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $loan = $this->Loans->newEmptyEntity();
        if ($this->request->is('post')) {
            $loan = $this->Loans->patchEntity($loan, $this->request->getData());
            if ($this->Loans->save($loan)) {
                $this->Flash->success(__('The loan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The loan could not be saved. Please, try again.'));
        }
        $employees = $this->Loans->Employees->find('list', ['limit' => 200])->all();
        $statuses = $this->Loans->Statuses->find('list', ['limit' => 200])->all();
        $loanTypes = $this->Loans->LoanTypes->find('list', ['limit' => 200])->all();
        $this->set(compact('loan', 'employees', 'statuses','loanTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Loan id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $loan = $this->Loans->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $loan = $this->Loans->patchEntity($loan, $this->request->getData());
            if ($this->Loans->save($loan)) {
                $this->Flash->success(__('The loan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The loan could not be saved. Please, try again.'));
        }
        $employees = $this->Loans->Employees->find('list', ['limit' => 200])->all();
        $statuses = $this->Loans->Statuses->find('list', ['limit' => 200])->all();
        $loanTypes = $this->Loans->LoanTypes->find('list', ['limit' => 200])->all();
        $this->set(compact('loan', 'employees', 'statuses','loanTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Loan id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $loan = $this->Loans->get($id);
        if ($this->Loans->delete($loan)) {
            $this->Flash->success(__('The loan has been deleted.'));
        } else {
            $this->Flash->error(__('The loan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Loan Calculator
     * 
     * @param double $principal
     * @param int $tenor
     * @param int $rate
     * @return \Cake\Http\Response | Ajax
     */
    public function calculate($principal=null,$tenor=null,$rate=null){

        $loan = $this->Loans->newEmptyEntity();

        $data = $this->request->getData('data');

        $loan->principal = $data['principal'];
        $loan->tenor = $data['tenor'];
        $loan->rate = $data['rate'];
        $loan->interest = ($loan->principal * ($loan->tenor + 1) * ($loan->rate * 0.01))/24;
        $loan->total = $loan->principal + $loan->interest;
        $loan->deduction  = $loan->total/$loan->tenor;

        if ($this->request->is('ajax')) {
            return $this->response->withType('application/json')
                ->withStringBody(json_encode($loan));
        }

        return $loan;
    }
}
