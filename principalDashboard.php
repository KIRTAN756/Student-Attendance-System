<?php
 session_start();

  if(isset($_SESSION['principal'])) {
        
  }
  else {
    header("Location:index.php");
  }

?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
       .sidebar .logo-details .logo_name{
          padding-left: 12px;
        }
     </style>
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <span class="logo_name">SAS</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="addFaculty.php">
            <i class="bi-person-plus"></i>
            <span class="links_name">Add/Update Faculty</span>
          </a>
        </li>
        <li>
          <a href="announcementP.php">
            <i class="bi-megaphone"></i>
            <span class="links_name">Announcement</span>
          </a>
        </li>
        <li>
          <a href="NEWSP.php">
            <i class="bi-newspaper"></i>
            <span class="links_name">NEWS</span>
          </a>
        </li>
        <li>
          <a href="attendanceReportP.php">
            <i class="bi-list-check"></i>
            <span class="links_name">Attendance Report</span>
          </a>
        </li>
        <li>
          <a href="takefeedback.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Take Feedback</span>
          </a>
        </li>
        <li>
          <a href="feedbackReportP.php">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Feedback Report</span>
          </a>
        </li>
        <li>
          <a href="studentDataP.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Student Data</span>
          </a>
        </li>
        <li>
          <a href="complainReportP.php">
            <i class='bx bx-message' ></i>
            <span class="links_name">Complian Report</span>
          </a>
        </li>
        <li>
          <a href="leaveReportstudentP.php">
            <i class='bx bx-message' ></i>
            <span class="links_name">Leave Report of Students</span>
          </a>
        </li>
        <li>
          <a href="leaveReportfacultyP.php">
            <i class='bx bx-message' ></i>
            <span class="links_name">Leave Report of Students</span>
          </a>
        </li>
        <li>
          <a href="manageAccountP.php">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Manage Account</span>
          </a>
        </li>
        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>

      <div class="profile-details">
        <span class="admin_name"><?php echo $_SESSION['principal'];?></span>
      </div>
    </nav>

  

<script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>

