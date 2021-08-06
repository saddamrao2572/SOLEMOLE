
<?php
use app\models\UserDetails;
use app\models\UserSearch;
use yii\helpers\Url;
$this->title="SoleMole | Conversations";
?>

<style>





.container{     max-width: 1024px; margin:auto;}
img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%; padding:
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 47%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 60%;
}

 .sent_msg p {
  background: #DCF8C6 none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; 
  color: black;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #white;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
  margin: 5px;
}
.msg_history {
  height: 516px;
  overflow-y: auto;
}

</style>

<?php
//$listquery="SELECT DISTINCT messages.`from` as id FROM messages WHERE messages.`from`!=1";

//$message_ids = \app\models\Messages::findBySql($listquery)->all();

 ?>

<div class="container-fluid" >
<div class="gradient-wrapper item-mb" >
 
 <div class="gradient-title">
                                <div class="row">
                                    <div class="col-4">
                                        <h2>Conversations</h2>
                                    </div>
                                
                                </div>
                            </div>
<div class="messaging">
      <div  class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Inbox</h4>
            </div>
            <input type="text" name="abxsearch" class="form-control" placeholder="Search By Name">

            
          </div>
          <div class="inbox_chat">
            
          
            <div class="chat_list">
             
            </div>
        
          <?php 
              $loguser = Yii::$app->util->loggedinUserId();
          if(isset($_GET["chat"]) && $_GET["chat"]=='byshop'){
            $chat = $_GET["chat"];
 $sql='select * from user where id in (select user_id from auth_assignment where item_name="admin" )';
          }
           else if(isset($_GET["chat"]) && $_GET["chat"]=='byuser'){
            $chat = $_GET["chat"];
 $sql='select * from user where id in (select user_id from auth_assignment where item_name="user" )';
          }
          else{
            $chat = 'byshop';
            $sql='select * from user where id in (select user_id from auth_assignment where item_name="admin" )';
          }
        
          $users = \app\models\User::findBySql($sql)->all();
          
       
      ?>
      <?php foreach($users as $user){ 
        
      $profile = \app\models\UserDetails::find()->where(['user_id'=>$user->id])->one();
      if($user->id != Yii::$app->util->loggedinUserId() ){
    
        $msgget = "SELECT * FROM messages WHERE ( `from` =".$user->id." AND `to` =".$loguser.") OR (`to` =".$user->id." AND `from` =".$loguser.")";
        
        $msgs_get = \app\models\Messages::findBySql($msgget)->all();
       

        if(isset($msgs_get) && $msgs_get!=null){
        $total_msg = count($msgs_get);
      ?>
      
      <a href="<?=Url::to(['/site/messages?id='.$user->id.'&chat='.$chat])?>">
            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img " > 
				<?php if (!empty($profile->profile_image)){?> 
				<img class="img img-circle" src="/uploads/user/<?=$user->id?>/profile_image/<?=$profile->profile_image?>" >
				<?php }else {?>
				<img class="img img-circle" src="/img/user/user1.png" >
				<?php }?> 
				</div>
                <div class="chat_ib">
                  <h5><?php echo $user->username; ?> <span class="chat_date" style="color:white;"><?=$msgs_get[$total_msg-1]['sent']?></span></h5>
                  <p><?php  if($msgs_get[$total_msg-1]['from']==$loguser){ echo "You: ".$msgs_get[$total_msg-1]['message']; }else{
                  	 echo $user->username.":".$msgs_get[$total_msg-1]['message'];
                  } ?></p>
                </div>
              </div>
            </div></a>
      <?php }
    }} ?>  
          </div>
        </div>
    <?php 
    if(!Yii::$app->user->isGuest && \Yii::$app->user->can('user')){
      if(isset($_GET["id"]) && $_GET["id"]!=null){
        $id=$_GET["id"];
        $from = Yii::$app->util->loggedinUserId();
$day=date('d');
$month=date('m');
$year=date('Y');

$sql = 'SELECT
messages.id,
messages.`from`,
messages.`to`,
messages.message,
messages.sent,
messages.`read`
FROM
messages
WHERE
((messages.`from` = '.$id.' AND
messages.`to` = '.$from.') OR (messages.`to` = '.$id.' AND
messages.`from` = '.$from.')) 
ORDER BY messages.`sent` ASC
';
$listquery="SELECT DISTINCT messages.`from` as id FROM messages WHERE messages.`from`!='.$from.'";
    $message_ids = \app\models\Messages::findBySql($listquery)->all();
  
    $loadMessages = \app\models\Messages::findBySql($sql)->all();
    
?>
        <div class="mesgs" style="background-color: #128C7E">
          <div class="msg_history"> 
          </div>
          <div class="type_msg">
            <div class="input_msg_write">
              <input type="text" style="color: white" class="write_msg" placeholder="Type a message" />
              <button class="msg_send_btn" type="button" data-from="<?=$from?>" data-to="<?=$id?>"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>
      <?php }
      else{
        echo "<div class='text-center text-info' style='valign: center'>Select a Chat to chat with customer...</div>";
      }
    }else{
      echo "tatti hy tuu";
    }
      ?>
      
      <p class="text-center top_spac"> Created by <a target="_blank" href="#">Zpzen Technologies</a></p>
      
    </div>
  </div>
  </div>
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script type="text/javascript">
   
  <?php
$url = Url::to(['shop/send']);
 ?>
 $(document).ready(function() {
 	<?php  if(isset($_GET["id"])){ 

          ?>
          var uid=<?=$_GET["id"]?>;
 	$(".msg_history").load("/shop/loadmessages?uid="+uid);
         $("div.msg_history").scrollTop($("div.msg_history")[0].scrollHeight);
<?php } ?>
     setInterval(function() {
        relodMessagess();
        
        <?php  if(isset($_GET["id"])){ 

          ?>
          var uid=<?=$_GET["id"]?>;
          //alert("loading msgs");

          <?php 
              $logguser = Yii::$app->util->loggedinUserId();
               $msgq = "SELECT * FROM messages WHERE ( `from` =".$_GET["id"]." AND `to` =".$logguser.") OR (`to` =".$_GET["id"]." AND `from` =".$logguser.")";
        $msg_get = \app\models\Messages::findBySql($msgq)->all();
        $total_new = count($msg_get);

         ?>
        
        $(".msg_history").load("/shop/loadmessages?uid="+uid);
         $("div.msg_history").scrollTop($("div.msg_history")[0].scrollHeight);
      <?php  }  ?>
        
        }, 4000); 
    $("#chat-btn").click(function(){
    //  alert("The paragraph was clicked.");
    });
    var scroll= $(window).scrollTop();
        scroll= scroll+ 10;
        $('html, body').animate({
          scrollTop: scroll
        }, 1000);
    $("div.msg_history").scrollTop($("div.msg_history")[0].scrollHeight);
  });
  
  $(".write_msg").keypress(function(event){
    if(event.which==13){
      $(".msg_send_btn").click();
    }
  });
  $(".msg_send_btn").click(function(){
    
    var currentMessage=$(".write_msg").val();
    //alert(currentMessage);
    if(currentMessage!==""){
    $(".msg_history").append("<div class='outgoing_msg'><div class='sent_msg'><p>"+currentMessage +"</p><span class='time_date'><?php echo date('Y-m-d h:i:s',time()); ?>   |  Today </span> </div></div>");
    $("div.msg_history").scrollTop($("div.msg_history")[0].scrollHeight);
    $(".write_msg").val('');
      var sender = $(this).attr('data-from');
      var to = $(this).attr('data-to');
      var message = currentMessage;
  var data = {'to':to , 'from':sender,'message':message};
      // { 'userid': userid, 'gymid': gymid };
      // console.log(data);
       
      $.ajax({
        method: "POST",
        url: "<?=$url?>",
        data: data
      })
      .done(function( msg ) {
        var data = JSON.parse(msg);
        if(data.status == '1') {
          
          //alert('123');
          //location.reload();
        }
        return false;
      });
     
    }else{
      alert('Sorry! Cannot send Empty message..');
    }
  });
  
  function relodMessagess() {

 //ajax call for messsage relode 
 
 
}
  </script>
    