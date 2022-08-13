<!-- Add icons to the links using the .nav-icon class
     with font-awesome or any other icon font library -->
<li class="nav-header">MAIN NAVIGATION</li>
<li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>
      File
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/companies'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Company</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/branches'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Branches</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/employees'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Employees</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/departments'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Departments</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/units'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Units</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/sections'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Sections</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/banks'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Banks</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/cadres'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Cadres</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/grades'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Grades</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/designations'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Designations</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-table"></i>
    <p>
      Transactions
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/transactions'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Transactions</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/users/index'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Users</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-table"></i>
        <p>
            Reports
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Employees
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?php echo $this->Url->build('/reports/bio-data'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Bio-Data</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Payroll
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?php echo $this->Url->build('/reports/payrollregister'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Payroll Register</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $this->Url->build('/reports/end_of_year_bonus'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Year End Bonus (Staff)</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</li>

<!--<li class="nav-item">-->
<!--  <a href="#" class="nav-link">-->
<!--    <i class="nav-icon fas fa-th"></i>-->
<!--    <p>-->
<!--      Simple Link-->
<!--      <span class="right badge badge-danger">New</span>-->
<!--    </p>-->
<!--  </a>-->
<!--</li>-->


