<?php 
			if(isset($_GET["uid"]) && $_GET["uid"]!=null){
				
				$id=$_GET["uid"];
				
								$from = Yii::$app->util->loggedinUserId();
								// print_r($from);
								// exit;

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
//$listquery="SELECT DISTINCT messages.`from` as id FROM messages WHERE messages.`from`!=1";
		//$message_ids = \app\models\Messages::findBySql($listquery)->all();
	
		$loadMessages = \app\models\Messages::findBySql($sql)->all();
		$profile = \app\models\UserDetails::find()->where(['user_id'=>$id])->one();
		
 if(isset($loadMessages) && !empty($loadMessages)){ 
		  app\models\Messages::updateAll(['read'=>1],'(messages.from='.$id.' OR messages.to='.$id.')');
						$count=0;
								foreach($loadMessages as $message){
						$count=$count+1;
						 if($message->from==$id &&  $message->to==$from){ ?>
            
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img class="img-circle" src="/uploads/user/<?=$profile->user_id?>/profile_image/<?=$profile->profile_image?>" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p><?=$message->message?></p>
                  <span class="time_date" style="color: white;"> <?=$message->sent?>  </span></div>
              </div>
            </div>
						 <?php } 
						 
									if($message->to==$id  && $message->from == $from ){ 
						 ?>
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p><?=$message->message?></p>
                <span class="time_date" style="color: white;"> <?=$message->sent?>  </span> </div>
            </div>
									<?php }
								}
		  
		  }
			?>


<?php } ?>