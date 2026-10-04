<?php
$page_title='Member Login';
require_once 'config.php';
require_once 'auth.php';
if (is_logged_in()) { header('Location: index.php'); exit; }
$error='';
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $email=trim(isset($_POST['email'])?$_POST['email']:'');
    $password=isset($_POST['password'])?$_POST['password']:'';
    $safe_email=mysql_real_escape_string($email,$conn);
    $hash=md5($password);
    $result=mysql_query("SELECT id,name,email FROM users WHERE email='$safe_email' AND password='$hash' LIMIT 1",$conn);
    if ($result && mysql_num_rows($result)==1) {
        $user=mysql_fetch_assoc($result);
        $_SESSION['user_id']=$user['id']; $_SESSION['user_name']=$user['name']; $_SESSION['user_email']=$user['email'];
        header('Location: index.php'); exit;
    } else $error='Incorrect email or password.';
}
include 'header.php';
?>
<section class="page-title"><div class="container"><div class="eyebrow">St. Andrew’s online community</div><h1>Member Login</h1><p>Sign in to continue to your church account.</p></div></section>
<section class="section"><div class="container auth-wrap"><div class="auth-card"><div class="auth-logo"><img src="church-logo.png" alt="St. Andrew's Anglican Church logo"></div><h2>Welcome Back</h2><p class="muted">Log in to your account.</p><?php if($error!=''){ ?><div class="error-notice"><?php echo h($error); ?></div><?php } ?><form class="form" method="post" action="login.php"><label>Email Address<input type="email" name="email" required></label><label>Password<input type="password" name="password" required></label><button class="btn form-btn" type="submit">Log In</button></form><p class="auth-switch">Don’t have an account? <a href="signup.php">Create one</a></p></div></div></section>
<?php include 'footer.php'; ?>
