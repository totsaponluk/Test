<script type="text/javascript">
// only for demo purposes
$.validator.setDefaults({
	/*submitHandler: function() {
            $('#form').submit();
		alert("submitted! (skipping validation for cancel button)");
	}*/
});

$().ready(function() {
	$("#form").validate({
		//errorLabelContainer: $("#form div.error")
	});
	
	
});
</script>
<style>
    .error{color: red;}
    .star{color:red;}
</style>
  <h2><?php echo HTML::image("media/fontend/images/img/tit-contact.jpg")?></h2>
 <?php echo Form::open("test/send",array("method"=>"post","id"=>"form"));?> 
  <div>TEST</div>
  <table class="form-advisor" width="640" border="0" cellspacing="0" cellpadding="0">    
    <tr>
    
    <th>内容　<span class="star">＊</span>：</th>
    <td><textarea title="＊必須項目です。" class="txt {required:true}" name="detail" cols="" rows="5"></textarea></td>
  </tr>
  <tr>
    <th>メールアドレス 　<span class="star">＊</span>：</th>
    <td><input title="＊必須項目です。" class="txt {required:true}" name="email" type="text" /></td>
  </tr>
</table>
<div class="btn-center2"><a class="bt-submit" href="#"><?php echo HTML::image("media/fontend/images/button/btn-04.jpg")?></a></div>
<?php echo Form::close();?>
  