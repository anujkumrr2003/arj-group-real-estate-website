 <header>
     <style>
         /* Dropdown submenu */
li.dropdown .submenu {
    display: none;               /* Hidden by default */
    position: absolute;
    background-color: #ffffff;   /* Fully opaque background */
    opacity: 1;                  /* 100% opacity */
    z-index: 10000;              /* High z-index */
    list-style: none;
    padding: 0;
    margin: 0;
    min-width: 200px;            /* Adjust width as needed */
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

/* Show submenu on hover */
li.dropdown:hover .submenu {
    display: block;
}

/* Submenu links */
li.dropdown .submenu li a {
    display: block;
    padding: 2px 5px;
    text-decoration: none;
    color: #333;
    transition: background 0.3s;
}

/* Hover effect for links */
li.dropdown .submenu li a:hover {
    background-color: #f95e43;  /* Change as needed */
    color: #fff;
}

     </style>
     
     
   
  <div class="container-fluid">
      <div class="inner-header">
       <?php
 

// Fetch logo from the database
$all = $conn->query("SELECT logo FROM profile_settings");

if ($all && $all->num_rows > 0) {
    $row = $all->fetch_assoc();
    $logoPath = htmlspecialchars($row['logo']); // sanitize output
    echo '<div class="logo">
            <a href="https://arjgroup.in/" style="margin-left:20px;">
                <img src="admin/' . $logoPath . '" alt="Luxury Projects" width="100" height="85">
            </a>
          </div>';
} else {
    echo '<div class="logo">Logo not found</div>';
}
?>

          <div class="menu">
              <div class="button_container" id="toggle" style="background-color:#fff;">
                  <span class="top"></span>
                  <span class="middle"></span>
                  <span class="bottom"></span>
              </div>
              <div class="overlay" id="overlay">
                  <nav class="overlay-menu">
                      <ul>
                          <li><a class="active" title="Home" href="https://arjgroup.in/" >HOME</a></li>
<li class="dropdown">   
    <span>PROJECTS <i class="fa fa-angle-down" aria-hidden="true"></i></span>  
    <ul class="submenu">
        <li>
            <a title="All PROJECTS" href="https://arjgroup.in/projects.php">All Projects</a>
        </li>

        <?php
      

        // Filter status from GET
        $filter_status = isset($_GET['status']) ? trim($conn->real_escape_string($_GET['status'])) : '';

        // Build query with TRIM() for safe matching
        $ck_query = "SELECT * FROM ck";
        if (!empty($filter_status)) {
            $ck_query .= " WHERE TRIM(status1) = '$filter_status'";
        }
        $ck_query .= " ORDER BY id DESC";

        $all_ck = $conn->query($ck_query);
        ?>

        <li>
            <a <?= ($filter_status === 'Ready To Move') ? 'class="active"' : '' ?> 
               href="https://arjgroup.in/projects.php?status=Ready%20To%20Move">
               Ready To Move
            </a>
        </li>

        <li>
            <a <?= ($filter_status === 'Under Construction') ? 'class="active"' : '' ?> 
               href="https://arjgroup.in/projects.php?status=Under%20Construction">
               Under Construction
            </a>
        </li>

        <li>
            <a <?= ($filter_status === 'Upcoming') ? 'class="active"' : '' ?> 
               href="https://arjgroup.in/projects.php?status=Upcoming">
               Upcoming Projects
            </a>
        </li>
    </ul> 
</li>



<?php
                              

                                
                                $query = "
    SELECT d.id, d.name 
    FROM locality dp 
    JOIN local d ON d.id = dp.developer_id 
    GROUP BY d.name 
    ORDER BY MAX(dp.id) DESC
";
                                $result = $conn->query($query);

                                if ($result && $result->num_rows > 0): ?>
                                 <li class="dropdown">
                                     <span>LOCALITY <i class="fa fa-angle-down" aria-hidden="true"></i></span>
                                     <ul class="submenu">
                                         <?php while ($row = $result->fetch_assoc()):
                                                $name = htmlspecialchars($row['name']);
                                                $slug = urlencode($name); ?>
                                             <li><a title="<?= $name ?>" href="https://arjgroup.in/locality-property.php?Locality=<?= $slug ?>"><?= $name ?></a></li>
                                         <?php endwhile; ?>
                                     </ul>
                                 </li>
                             <?php endif; ?>

<?php
 

// Assuming your 'dev_pro' table has 'developer_id' and you want unique developer names
$query = "
    SELECT d.id, d.name 
    FROM dev_pro dp 
    JOIN developers d ON d.id = dp.developer_id 
    GROUP BY d.name 
    ORDER BY MAX(dp.id) DESC
";
$result = $conn->query($query);

if ($result && $result->num_rows > 0): ?>
    <li class="dropdown">    
        <span>DEVELOPERS <i class="fa fa-angle-down" aria-hidden="true"></i></span>  
        <ul class="submenu">
            <?php while ($row = $result->fetch_assoc()): 
                $name = htmlspecialchars($row['name']);
                $slug = urlencode($name); ?>
                <li><a title="<?= $name ?>" href="https://arjgroup.in/developers.php?developer=<?= $slug ?>"><?= $name ?></a></li>
            <?php endwhile; ?>
        </ul>
    </li>
<?php endif; ?>

<?php
 

// Assuming your 'dev_pro' table has 'developer_id' and you want unique developer names
$query = "
    SELECT d.id, d.name 
    FROM comercial_pro dp 
    JOIN comercial d ON d.id = dp.developer_id 
    GROUP BY d.name 
    ORDER BY MAX(dp.id) DESC
";
$result = $conn->query($query);

if ($result && $result->num_rows > 0): ?>
    <li class="dropdown">    
        <span>COMERCIAL <i class="fa fa-angle-down" aria-hidden="true"></i></span>  
        <ul class="submenu">
            <?php while ($row = $result->fetch_assoc()): 
                $name = htmlspecialchars($row['name']);
                $slug = urlencode($name); ?>
                <li><a title="<?= $name ?>" href="https://arjgroup.in/comercial.php?comercial=<?= $slug ?>"><?= $name ?></a></li>
            <?php endwhile; ?>
        </ul>
    </li>
<?php endif; ?>




                          
                          <li><a title="About Us" href="https://arjgroup.in/about.php" >ABOUT US</a></li>
                          <li><a title="Blogs" href="https://arjgroup.in/blog.php" >BLOGS</a> </li>
                          <li><a title="Contact Us" href="https://arjgroup.in/contact.php" >CONTACT US</a> </li>

                          <?php
include 'config.php';

// Fetch mobile number from the database
$all = $conn->query("SELECT mobile FROM profile_settings LIMIT 1");

if ($all && $all->num_rows > 0) {
    $row = $all->fetch_assoc();
    $mobile = htmlspecialchars($row['mobile']); // sanitize output
    echo '<li class="mobile-number">
            <a title="Call Now" href="tel:' . $mobile . '" style="border-radius:20px;">
                <i class="bi bi-telephone-fill" style="margin-right: 8px;"></i>' . $mobile . '
            </a>
          </li>';
}
?>

                          
                      </ul>
                  </nav>   
              </div>   
          </div>
      </div>
  </div>
</header>