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
<div class="advisorsolo">
  <h2><?php echo HTML::image("media/fontend/images/img/tit-cordinator.jpg")?></h2>
  <div class="detail">
  <p class="txt_top">小堤　一郎</p>
<h3><?php echo HTML::image("media/fontend/images/img/tit-14.jpg")?></h3>
<p>コーディネーターはお客様からのご質問やお仕事依頼を適切なアドバイザーや掲載会社へつなぐためのサポートをいたします。質問をどのアドバイザーに聞いていいか分からない、聞いてもどうもうまく歯車が噛み合わない、良い会社を紹介してほしいなどの要望がありましたら遠慮なくコーディネーターまでご連絡ください。</p>
<h3><?php echo HTML::image("media/fontend/images/img/tit-10.jpg")?></h3>
<p>栃木県で生まれる。<br>
東京工業大学化学工学卒（学士）<br>
日揮（株）原子力事業本部勤務<br>
1989年　タイでオーミ株式会社設立、現在に至る<br>
<br>
賞罰<br>
1994年　タイの商務省からビジネスマンオブザイヤー受賞<br>
1995年　タイの工業省から品質優良賞受賞<br>
</p>
<h3><?php echo HTML::image("media/fontend/images/img/tit-11.jpg")?></h3>
<p>私は元はプラント設計のエンジニアでした。始めから独立志向が強く、当時勤めていた会社を１０年近く勤めた後、思い切って独立しました。どうせやるなら海外でと思い、当時発展著しいタイで会社を始めました。その後２０年、タイは政情不安、金融危機など山あり谷ありでしたが、経営者として会社を運営する知識を身につけました。<br>
今回このサイトを始めようと思ったのは、自分の知識、経験を生かしてこれからタイに来られる方のお手伝いができればと思ったのです。もちろん私一人では十分な知識がないかもしれません。しかし豊富な人脈を活用すれば皆様の疑問や期待に幾分なりとも答えられると思ったのです。<br>
タイは日本とはまったく違う環境、考え方があります。そんな日本とタイのギャップを埋めるお手伝いができればと思っております。</p>
  </div>
  <div class="pic">
  <?php echo HTML::image("media/fontend/images/img/img-sample04.jpg")?>
  </div>
</div>
  <div class="btn-center2"><a href="#"><?php echo HTML::image("media/fontend/images/button/btn-05.jpg")?></a></div>
 <?php echo Form::open("cordinator/send",array("method"=>"post","id"=>"form"));?> 
  <table class="form-advisor" width="640" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th>名前　<span class="star">＊</span>：</th>
    <td><input title="＊必須項目です。" class="txt {required:true}" name="name" type="text" /></td>
  </tr>
  <tr>
    <th>会社名　：</th>
    <td><input class="txt" name="company" type="text" /></td>
  </tr>
    <tr>
    <th>メールアドレス　<span class="star">＊</span>：</th>
    <td><input  title="＊必須項目です。" class="txt {required:true}" name="email" type="text" /></td>
  </tr>
    <tr>
    <th>質問の目的 　<span class="star">＊</span>：</th>
    <td><input  title="＊必須項目です。" class="txt {required:true}" name="objective" type="text" /></td>
  </tr>
    
    <tr>
    <th>質問内容　<span class="star">＊</span>：</th>
    <td><textarea  title="＊必須項目です。" class="{required:true}" name="question_detail" cols="" rows="5"></textarea></td>
  </tr>
</table>
<div class="btn-center2"><a class="bt-submit" href="#"><?php echo HTML::image("media/fontend/images/button/btn-06.jpg")?></a></div>
<?php echo Form:: close();?>