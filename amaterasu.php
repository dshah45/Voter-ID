<html>
<body>
    <style>
        .image1 {
height : 75px;
width : 75px;
}
</style>
<nav class="navbar navbar-expand-lg p-4 pr-lg-5">
<a href="index.php">
        <img src="e.jpg" alt="logo" class="image1">
  </a>
    <button class="navbar-toggler navbar-dark navbar-toggler-left" type="button" data-toggle="collapse" data-target="#navbarCollapse" style="outline-color:#fff; background-color: #a4b0be; float : left;">
    <span class="navbar-toggler-icon border border-0" style="outline-color : #fdfdfd;"></span>
    </button>
    
    <div class="collapse navbar-collapse justify-content-end " id="navbarCollapse">
        <ul class="navbar-nav">
            
            <li class="nav-item"><h3>
                <a class="nav-link" href="index.php">Home</a>
            </h3>    </li>
            <li class="nav-item"><h3>
                <a class="nav-link" href="about.php">About Us</a>
            </h3>    </li>
            <!-- Dropdown -->
            <h3><li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Login
                </a>
                <span class="dropdown-menu">
                    <a class="dropdown-item" href="register.php">Sign in</a>
                    <a class="dropdown-item" href="admin.php">Admin</a>
                    
                </span>
            </li>
            </h3>
        </ul>
    </div>
</nav>
</body>
</html>