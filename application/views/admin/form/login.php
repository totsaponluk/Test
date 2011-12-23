<?php echo $message; ?>
<br />
<br />
<?php echo Form::open('admin/login/verify', array('method' => 'post'));?>
<div id="login-box-name" style="margin-top:20px;">Username:</div>
    <div id="login-box-field" style="margin-top:20px;">
        <input name="username" class="form-login" title="Username" value="" size="30" maxlength="2048" />
    </div>
<div id="login-box-name">Password:</div>
<div id="login-box-field"><input name="password" type="password" class="form-login" title="Password" value="" size="30" maxlength="2048" /></div>
<br />
<!--<span class="login-box-options"><input type="checkbox" name="1" value="1"> Remember Me <a href="#" style="margin-left:30px;">Forgot password?</a></span>-->
<br />
<br />
<a href="#"><?php echo Form::input("submit", "submit", array("type"=>"image","width"=>"103","height"=>"42","style"=>"margin-left:90px;","src"=>URL::site("media/login/images/login-btn.png")));?></a>





<!--<p><label>Username:</label><input name="username" type="text" value="" /></p>

<p><label>Password:</label><input name="password" type="password" value=""></p>
<p><input type="submit" value="login"></p>-->
<?php echo Form::close();?>