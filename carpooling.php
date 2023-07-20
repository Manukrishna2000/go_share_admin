<!DOCTYPE html>
<?php
// Include the database connection file
require('connect.php');

// Query to fetch data from the offer_pool table along with its corresponding user data from the register table
$sql = "SELECT op.*, r.* FROM offer_pool op INNER JOIN register r ON op.log_id = r.log_id";

// Perform the query
$result = mysqli_query($con, $sql);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
?>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>GoShare</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!-- calendar file css -->
      <link rel="stylesheet" href="js/semantic.min.css" />
      <!-- fancy box js -->
      <link rel="stylesheet" href="css/jquery.fancybox.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
              <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="images/logo/gocircle2.jpg" width="100" alt="#" /></div>
                        <div class="user_info">
                           <h2 style="color: aliceblue;">ADMIN</h2>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>GO SHARE POOLING SERVICE</h4>
                  <ul class="list-unstyled components">
                     <li>
                        <a href="dashboard.html" ><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
                        
                     </li>
                     <li><a href="user.php"><i class="fa fa-user orange_color"></i> <span>USER  DETAILS</DETAILS> </span></a></li>
                    
                     <li><a href="notification.php"><i class="fa fa-bell purple_color2"></i> <span>NOTIFICATION</span></a></li>
                    
                     <li><a href="ads.php"><i class="fa fa-diamond blue1_color"></i> <span>MANAGE ADS</span></a></li>
                     <li><a href="complaint1.php"><i class="fa fa-comments-o green_color"></i> <span>COMPLAINTS</span></a></li>






                     
                     <li><a href="reviews.php"><i class="fa fa-star-half-empty yellow_color"></i> <span>APP RATING & REVIWS</span></a></li>
                     
                    
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                          
                              <img class="img-responsive" src="images/logo/goshare.png" alt="#" width="130" />
                           
                        </div>
                        
                        <div class="right_topbar">
                           <div class="icon_info">
                             
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"> <span class="name_user"><h5>Settings</h5></span></a>
                                    <div class="dropdown-menu">
                                      
                                      
                                       <a class="dropdown-item" href="about.html">About</a>
                                       <a class="dropdown-item" href="index.html"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Goods Movement Details</h2>
                              <br>
                              <div><a class="back-arrow" href="javascript:history.back()"> < back</a></div>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row">
                        <!-- table section -->
                        
                        <!-- table section -->
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table">
                                       <thead class="thead-dark">
                                          <tr>         <?php if (mysqli_num_rows($result) > 0) { ?>
            <table class="table">
               <thead class="thead-dark">
                  <tr>
                     <th>Sl.no</th>
                     <th>User name</th>
                     <th>Vehicle No.</th>
                     <th>Source</th>
                     <th>Destination</th>
                     <th>Date</th>
                     <th>Time</th>
                     <th colspan="23">Email</th>
                     <!-- Add other user data columns as needed -->
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $counter = 1;
                  while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                     <tr>
                        <td><?php echo $counter; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['vehicle_no']; ?></td>
                        <td><?php echo $row['starting_point']; ?></td>
                        <td><?php echo $row['destination']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['time']; ?></td>
                        <!-- <td><?php echo $row['seats']; ?></td> -->
                        <!-- <td><?php echo $row['login_id']; ?></td>  -->
                        <!-- <td><?php echo $row['username']; ?></td> -->
                        <td><?php echo $row['email']; ?></td>
                        <!-- Add other user data columns as needed -->
                     </tr>
                  <?php
                  $counter++;
                  }
                  ?>
               </tbody>
            </table>
         <?php } else { ?>
            <p>No pool offers found.</p>
         <?php } ?>
      </div>

      <!-- ... (your existing HTML content) ... -->
   </body>
</html>
<style>
   th{
      background-color: black;
      height:fit-content;
      height: 43px;
    color: white;
   }
  table {
  width: 100%;
}


   </style>
