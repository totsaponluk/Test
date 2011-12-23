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
<div class="ap-advsr">
  <h2><?php echo HTML::image("media/fontend/images/img/tit-ap-advsr.jpg")?></h2>
  <p>本サイトではタイの事情に詳しく、かつ専門的知識を有する人の申し込みを幅広く受け付けております。タイに居住、不居住を問いません。また現役かどうかも問いません。質問に答えられるだけのお時間と多少のボランテアックな精神の持ち主ならば誰でも大歓迎です。</p>
<p>下記の登録申込書をお送りください。コーディネーターが直接お会いするか、遠方ならば電話でお話をさせていただきます。問題がなければすぐに登録いたします。なお登録に際しては、アドバイザー契約に署名をしていただきます。</p>
  </div>

 <?php echo Form::open("apadvisor/send",array("method"=>"post","id"=>"form"));?> 
<table class="form-advisor" width="640" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th>名前　<span class="star">＊</span>：</th>
    <td><input title="＊必須項目です。" class="txt {required:true}" name="name" type="text" /></td>
  </tr>
  <tr>
    <th>住所　<span class="star">＊</span>：</th>
    <td><input  title="＊必須項目です。" class="txt {required:true}" name="address" type="text" /></td>
  </tr>
    <tr>
    <th>電話番号　<span class="star">＊</span>：</th>
    <td><input  title="＊必須項目です。" class="txt {required:true}" name="tel" type="text" /></td>
  </tr>
    <tr>
    <th>メールアドレス 　<span class="star">＊</span>：</th>
    <td><input  title="＊必須項目です。" class="txt {required:true}" name="email" type="text" /></td>
  </tr>
    <tr>
    <th><!--現在の職業-->所属している会社 　<span class="star">＊</span>：</th>
    <td><input  title="＊必須項目です。" class="txt {required:true}" name="career" type="text" /></td>
  </tr>
  
    <tr>
    <th>専門分野 　<span class="star">＊</span>：</th>
    <td><input  title="＊必須項目です。" class="txt {required:true}" name="expertist" type="text" /></td>
  </tr>
  <tr>
    <th><!--タイ在住暦-->経歴　<span class="star">＊</span>：</th>
    <td><textarea  title="＊必須項目です。" class="txt {required:true}" name="live_thai" type="text" cols="" rows="5"/></textarea><!--年--></td>
  </tr>
    <tr>
    <th>アピールポイント　<span class="star">＊</span>：</th>
    <td><textarea  title="＊必須項目です。" class="txt {required:true}" name="detail" cols="" rows="5"></textarea></td>
  </tr>
</table>
<div class="btn-center2"><a class="bt-submit" href="#"><?php echo HTML::image("media/fontend/images/button/btn-04.jpg")?></a></div>
 <?php echo Form::close();?>  