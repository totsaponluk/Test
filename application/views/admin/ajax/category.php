
<?php foreach($categories as $c):?>
<option value="<?php echo $c->id ?>" <?php if($c->id == $selectedId){echo "selected";}?>>
    <?php echo $c->name?>
</option>
<?php endforeach;?>

