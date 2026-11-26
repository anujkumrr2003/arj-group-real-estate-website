<li class="dropdown">   
    <span>PROJECTS <i class="fa fa-angle-down" aria-hidden="true"></i></span>  
    <ul class="submenu">

        <li>
            <a title="All PROJECTS" 
               href="https://arjgroup.in/prodemo.php"
               class="<?= (!isset($_GET['status']) ? 'active' : '') ?>">
               All Projects
            </a>
        </li>

        <?php 
        include 'config.php';
        $filter_status = isset($_GET['status']) ? trim($_GET['status']) : ''; 
        ?>

        <li>
            <a href="https://arjgroup.in/prodemo.php?status=Ready%20To%20Move"
               class="<?= ($filter_status === 'Ready To Move') ? 'active' : '' ?>">
               Ready To Move
            </a>
        </li>

        <li>
            <a href="https://arjgroup.in/prodemo.php?status=Under%20Construction"
               class="<?= ($filter_status === 'Under Construction') ? 'active' : '' ?>">
               Under Construction
            </a>
        </li>

        <li>
            <a href="https://arjgroup.in/prodemo.php?status=Upcoming"
               class="<?= ($filter_status === 'Upcoming') ? 'active' : '' ?>">
               Upcoming Projects
            </a>
        </li>
    </ul> 
</li>
