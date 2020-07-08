<header id="main-header">
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Ba<span class="logo-dec">ker</span></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
            <!--
            <li class="active"><a href="#main-header">Home</a></li>
            <li class=""><a href="#feature">About</a></li>
            <li class=""><a href="#service">Services</a></li>
            <li class=""><a href="#blog">Blog</a></li>
            <li class=""><a href="#contact">Contact Us</a></li>
            <li class=""><a href="#" data-toggle="modal" data-target="#login-modal" style="color:white;">Login</a></li>
-->
            <?php 
                $menu = $conn->query("SELECT * FROM menu")->fetchAll();
                foreach($menu as $m) :
            ?>
            <li class=""><a href="<?=$m->src?>"><?=$m->name?></a></li>
            <?php endforeach ?>
            <?php 
                if(isset($_SESSION['user'])) {
                    if($_SESSION['user']->id == 1) {
                        echo '<li class=""><a href="index.php?page=admin">Admin panel</a></li>';
                    }
                    echo '<li class=""><a href="models/logout.php">Logout</a></li>';
                    echo '<li class=""><a href="index.php?page=cart"><i class="fas fa-shopping-cart"></i></a></li>';
                }
                else {
                    echo '<li class=""><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>';
                }
            ?>
        </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog"aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <h5 class="modal-title">Sign in</h5>
            <div class="modal-body">
                <form class="login-wrap" action="models/login.php" method="POST">
                    <div class="modal-item">
                        <i class="fas fa-user"></i>
                        <input type="text" id="username" name="username" placeholder="Username"/>
                    </div>
                    <div class="modal-item">
                        <i class="fas fa-key"></i>
                        <input type="password" id="password" name="password" placeholder="Password"/>
                    </div>
                    <button name="btn-login" class="modal-btn">Login</button>
                </form>
                <p id="register-show">Don't have an account? Register!</p>
                <form class="register-wrap" onSubmit="return validate()" action="models/register.php" method="POST">
                <div class="form-group">
                    <div class="modal-item">
                        <i class="fas fa-user"></i>
                        <input type="text" id="first-name" name="first-name" placeholder="First name" required/>
                    </div>
                    <span class="text-danger err-f-name">
                        <h6>Wrong name format</h6>
                    </span>
                </div>
                <div class="form-group">
                    <div class="modal-item">
                        <i class="fas fa-user"></i>
                        <input type="text" id="last-name" name="last-name" placeholder="Last name" required/>
                    </div>
                    <span class="text-danger err-l-name">
                        <h6>Wrong name format</h6>
                    </span>
                </div>
                <div class="form-group">
                    <div class="modal-item">
                        <i class="fas fa-user"></i>
                        <input type="text" id="username-reg" name="username" placeholder="Username" required/>
                    </div>
                    <span class="text-danger err-username">
                        <h6>Wrong username format</h6>
                    </span>
                </div>
                <div class="form-group">
                    <div class="modal-item">
                        <i class="fas fa-key"></i>
                        <input type="password" id="password-reg" name="password" placeholder="Password" required/>
                    </div>
                    <span class="text-danger err-pw">
                        <h6>Password should be between 5 and 24 characters</h6>
                    </span>
                </div>
                <div class="form-group mail">
                    <div class="modal-item">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" placeholder="Email" required/>
                    </div>
                    <span class="text-danger err-email">
                        <h6>Wrong email format</h6>
                    </span>
                </div>
                    <button name="btn-register" class="modal-btn ">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>
</header>