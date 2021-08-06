<?php

namespace app\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class LEComponent extends Component {

    private $encrypt_method = "AES-256-CBC";
    private $secret_key = 'liftezyabcdefghijklmnopqrstuvwxyziv';
    private $secret_iv = 'liftezyabcdefghijklmnopqrstuvwxyziv';
	
	public function loggedinUserId()
	{
		if (isset(Yii::$app->user->identity->profile)) {
			$uid = Yii::$app->user->identity->user_id;
		} else {
			$uid = Yii::$app->user->getId();
		}
		return $uid;
	}
	
	public function CovertBase64ToImage($imagestring,$directory,$filename)
	{
	
		$img = $imagestring; // Your data 'data:image/png;base64,AAAFBfj42Pj4';
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace('data:image/jpg;base64,', '', $img);
		$img = str_replace('data:image/jpeg;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		file_put_contents($directory.$filename, $data);
	}
	 
	public function getTrackid() {
		  $uniqueID='';
		  
		   
		    $int = rand(0,25);
		    $int2 = rand(0,25);
		   $a_z = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		   $a_z2 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		   $rand_letter2 = $a_z2[$int2];
		   $rand_letter = $a_z[$int];
		   $rand_letter = $rand_letter.$rand_letter2;
		  
		   $uniqueID=$rand_letter.mt_rand(100000, 999990); 
		  return $uniqueID; 
		 }


public function getStaffDirectory() {
		
		return "uploads". DIRECTORY_SEPARATOR . "staff".DIRECTORY_SEPARATOR ;
	}
	public function getShoppostDirectory() {
		
		return "uploads". DIRECTORY_SEPARATOR . "shop-post".DIRECTORY_SEPARATOR ;
	}
	public function getSalepurchaseDirectory($shopid,$id) {
		
		return "uploads". DIRECTORY_SEPARATOR . "sales-purchase".DIRECTORY_SEPARATOR.$shopid . DIRECTORY_SEPARATOR .DIRECTORY_SEPARATOR.$id . DIRECTORY_SEPARATOR ;
	}
	
	public function getGymDirectory($id) {
		return "uploads". DIRECTORY_SEPARATOR . "gyms" .DIRECTORY_SEPARATOR . str_pad($id,6,0,STR_PAD_LEFT);
	}
	public function getGymGalleryDirectory($id) {
		$gym = $this->getGymDirectory($id);
		return $gym . DIRECTORY_SEPARATOR . 'gallery' .  DIRECTORY_SEPARATOR ;
	}
	public function getNewsaleDirectory($id) {
		
		return "uploads". DIRECTORY_SEPARATOR . "New-Product-Sale".DIRECTORY_SEPARATOR.$id . DIRECTORY_SEPARATOR ;
	}
	public function getProfileDirectory($id) {
		
		return "uploads". DIRECTORY_SEPARATOR . "users" .DIRECTORY_SEPARATOR . str_pad($id,6,0,STR_PAD_LEFT);
	}
	
	public function getNewsDirectory($id) {
		
		return "uploads". DIRECTORY_SEPARATOR . "news".DIRECTORY_SEPARATOR ;
	}
	public function getArticalsDirectory() {
		
		return "uploads". DIRECTORY_SEPARATOR . "articals".DIRECTORY_SEPARATOR ;
	}
	public function getQuizDirectory() {
		
		return "uploads". DIRECTORY_SEPARATOR . "quiz".DIRECTORY_SEPARATOR ;
	}
	public function getWorkDirectory() {
		
		return "uploads". DIRECTORY_SEPARATOR . "work".DIRECTORY_SEPARATOR ;
	}
	public function getProductDirectory($id) {
		
		return "uploads". DIRECTORY_SEPARATOR . "product".DIRECTORY_SEPARATOR.$id . DIRECTORY_SEPARATOR ;
	}	
	public function getUserDirectory($id) {			return "uploads". DIRECTORY_SEPARATOR . "user".DIRECTORY_SEPARATOR.$id.DIRECTORY_SEPARATOR."cover".DIRECTORY_SEPARATOR ;	
}
public function getUserimageDirectory($id) {			return "uploads". DIRECTORY_SEPARATOR . "user".DIRECTORY_SEPARATOR.$id.DIRECTORY_SEPARATOR."profile_image".DIRECTORY_SEPARATOR ;	
}
	public function getBrandDirectory($id) {
		
		return "uploads". DIRECTORY_SEPARATOR . "brand".DIRECTORY_SEPARATOR .$id . DIRECTORY_SEPARATOR ;
	}
	public function getShoplogoDirectory($id) {
		
		return "uploads". DIRECTORY_SEPARATOR . "shop_logo".DIRECTORY_SEPARATOR .$id . DIRECTORY_SEPARATOR ;
	}
	public function getShopcoverDirectory($id) {
		
		return "uploads". DIRECTORY_SEPARATOR . "shop_cover".DIRECTORY_SEPARATOR .$id . DIRECTORY_SEPARATOR ;
	}
	public function getCategoryDirectory($id) {
		
		return "uploads". DIRECTORY_SEPARATOR . "category".DIRECTORY_SEPARATOR .$id . DIRECTORY_SEPARATOR ;
	}
	public function getCustomerDirectory($id) {
		
		return "uploads". DIRECTORY_SEPARATOR . "customer".DIRECTORY_SEPARATOR .$id . DIRECTORY_SEPARATOR ;
	}
	public function getProductgalleryDirectory($id) {
		
		return "uploads". DIRECTORY_SEPARATOR . "product_gallery".DIRECTORY_SEPARATOR .$id . DIRECTORY_SEPARATOR ;
	}
	public function getBranchDirectory() {
		
		return "uploads". DIRECTORY_SEPARATOR . "branch".DIRECTORY_SEPARATOR ;
	}public function getEventDirectory() {
		
		return "uploads". DIRECTORY_SEPARATOR . "event".DIRECTORY_SEPARATOR ;
	}
	public function getPromoDirectory() {
		
		return "uploads". DIRECTORY_SEPARATOR . "promo".DIRECTORY_SEPARATOR ;
	}
	public function encrypt($string) {
        $output = false;
        $key = hash('sha256', $this->secret_key);
        $iv = substr(hash('sha256', $this->secret_iv), 0, 16);
        $output = openssl_encrypt($string, $this->encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }

    public function decrypt($string) {
        $output = false;
        $key = hash('sha256', $this->secret_key);
        $iv = substr(hash('sha256', $this->secret_iv), 0, 16);
        $output = openssl_decrypt(base64_decode($string), $this->encrypt_method, $key, 0, $iv);
        return $output;
    }

    public function currentLanguage() {
		$languages = Yii::$app->multilingual->getAllLanguages();
		$currentLanguageId = Yii::$app->multilingual->language_id;
		foreach ($languages as $language) 
		{
			if ($language->id === $currentLanguageId) {
				return $language;
			}
		}
	}
	
	function startsWith($haystack, $needle)
	{
		$length = strlen($needle);
		return (substr($haystack, 0, $length) === $needle);
	}
	
	public function getLabel($class, $text) {
		return "<p class='$class'>$text</p>";
	}
	
	public function currentCurrency() {
		$language = $this->currentLanguage();
		return $language->currency_symbol;
	}
	
	public function currentLocale() {
		$language = $this->currentLanguage();
		return $language->locale;
	}

    public function gender($string) {
        return $string == 'M' ? 'Male' : 'Female';
    }

    public function status($string) {
        return $string == '10' ? 'Active' : 'Disabled';
    }


    public function generatePasswd($numAlpha = 6, $numNonAlpha = 2) {
        $listAlpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $listNonAlpha = '!$@&';
        return str_shuffle(
                substr(str_shuffle($listAlpha), 0, $numAlpha) .
                substr(str_shuffle($listNonAlpha), 0, $numNonAlpha)
        );
    }
	
	public function generateRefID($numAlpha = 6) {
        $listAlpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
      
        return "EF-" .str_shuffle(
                substr(str_shuffle($listAlpha), 0, $numAlpha)
        );
    }
	
	public function generatePin($numAlpha = 6 ) {
        $listAlpha = '0123456789';
        return str_shuffle(
            substr(str_shuffle($listAlpha), 0, $numAlpha)
        );
    }
	public function sendOTPMessage($model)
	{
		$pin = $this->generatePin(6);
		$expiry = date("Y-m-d H:i:s", strtotime('+2 hours'));;
		$model->pin = $pin;
		$model->pin_expiry = $expiry;
		$model->save();
		
		$text = "One Time Password for Liftezy.com is : $pin";
		$number = array();
		$number[] = '91'.$model->mobile;
		return $this->sendSMS($number,$text);
		
	}
    public function sendMail($model, $mailFilePathName, $mailSubject, $mailTo) {
//        return true;
        return Yii::$app->mailer
                        ->compose([
                            'html' => $mailFilePathName . '-html',
                                ], [
                            'model' => $model])
                        ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                        ->setTo($mailTo)
                        ->setSubject($mailSubject)
                        ->send();
    }

    public function getRoleName($id = "") {
        $id = $id == "" ? Yii::$app->user->getId() : $id;
		$roles = Yii::$app->authManager->getRolesByUser($id);
		if (!$roles) {
            return null;
        }

        reset($roles);
        /* @var $role \yii\rbac\Role */
        $role = $this->getRole($id);

        return $role->description;
    }
	
	public function getRole($id = "") {
        $id = $id == "" ? Yii::$app->user->getId() : $id;
		$roles = Yii::$app->authManager->getRolesByUser($id);
		if (!$roles) {
            return null;
        }

        reset($roles);
        /* @var $role \yii\rbac\Role */
        $role = current($roles);
        return $role;
    }

    public function getFullname() {
        $fullName = '';
        if (isset(Yii::$app->user->identity->profile)) {
            $fullName = Yii::$app->getUser()->getIdentity()->profile['name'];
        } else {
            $profile = \app\models\UserDetails::find()->where(['user_id' => Yii::$app->user->getId()])->one();
            $fullName = $profile->name;
        }

        if ($fullName !== null)
            return ucwords(strtolower($fullName));

        return false;
    }

    public function getUserDetailId() {
        $profile = \app\models\UserDetails::find()->where(['user_id' => Yii::$app->user->getId()])->one();
        if ($profile !== null)
            return $profile->id;
        return false;
    }

	public function humanTiming ($time)
	{
		$time = time() - $time; // to get the time since that moment
		$time = ($time<1)? 1 : $time;
		$tokens = array (
			31536000 => 'year',
			2592000 => 'month',
			604800 => 'week',
			86400 => 'day',
			3600 => 'hour',
			60 => 'minute',
			1 => 'second'
		);
		foreach ($tokens as $unit => $text) {
			if ($time < $unit) continue;
			$numberOfUnits = floor($time / $unit);
			return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
		}
	}
	
    public function money_format($num) {
        setlocale(LC_MONETARY, 'en_IN');
        $explrestunits = "";
        if (strlen($num) > 3) {
            $lastthree = substr($num, strlen($num) - 3, strlen($num));
            $restunits = substr($num, 0, strlen($num) - 3); // extracts the last three digits
            $restunits = (strlen($restunits) % 2 == 1) ? "0" . $restunits : $restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
            $expunit = str_split($restunits, 2);
            for ($i = 0; $i < sizeof($expunit); $i++) {
                // creates each of the 2's group and adds a comma to the end
                if ($i == 0) {
                    $explrestunits .= (int) $expunit[$i] . ","; // if is first value , convert into integer
                } else {
                    $explrestunits .= $expunit[$i] . ",";
                }
            }
            $thecash = $explrestunits . $lastthree;
        } else {
            $thecash = $num;
        }
        return $thecash; // writes the final format where $currency is the currency symbol.
    }
	
	

}
