<?php echo Form::open() ?>
<?php if ($errors): ?>
<p class="message">Some errors were encountered, please check the details you entered.</p>
<ul class="errors">
<?php foreach ($errors as $message): ?>
    <li><?php echo $message ?></li>
<?php endforeach ?>
<?php endif ?>
 
<dl>
    <dt><?php echo Form::label('username', 'Username') ?></dt>
    <dd><?php echo Form::input('username', $post['username']) ?></dd>
 
    <dt><?php echo Form::label('password', 'Password') ?></dt>
    <dd><?php echo Form::password('password') ?></dd>
    <dd class="help">Passwords must be at least 6 characters long.</dd>
    <dt><?php echo Form::label('confirm', 'Confirm Password') ?></dt>
    <dd><?php echo Form::password('confirm') ?></dd>
 
    <dt><?php echo Form::label('use_ssl', 'Use extra security?') ?></dt>
    <dd><?php echo Form::select('use_ssl', array('yes' => 'Always', 'no' => 'Only when necessary'), $post['use_ssl']) ?></dd>
    <dd class="help">For security, SSL is always used when making payments.</dd>
</dl>
 
<?php echo Form::submit(NULL, 'Sign Up') ?>
<?php echo Form::close() ?>