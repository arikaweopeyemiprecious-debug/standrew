<?php
$page_title='Create an Account';
require_once 'config.php';
require_once 'auth.php';
if (is_logged_in()) { header('Location: index.php'); exit; }
$message=''; $error='';
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $name=trim(isset($_POST['name'])?$_POST['name']:'');
    $email=trim(isset($_POST['email'])?$_POST['email']:'');
    $password=isset($_POST['password'])?$_POST['password']:'';
    $confirm=isset($_POST['confirm_password'])?$_POST['confirm_password']:'';
    if ($name=='' || $email=='' || $password=='') $error='Please fill in all required fields.';
    elseif (!preg_match('/^[^@\\s]+@[^@\\s]+\\.[^@\\s]+$/',$email)) $error='Please enter a valid email address.';
    elseif (strlen($password)<6) $error='Password must be at least 6 characters.';
    elseif ($password!=$confirm) $error='Passwords do not match.';
    else {
        $safe_email=mysql_real_escape_string($email,$conn);
        $safe_name=mysql_real_escape_string($name,$conn);
        $check=mysql_query("SELECT id FROM users WHERE email='$safe_email' LIMIT 1",$conn);
        if ($check && mysql_num_rows($check)>0) $error='An account with that email already exists. Please log in.';
        else {
            $hash=md5($password);
            $q=mysql_query("INSERT INTO users (name,email,password) VALUES ('$safe_name','$safe_email','$hash')",$conn);
            if ($q) { $message='Account created successfully. You can now log in.'; }
            else $error='Unable to create the account. Please try again.';
        }
    }
}
include 'header.php';
?>
<section class="page-title"><div class="container"><div class="eyebrow">Join our online church family</div><h1>Create an Account</h1><p>Register to access members-only church resources and stay connected.</p></div></section>
<section class="section"><div class="container auth-wrap"><div class="auth-card"><div class="auth-logo"><img src="church-logo.png" alt="St. Andrew's Anglican Church logo"></div><h2>Welcome</h2><p class="muted">Create your account in a few simple steps.</p>
<?php if($message!=''){ ?><div class="notice"><?php echo h($message); ?></div><?php } ?>
<?php if($error!=''){ ?><div class="error-notice"><?php echo h($error); ?></div><?php } ?>
<form class="form" method="post" action="signup.php"><label>Full Name<input type="text" name="name" required></label><label>Email Address<input type="email" name="email" required></label><label>Password<input type="password" name="password" minlength="6" required></label><label>Confirm Password<input type="password" name="confirm_password" minlength="6" required></label><button class="btn form-btn" type="submit">Create Account</button></form><p class="auth-switch">Already have an account? <a href="login.php">Log in</a></p></div></div></section>
<?php include 'footer.php'; ?>
