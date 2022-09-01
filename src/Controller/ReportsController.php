<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\I18n\Date;
use Cake\I18n\FrozenDate;

/**
 * Reports Controller
 *
 * @property \App\Model\Table\ReportsTable $Reports
 *
 * @method \App\Model\Entity\Report[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReportsController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Sections');
        $this->loadModel('Companies');
        $this->loadModel('Cadres');
        $this->loadModel('Banks');
        $this->loadModel('Employees');
    }

    /**
     * payrollRegister method
     *
     * @return \Cake\Http\Response|null
     */
    public function bio()
    {  
        $employees = $this->Employees->find();
        // $employees->select([
        //     'id',
        //     'staff_no',
        //     'grade' => 'Grades.name',
        //     'salary',
        //     'name' => $employees->func()->concat(['Employees.first_name' => 'identifier',' ','Employees.last_name' => 'identifier']),
        //     'gender' => 'Genders.name',
        //     'date_of_birth',
        //     'age' => $employees->func()->dateDiff(['NOW()' => 'literal','Employees.date_of_birth' => 'identifier']),
        //     'date_joined',
        //     'tenor' => $employees->func()->dateDiff(['NOW()' => 'literal','Employees.date_joined' => 'identifier']),
        //     'section' => 'Sections.name',
        //     'state' => 'StateOfOrigins.name',
        //     'lg' => 'Locals.name',
        //     'cadre' => 'Cadres.name',
        //     'marital_status' => 'MaritalStatuses.name',
        //     'religion' => 'Religions.name',
        //     'highest_education' => 'HighestEducations.name'
        // ]);
        
        // $employees->select([
        //     'tenor' => $employees->func()->dateDiff(['NOW()' => 'literal','Employees.date_joined' => 'identifier'])
        // ]);
            
        $this->paginate = [
            'contain' => ['Grades','NextOfKins.Relationships','Genders','StateOfOrigins','Locals','Designations','Cadres','MaritalStatuses','Religions',
                        'HighestEducations','WorkDetails', 'Educations', 'OtherDepartments.Sections','Sections'
            ],
            'sortWhitelist' => [
                'id','tenor', 'date_joined', 'Sections.id', 'staff_no', 'Grades.name','HighestEducations.name','age'
            ]
        ];

        // $employees = $this->paginate($employees);

        $sections  = $this->Sections->find();
        $branches  = $this->Companies->Branches->find()->toList();
        $section_id = 1; 
        $cName = '';
        $bName = '';
        
        debug($this->request->getData());

        if($this->request->is('post')  &&  $this->request->getData('section') &&  $this->request->getData('branch'))
        {
            //get using id
            $section_id = $this->request->getData('section');  
            $sections  = $this->Sections->find()->where(['Sections.id' => $section_id]);
            $sections->contain([
                'Employees' => [
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $branch = $this->request->getData('branch');
                        return $q->order(['Employees.staff_no' => 'ASC'])
                        ->where(['Employees.branch_id' => $branch]);                                        
                    }
                ]
            ]);

        }

        if($this->request->is('post')  &&  $this->request->getData('branch'))
        {
            //get using id
            $bName = $this->Companies->Branches->get($this->request->getData('branch'));
            $this->set(compact('cName','bName'));
            $branch = $this->request->getData('branch');  
            $sections->contain([
                'Employees' => [
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $cadre = $this->request->getData('cadres');
                        $branch = $this->request->getData('branch');
                        return $q->order(['Employees.staff_no' => 'ASC'])
                        ->where(['Employees.branch_id' => $branch]);                                        
                    }
                ]
            ]);
        }

        if($this->request->is('post')  &&  $this->request->getData('cadres') &&  $this->request->getData('branch'))
        {
            //get using id
            $cName = $this->Cadres->get($this->request->getData('cadres'));
            $bName = $this->Companies->Branches->get($this->request->getData('branch'));
            $this->set(compact('cName','bName'));
            
            $sections = $sections->contain([
                'Employees' => [
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $cadre = $this->request->getData('cadres');
                        $branch = $this->request->getData('branch');
                        return $q->order(['Employees.staff_no' => 'ASC'])->where(['Employees.cadre_id' => $cadre])
                        ->where(['Employees.branch_id' => $branch]);                                        
                    }
                ]
            ]);

        }
        
        if($this->request->is('post')  &&  $this->request->getData('highest_education_id'))
        {
            //get using id
            $cName = '';
            $bName = '';
            $this->set(compact('cName','bName'));
            
            $sections = $sections->contain([
                'Employees' => [
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $cadre = $this->request->getData('cadres');
                        $highest_education_id = $this->request->getData('highest_education_id');
                        return $q->order(['Employees.staff_no' => 'ASC'])->where(['Employees.highest_education_id' => $highest_education_id]);                                        
                    }
                ]
            ]);

        }

        if($this->request->is('post')  &&  $this->request->getData('cadres'))
        {
            //get using id
            $cName = $this->Cadres->get($this->request->getData('cadres'));
            $this->set(compact('cName','bName'));
            
            $sections = $sections->contain([
                'Employees' => [
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $cadre = $this->request->getData('cadres');
                        return $q->order(['Employees.staff_no' => 'ASC'])->where(['Employees.cadre_id' => $cadre]);                                                              
                    }
                ]
            ]);
        }

        $sections = $sections->contain([
            'Employees' => [
                'strategy' => 'subquery',
                'queryBuilder' => function ($q) {
                    $company = $this->Companies->get(1);
                    return $q->order(['Employees.first_name' => 'DESC'])
                    ->contain([
                        'Grades',
                        'NextOfKins.Relationships',
                        'Genders',
                        'States',
                        'Locals',
                        'Designations',
                        'Cadres',
                        'MaritalStatuses',
                        'Religions',
                        'HighestEducations',
                        'WorkDetails', 'Educations', 'ChildrenDetails', 'OtherDepartments.Sections'
                    ])->where(['Employees.status_id' => 1]);                                        
                }
            ]
        ]);
        
        $highestEducations = $this->Employees->HighestEducations->find('list', ['limit' => 200]);
        $company = $this->Companies->get(1);
        $depts = $this->Employees->Sections->find('list', ['limit' => 200]);
        $cadres = $this->Cadres->find('list', ['limit' => 200]);
        $branches = $this->Companies->Branches->find('list', ['limit' => 200]);
        $statuses = $this->Employees->Statuses->find('list', ['limit' => 200]);
        
        $this->paginate = [
            'contain' => ['Grades','NextOfKins.Relationships','Genders','StateOfOrigins','Locals','Designations','Cadres','MaritalStatuses','Religions',
                        'HighestEducations','WorkDetails', 'Educations', 'OtherDepartments.Sections','Sections'
            ],
            'sortWhitelist' => [
                'id','tenor', 'date_joined', 'Sections.id', 'staff_no', 'Grades.name','HighestEducations.name','age'
            ]
        ];
        
        $this->set(compact('employees','sections','company','depts','cadres','branches','cName','bName','highestEducations','statuses'));
    }
    
    /**
     * payrollRegister method
     *
     * @return \Cake\Http\Response|null
     */
    public function bioData()
    {  
        $employees = $this->Employees->find();
        // debug($employees);
        
        $sections  = $this->Sections->find();
        $branches  = $this->Companies->Branches->find()->all()->toList();
        $section_id = 1; 
        $cName = '';
        $bName = '';
        
        // debug($this->request->getData());

        if($this->request->is('post')  &&  $this->request->getData('section') &&  $this->request->getData('branch'))
        {
            //get using id
            $section_id = $this->request->getData('section');  
            $sections  = $this->Sections->find()->where(['Sections.id' => $section_id]);
            $sections->contain([
                'Employees' => [
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $branch = $this->request->getData('branch');
                        return $q->order(['Employees.staff_no' => 'ASC'])
                        ->where(['Employees.branch_id' => $branch]);                                        
                    }
                ]
            ]);

        }

        if($this->request->is('post')  &&  $this->request->getData('branch'))
        {
            //get using id
            $bName = $this->Companies->Branches->get($this->request->getData('branch'));
            $this->set(compact('cName','bName'));
            $branch = $this->request->getData('branch');  
            $sections->contain([
                'Employees' => [
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $cadre = $this->request->getData('cadres');
                        $branch = $this->request->getData('branch');
                        return $q->order(['Employees.staff_no' => 'ASC'])
                        ->where(['Employees.branch_id' => $branch]);                                        
                    }
                ]
            ]);
        }

        if($this->request->is('post')  &&  $this->request->getData('cadres') &&  $this->request->getData('branch'))
        {
            //get using id
            $cName = $this->Cadres->get($this->request->getData('cadres'));
            $bName = $this->Companies->Branches->get($this->request->getData('branch'));
            $this->set(compact('cName','bName'));
            
            $sections = $sections->contain([
                'Employees' => [
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $cadre = $this->request->getData('cadres');
                        $branch = $this->request->getData('branch');
                        return $q->order(['Employees.staff_no' => 'ASC'])->where(['Employees.cadre_id' => $cadre])
                        ->where(['Employees.branch_id' => $branch]);                                        
                    }
                ]
            ]);

        }
        
        if($this->request->is('post')  &&  $this->request->getData('highest_education_id'))
        {
            //get using id
            $cName = '';
            $bName = '';
            $this->set(compact('cName','bName'));
            
            $sections = $sections->contain([
                'Employees' => [
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $cadre = $this->request->getData('cadres');
                        $highest_education_id = $this->request->getData('highest_education_id');
                        return $q->order(['Employees.staff_no' => 'ASC'])->where(['Employees.highest_education_id' => $highest_education_id]);                                        
                    }
                ]
            ]);

        }

        if($this->request->is('post')  &&  $this->request->getData('cadres'))
        {
            //get using id
            $cName = $this->Cadres->get($this->request->getData('cadres'));
            $this->set(compact('cName','bName'));
            
            $sections = $sections->contain([
                'Employees' => [
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $cadre = $this->request->getData('cadres');
                        return $q->order(['Employees.staff_no' => 'ASC'])->where(['Employees.cadre_id' => $cadre]);                                                              
                    }
                ]
            ]);
        }

        $sections = $sections->contain([
            'Employees' => [
                'strategy' => 'subquery',
                'queryBuilder' => function ($q) {
                    $company = $this->Companies->get(1);
                    return $q->order(['Employees.first_name' => 'DESC'])
                    ->contain([
                        'Grades',
                        'NextOfKins.Relationships',
                        'Genders',
                        'States',
                        'Locals',
                        'Designations',
                        'Cadres',
                        'MaritalStatuses',
                        'Religions',
                        'HighestEducations',
                        'WorkDetails', 'Educations', 'ChildrenDetails', 'OtherDepartments.Sections'
                    ]);                                        
                }
            ]
        ]);

        // debug($sections->first());
        
        $highestEducations = $this->Employees->HighestEducations->find('list', ['limit' => 200]);
        $company = $this->Companies->get(1);
        $depts = $this->Sections->find('list', ['limit' => 200]);
        $cadres = $this->Cadres->find('list', ['limit' => 200]);
        $branches = $this->Companies->Branches->find('list', ['limit' => 200]);
        $statuses = $this->Employees->Statuses->find('list', ['limit' => 200]);

        $this->set(compact('sections','company','depts','cadres','branches','cName','bName','highestEducations','statuses'));
    }
    
    /**
     * payrollRegister method
     *
     * @return \Cake\Http\Response|null
     */
    public function payrollRegister()
    {  
        $employees = $this->Employees->find();
        // debug($this->request->getData());
        
        $sections  = $this->Sections->find();
        $branches  = $this->Companies->Branches->find()->all()->toList();
        $section_id = 1; 
        $cName = '';
        $bName = '';
        
        // debug($this->request->getData());

        if($this->request->is('post')  &&  $this->request->getData('section') &&  $this->request->getData('branch'))
        {
            //get using id
            $section_id = $this->request->getData('section');  
            $sections  = $this->Sections->find()->where(['Sections.id' => $section_id]);
            $sections->contain([
                'Employees' => [
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $branch = $this->request->getData('branch');
                        return $q->order(['Employees.staff_no' => 'ASC'])
                        ->where(['Employees.branch_id' => $branch]);                                        
                    }
                ]
            ]);

        }

        if($this->request->is('post')  &&  $this->request->getData('branch'))
        {
            //get using id
            $bName = $this->Companies->Branches->get($this->request->getData('branch'));
            $this->set(compact('cName','bName'));
            $branch = $this->request->getData('branch');  
            $sections->contain([
                'Employees' => [
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $cadre = $this->request->getData('cadres');
                        $branch = $this->request->getData('branch');
                        return $q->order(['Employees.staff_no' => 'ASC'])
                        ->where(['Employees.branch_id' => $branch]);                                        
                    }
                ]
            ]);
        }

        if($this->request->is('post')  &&  $this->request->getData('cadre') &&  $this->request->getData('branch'))
        {
            // debug($this->request->getData('branch'));
            //get using id
            $cName = $this->Cadres->get($this->request->getData('cadre'));
            $bName = $this->Companies->Branches->get($this->request->getData('branch'));
            $this->set(compact('cName','bName'));
            
            $sections = $sections->contain([
                'Employees' => [
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $cadre = $this->request->getData('cadre');
                        $branch = $this->request->getData('branch');
                        return $q->order(['Employees.staff_no' => 'ASC'])->where(['Employees.cadre_id' => $cadre])
                        ->where(['Employees.branch_id' => $branch]);                                        
                    }
                ]
            ]);

        }
        
        if($this->request->is('post')  &&  $this->request->getData('highest_education_id'))
        {
            //get using id
            $cName = '';
            $bName = '';
            $this->set(compact('cName','bName'));
            
            $sections = $sections->contain([
                'Employees' => [
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $cadre = $this->request->getData('cadres');
                        $highest_education_id = $this->request->getData('highest_education_id');
                        return $q->order(['Employees.staff_no' => 'ASC'])->where(['Employees.highest_education_id' => $highest_education_id]);                                        
                    }
                ]
            ]);

        }

        if($this->request->is('post')  &&  $this->request->getData('cadre'))
        {
            //get using id
            $cName = $this->Cadres->get($this->request->getData('cadre'));
            $this->set(compact('cName','bName'));
            
            $sections = $sections->contain([
                'Employees' => [
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $cadre = $this->request->getData('cadre');
                        return $q->order(['Employees.staff_no' => 'ASC'])->where(['Employees.cadre_id' => $cadre]);                                                              
                    }
                ]
            ]);
        }

        $sections = $sections->contain([
            'Employees' => [
                'strategy' => 'subquery',
                'queryBuilder' => function ($q) {
                    return $q->order(['Employees.staff_no' => 'ASC'])
                    ->contain(['Transactions'=>[
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $company = $this->Companies->get(1);
                        return $q->where(['Transactions.date' => new FrozenDate($company->date)])
                        ->contain('Employees.Grades');
                    
                        }]
                    ])
                    ->contain('Banks');                                        
                }
            ]
        ]);
        
        $highestEducations = $this->Employees->HighestEducations->find('list', ['limit' => 200]);
        $company = $this->Companies->get(1);
        $depts = $this->Sections->find('list', ['limit' => 200]);
        $cadres = $this->Cadres->find('list', ['limit' => 200]);
        $branches = $this->Companies->Branches->find('list', ['limit' => 200]);
        $statuses = $this->Employees->Statuses->find('list', ['limit' => 200]);

        $this->set(compact('sections','company','depts','cadres','branches','cName','bName','highestEducations','statuses'));
    }

    /**
     * payrollRegister method
     *
     * @return \Cake\Http\Response|null
     */
    public function endOfYearBonus()
    {
        $sections = $this->Sections->find()->contain([
            'Employees' => [
                'strategy' => 'subquery',
                'queryBuilder' => function ($q) {
                    return $q->order(['Employees.staff_no' => 'ASC'])
                    ->contain(['Transactions'=>[
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $company = $this->Companies->get(1);
                        return $q->where(['Transactions.date' => new FrozenDate($company->date)])
                        ->contain('Employees.Grades');
                    
                        }]
                    ])
                    ->contain('Banks');                                        
                }
            ]
        ]);

        $company = $this->Companies->get(1);

        $this->set(compact('sections','company'));
    }


    /**
     * payrollRegister method
     *
     * @return \Cake\Http\Response|null
     */
    public function employeePayAdvice()
    { 
        // debug('Welcome');

        $gpa = 1;

        $spa = 0;

        $sections  = $this->Sections->find();

        $section_id = 0; 

        if($this->request->is('post')  &&  $this->request->getData('section') && $this->request->getData('slip_type'))
        {
            // debug($this->request->getData('slip_type'));
            //get using id
            $section_id = $this->request->getData('section'); 
            
            //get general pay advice checkbox value
            $gpa = $this->request->getData('slip_type')[0]; 

            //get service charge checkbox value
            if(count($this->request->getData('slip_type')) > 1){
                $spa = $this->request->getData('slip_type')[1]; 
            }

            $sections  = $this->Sections->find()->where(['Sections.id' => $section_id]);
        }
        if($this->request->is('post')  &&  $this->request->getData('employee')  && $this->request->getData('slip_type'))
        {

            // debug($this->request->getData('slip_type'));
            //get using id
            $section_id = 0; 

            //get general pay advice checkbox value
            $gpa = $this->request->getData('slip_type')[0]; 

            //get service charge checkbox value
            if(count($this->request->getData('slip_type')) > 1){
                $spa = $this->request->getData('slip_type')[1]; 
            }

            $sections  = $this->Sections->find()->contain([
                'Employees' => [
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $employee_id = $this->request->getData('employee');              
                        $emp = $this->Employees->get($employee_id);
                        return $q->where(['Employees.id' => $emp->id]);                                                                                   
                    }]
            ]);
            //debug($employee_id);
        }

        $sections = $sections->contain([
            'Employees' => [
                'strategy' => 'subquery',
                'queryBuilder' => function ($q) {
                    $company = $this->Companies->get(1);
                    return $q->order(['Employees.staff_no' => 'ASC'])
                    ->contain(['Transactions'=>[
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $company = $this->Companies->get(1);
                        return $q->where(['Transactions.date' => new FrozenDate($company->date)])
                        ->contain('Employees.Grades')
                        ->contain('Employees.Cadres')
                        ->contain('Employees.Banks');                    
                    }]]);                                        
                }
            ]
        ]);

        $company = $this->Companies->get(1);
        $depts = $this->Sections->find('list', ['limit' => 200]);
        $employees = $this->Employees->find('list')
        ->contain(['Transactions'=>[
            'strategy' => 'subquery',
            'queryBuilder' => function ($q) {
                $company = $this->Companies->get(1);
                return $q->where(['Transactions.date' => new FrozenDate($company->date)]);                    
            }]]);
        
        $this->set(compact('sections','company','depts','employees','gpa','spa'));
    }

    /**
     * bankLetter method
     *
     * @return \Cake\Http\Response|null
     */
    public function bankLetter()
    {

        $banks  = $this->Banks->find();

        $bank_id = 1; 

        if($this->request->is('post')  &&  $this->request->getData('bank'))
        {
            //get using id
            $bank_id = $this->request->getData('bank');  
            $banks  = $this->Banks->find()->where(['Banks.id' => $bank_id]);
        }

        $company = $this->Companies->get(1,[
            'contain' => ['Employees']]);

        $bankList = $this->Banks->find('list', ['limit' => 200]);

        $this->set(compact('banks','company','bankList'));
    }

    /**
     * staff-List method
     *
     * @return \Cake\Http\Response|null
     */
    public function staffList()
    {      

        $bank  = $this->Banks->find();

        $bank_id = null; 
        $cadre_id = null;

        if($this->request->is('post')  &&  $this->request->getData('bank'))
        {
            // debug($this->request->getData('bank'));
            //get using id
            $bank_id = $this->request->getData('bank');
            // $cadre_id = $this->request->getData('cadre');  
            $bank  = $this->Banks->find()->where(['Banks.id' => $bank_id]);
            // $cadre  = $this->Banks->Employees->Cadres->find()->where(['Cadres.id' => $cadre_id]);

        }

        $banks = $bank->contain([
            'Employees' => [
                'strategy' => 'subquery',
                'queryBuilder' => function ($q) {
                    return $q->order(['Employees.staff_no' => 'ASC'])
                    ->contain(['Transactions'=>[
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $company = $this->Companies->get(1);
                        return $q->where(['Transactions.date' => new FrozenDate($company->date)])
                        ->contain('Employees.Grades');                    
                    }]]);                                        
                }
            ]
        ]);

        $company = $this->Companies->get(1);
        $bankList = $this->Banks->find('list', ['limit' => 200]);
        $cadreList = $this->Banks->Employees->Cadres->find('list', ['limit' => 200]);

        $this->set(compact('banks','company','bankList','cadreList'));
    }

    /**
     * staffListIleyaXmas
     *
     * @return \Cake\Http\Response|null
     */
    public function staffListIleyaXmas()
    {
        //using the same function as staff list but different template
        return $this->staffList();

    }


    /**
     * staffListBonus
     *
     * @return \Cake\Http\Response|null
     */
    public function staffListBonus()
    {
        //using the same function as staff list but different template
        return $this->staffList();

    }


    /**
     * cashPayment
     *
     * @return \Cake\Http\Response|null
     */
    public function cashPayment()
    {
        //using the same function as staff list but different template
        return $this->endOfYearBonus();

    }

    /**
     * generalSummary
     *
     * @return \Cake\Http\Response|null
     */
    public function generalSummary()
    {
        //using the same function as staff list but different template
        return $this->payrollRegister();

    }

    /**
     * individualSummary
     *
     * @return \Cake\Http\Response|null
     */
    public function individualSummary()
    {
        //using the same function as staff list but different template
        return $this->payrollRegister();

    }

    /**
     * individual Pay Record
     *
     * @return \Cake\Http\Response|null
     */
    public function individualPayRecord()
    {
        //using the same function as staff list but different template
        return $this->payrollRegister();

    }


    /**
     * Service Charge General-staff 
     *
     * @return \Cake\Http\Response|null
     */
    public function generalStaff()
    {
        //using the same function as staff list but different template
        return $this->payrollRegister();

    }

    /**
     * Tax Schedule
     *
     * @return \Cake\Http\Response|null
     */
    public function taxSchedule()
    {
        //using the same function as staff list but different template
        return $this->payrollRegister();

    }

    /**
     * Deduction Schedule
     *
     * @return \Cake\Http\Response|null
     */
    public function deductionSchedule()
    {
        //using the same function as staff list but different template
        return $this->payrollRegister();

    }

    /**
     * Deduction Schedule
     *
     * @return \Cake\Http\Response|null
     */
    public function allowanceSchedule()
    {
        //using the same function as staff list but different template
        return $this->payrollRegister();

    }

    /**
     * Deduction Schedule
     *
     * @return \Cake\Http\Response|null
     */
    public function staffPerAnnum()
    {
        //using the same function as staff list but different template
        return $this->payrollRegister();

    }
    
}