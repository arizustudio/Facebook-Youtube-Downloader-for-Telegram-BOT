<?php
error_reporting(0); 
set_time_limit(0);
$dir = "dirname(__FILE__)";
$telefile = trim(file_get_contents("telegtam_bot_token.txt"));
define('BOT_TOKEN', $telefile);
if(!is_dir("temps")){
	mkdir("temps");
}
if(!is_dir("render")){
	mkdir("render");
}
function detectCommand($text) {
    $pattern = '/^\/([a-zA-Z0-9_]+)(\s(.*))?$/';
    preg_match($pattern, $text, $matches);
    return $matches;
}
function deleteMessage($chatId, $messageId){
    $url = "https://api.telegram.org/bot" . BOT_TOKEN . "/sendMessage";
    $url = "https://api.telegram.org/bot" . BOT_TOKEN . "/deleteMessage?chat_id=$chatId&message_id=$messageId";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cache-Control: no-cache"));
    $response = curl_exec($ch);
    curl_close($ch);
    $update = json_decode($response,true);
	if ($update['ok'] == true) {
		return true;
	}else{
		return false;
	}
}
function sendMessage($chatId, $messageId, $message){
    $url = "https://api.telegram.org/bot" . BOT_TOKEN . "/sendMessage";
    $params = [
        'chat_id' => $chatId,
        'text' => $message,
        'reply_to_message_id' => $messageId,
        'disable_notification' => true
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cache-Control: no-cache"));
    return $response = curl_exec($ch);
    curl_close($ch);
    //$update = json_decode($response,true);
	//if ($update['ok'] == true) {
	//	return true;
	//}else{
	//	return false;
	//}
}
function sendVideo($chatId, $messageId, $videoUri){
    $url = "https://api.telegram.org/bot" . BOT_TOKEN . "/sendVideo";
    $params = [
        'chat_id' => $chatId,
        'video' => $videoUri,
        'reply_to_message_id' => $messageId,
        'disable_notification' => true
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cache-Control: no-cache"));
    $response = curl_exec($ch);
    curl_close($ch);
    $update = json_decode($response,true);
	if ($update['ok'] == true) {
		return true;
	}else{
		return false;
	}
}
function sendStream($chatId, $messageId, $videoPath){
    $url = "https://api.telegram.org/bot" . BOT_TOKEN . "/sendVideo";
    $params = [
        'chat_id' => $chatId,
        'video' => new CURLFile($videoPath),
        'reply_to_message_id' => $messageId,
        'disable_notification' => true
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cache-Control: no-cache"));
    $response = curl_exec($ch);
    curl_close($ch);
    $update = json_decode($response,true);
	if ($update['ok'] == true) {
		return true;
	}else{
		return false;
	}
}
function sendDocument($chatId, $messageId, $videoPath){
    $url = "https://api.telegram.org/bot" . BOT_TOKEN . "/sendDocument";
    $params = [
        'chat_id' => $chatId,
        'document' => new CURLFile($videoPath),
        'reply_to_message_id' => $messageId,
        'disable_notification' => true
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cache-Control: no-cache"));
    $response = curl_exec($ch);
    curl_close($ch);
    $update = json_decode($response,true);
	if ($update['ok'] == true) {
		return true;
	}else{
		return false;
	}
}
function sendStreamAudio($chatId, $messageId, $audioPath){
    $url = "https://api.telegram.org/bot" . BOT_TOKEN . "/sendAudio";
    $params = [
        'chat_id' => $chatId,
        'audio' => new CURLFile("temps/".$audioPath),
        'reply_to_message_id' => $messageId,
        'disable_notification' => true
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cache-Control: no-cache"));
    $response = curl_exec($ch);
    curl_close($ch);
    $update = json_decode($response,true);
	if ($update['ok'] == true) {
		return true;
	}else{
		return false;
	}
}
function getVideo($urlvideo){
	$uri = "https://co.wuk.sh/api/json";
	$bbx = array();
	$bbx['url'] = $urlvideo;
	$bbx['aFormat'] = "mp3";
	$bbx['filenamePattern'] = "classic";
	$bbx['dubLang'] = false;
	$bbx['vQuality'] = "1080";
	$headers = array();
	$headers[] = 'Accept:application/json';
	$headers[] = 'Content-Type:application/json';
	$headers[] = 'Cache-Control:no-cache';	
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $uri);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($bbx));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
	curl_setopt($ch, CURLOPT_TIMEOUT, 99999);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}
function getYTMusic($urlvideo){
	$uri = "https://co.wuk.sh/api/json";
	$bbx = array();
	$bbx['url'] = $urlvideo;
	$bbx['aFormat'] = "mp3";
	$bbx['filenamePattern'] = "classic";
	$bbx['isAudioOnly'] = true;
	$bbx['dubLang'] = false;
	$bbx['vQuality'] = "1080";
	$headers = array();
	$headers[] = 'Accept:application/json';
	$headers[] = 'Content-Type:application/json';
	$headers[] = 'Cache-Control:no-cache';	
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $uri);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($bbx));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}
function getName($uri){
	$pisah = basename($uri);
	$meki = explode('?',$pisah);
	return $meki[0];
}
function downloadFiles($url,$file){
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$fileContent = curl_exec($ch);
	if ($fileContent === false) {
		return false;
	}else{
		file_put_contents("temps/$file", $fileContent);
		return true;
	}
}
function getMessage2($terbaru){
	$uri = "https://api.telegram.org/bot" . BOT_TOKEN . "/getUpdates?offset=$terbaru";
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $uri);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cache-Control: no-cache"));
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}
function addBacksound($video,$audio,$volume,$output){
	if(file_exists("temps/$video")){
		echo shell_exec('ffmpeg -i temps/'.$video.' -i '.$audio.' -filter_complex "[1:0]volume='.$volume.'[a1];[0:a][a1]amix=inputs=2:duration=first" -map 0:v:0 -y temps/'.$output.'.mp4');
	}else{
		return false;
	}
}
mulai:
$terbaru = file_get_contents('terbaru.txt');
echo "[+] Get Update...\n";
$update = json_decode(getMessage2($terbaru+1),true);
if ($update['ok'] == true) {
	if(isset($update['result'][0]['update_id'])){
		$update_id = $update['result'][0]['update_id'];
		if($update_id > $terbaru){
		echo "[$update_id]=====================================================================\n";
			foreach($update['result'] as $pesan){
				$message = $pesan['message']['text'];
				$chatId = $pesan['message']['chat']['id'];
				$messageId = $pesan['message']['message_id'];
				$username = $pesan['message']['chat']['username'];
				echo "[Message] From : $chatId ($username) -> $message\n";
				$respon = "Diterima!";
				
				$commandMatches = detectCommand($message);
				if (!empty($commandMatches)) {
					$commandName = $commandMatches[1];
					$commandArguments = isset($commandMatches[3]) ? $commandMatches[3] : '';					
					$pisahc = explode(' ',$commandArguments);
					$url_videos = "$pisahc[0]";
					$wm = "$pisahc[1]";
					if($commandName == 'start'){
						$respon = "Hello, Welcome to Arizu Video Downloader! Use the /help command to see the command list";	
						echo "[REPLY] To : $chatId -> (intro)\n";
						sendMessage($chatId, $messageId, $respon);	
					}else
					if($commandName == 'help'){
$respon = "Welcome to Video Downloader by Arizu Studio, don't forget to visit https://arizu.id

Our service uses the live api service from cobalt https://cobalt.tools/

List Commands:
- /download (post_url)
Downlaod video from TikTok, Youtube, and Instagram.

- /music (youtube_url)
Download Music from YouTube

- /watermark (video_link) (watermark_link)
Auto add watermark to Downloaded Video

- /watermarkflip (video_link) (watermark_link)
Auto add Flip Mirrored Video and add watermark to Downloaded Video";	
						echo "[REPLY] To : $chatId -> (help)\n";
						sendMessage($chatId, $messageId, $respon);					
					}else
					if(!$url_videos){
						$respon = "Perintah tidak sesuai! silahkan ceh /help";
						echo "[REPLY] To : Perintah tidak sesuai! silahkan cek /help \n";
						sendMessage($chatId, $messageId, $respon);
					}else
					if($commandName == 'download'){
						$respon = "Proses..";
						echo "[REPLY] To : $chatId -> $respon\n";
						$proses_pesan = sendMessage($chatId, $messageId, $respon);
						$req = getVideo($url_videos);
						$gabol = json_decode($req,true);
						echo "[!] Vidio -> $gabol[url]\n";
						$filename = "instagram_".rand(1000,9999)."_".strtotime("now").".mp4";
						if(downloadFiles($gabol['url'],"$filename") == true){
							echo "[!] Download Success -> temps/$filename\n";
							if(sendStream($chatId, $messageId, "temps/$filename") == true){
								echo "[REPLY] To : $chatId -> (video_file)\n";
							}else{
								$respon = "Server Gagal Mengirim Video\n";
								echo "[REPLY] To : $chatId -> $respon\n";
								sendMessage($chatId, $messageId, $respon);
							}
							
						}else{
							$respon = "Server tidak dapat mengunduh video!\n";
							echo "[REPLY] To : $chatId -> $respon\n";
							deleteMessage($chatId, $messageId, $respon);
						}
						$proses_ekstrak = json_decode($proses_pesan,true);
						deleteMessage($proses_ekstrak['result']['chat']['id'], $proses_ekstrak['result']['message_id']);
					}else
					if($commandName == 'music'){
						$respon = "Proses..";
						echo "[REPLY] To : $chatId -> $respon\n";
						$proses_pesan = sendMessage($chatId, $messageId, $respon);
						$req = getYTMusic($commandArguments);
						$gabol = json_decode($req,true);
						echo "[!] Vidio -> $gabol[url]\n";
						$filename = "youtube_".rand(1000,9999)."_".strtotime("now").".mp4";
						if(downloadFiles($gabol['url'],"$filename") == true){
							echo "[!] Download Success -> temps/$filename\n";
							if(sendStreamAudio($chatId, $messageId, "$filename") == true){
								echo "[REPLY] To : $chatId -> (video_file)\n";
							}else{
								$respon = "Server Gagal Mengirim Audio (try short duration)\n";
								echo "[REPLY] To : $chatId -> $respon\n";
								sendMessage($chatId, $messageId, $respon);
							}
							if(unlink("temps/$filename")){
								echo "[!] File Deleted\n";
							}else{
								echo "[!] Failed to Delete File\n";
							}
						}else{
							$respon = "Server tidak dapat mengunduh video!\n";
							echo "[REPLY] To : $chatId -> $respon\n";
							sendMessage($chatId, $messageId, $respon);
						}
						$proses_ekstrak = json_decode($proses_pesan,true);
						deleteMessage($proses_ekstrak['result']['chat']['id'], $proses_ekstrak['result']['message_id']);
					}else
					if($commandName == 'watermark'){
						$respon = "Proses..";
						echo "[REPLY] To : $chatId -> $respon\n";
						$proses_pesan = sendMessage($chatId, $messageId, $respon);
						$req = getVideo($url_videos);
						$gabol = json_decode($req,true);
						echo "[!] Vidio -> $gabol[url]\n";
						$filename = "instagram_".rand(1000,9999)."_".strtotime("now").".mp4";
						if(downloadFiles($gabol['url'],"$filename") == true){
							echo "[!] Download Success -> temps/$filename\n";
							echo "[!] Editing..\n";
							shell_exec('ffmpeg -i temps/'.$filename.' -i '.$wm.' -filter_complex "[1]colorchannelmixer=aa=0.75,scale=250:-1[wm];[0][wm]overlay=(main_w-overlay_w)/2:(main_h-overlay_h)/8,hflip;" render/'.$filename);
							if(file_exists("render/$filename")){
								echo "[!] Sending..\n";
								if(sendStream($chatId, $messageId, "render/$filename") == true){
									echo "[REPLY] To : $chatId -> (video_file)\n";
								}else{
									$respon = "Server Gagal Mengirim Video\n";
									echo "[REPLY] To : $chatId -> $respon\n";
									sendMessage($chatId, $messageId, $respon);
								}
								if(unlink("render/$filename")){
									echo "[!] Edited File Deleted\n";
								}else{
									echo "[!] Failed to Delete Edited File\n";
								}
							}else{
								$respon = "Server Gagal Mengedit Video\n";
								echo "[REPLY] To : $chatId -> $respon\n";
								sendMessage($chatId, $messageId, $respon);
							}
							if(unlink("temps/$filename")){
								echo "[!] Downloaded File Deleted\n";
							}else{
								echo "[!] Failed to Delete Downloaded File\n";
							}
						}else{
							$respon = "Server tidak dapat mengunduh video!\n";
							echo "[REPLY] To : $chatIds -> $respon\n";
							deleteMessage($chatId, $messageId, $respon);
						}
						$proses_ekstrak = json_decode($proses_pesan,true);
						deleteMessage($proses_ekstrak['result']['chat']['id'], $proses_ekstrak['result']['message_id']);
					}else
					if($commandName == 'watermarkflip'){
						$respon = "Proses..";
						echo "[REPLY] To : $chatId -> $respon\n";
						$proses_pesan = sendMessage($chatId, $messageId, $respon);
						$req = getVideo($url_videos);
						$gabol = json_decode($req,true);
						echo "[!] Vidio -> $gabol[url]\n";
						$filename = "instagram_".rand(1000,9999)."_".strtotime("now").".mp4";
						if(downloadFiles($gabol['url'],"$filename") == true){
							echo "[!] Download Success -> temps/$filename\n";
							echo "[!] Editing..\n";
							shell_exec('ffmpeg -i temps/'.$filename.' -i '.$wm.' -filter_complex "[1]colorchannelmixer=aa=0.75,scale=250:-1[wm];[0][wm]overlay=(main_w-overlay_w)/2:(main_h-overlay_h)/8" render/'.$filename);
							if(file_exists("render/$filename")){
								echo "[!] Sending..\n";
								if(sendStream($chatId, $messageId, "render/$filename") == true){
									echo "[REPLY] To : $chatId -> (video_file)\n";
								}else{
									$respon = "Server Gagal Mengirim Video\n";
									echo "[REPLY] To : $chatId -> $respon\n";
									sendMessage($chatId, $messageId, $respon);
								}
								if(unlink("render/$filename")){
									echo "[!] Edited File Deleted\n";
								}else{
									echo "[!] Failed to Delete Edited File\n";
								}
							}else{
								$respon = "Server Gagal Mengedit Video\n";
								echo "[REPLY] To : $chatId -> $respon\n";
								sendMessage($chatId, $messageId, $respon);
							}
							if(unlink("temps/$filename")){
								echo "[!] Downloaded File Deleted\n";
							}else{
								echo "[!] Failed to Delete Downloaded File\n";
							}
						}else{
							$respon = "Server tidak dapat mengunduh video!\n";
							echo "[REPLY] To : $chatIds -> $respon\n";
							deleteMessage($chatId, $messageId, $respon);
						}
						$proses_ekstrak = json_decode($proses_pesan,true);
						deleteMessage($proses_ekstrak['result']['chat']['id'], $proses_ekstrak['result']['message_id']);
					}else{
						$respon = "Kode Perintah tidak ada!";
						echo "[REPLY] To : $chatId -> $respon\n";
						sendMessage($chatId, $messageId, $respon);
					}					
				}else{
					$respon = "Command not found, try typing /help";
					echo "[REPLY] To : $chatId -> $respon\n";
					sendMessage($chatId, $messageId, $respon);
				}
			}
			file_put_contents('terbaru.txt',$update_id);
			goto mulai;
		}else{
			echo "[!]No New Message..\n";
			sleep(0.75);
			goto mulai;
		}
		echo "===============================================================================\n";
	}else{
		echo "[!] No newest chat..\n";
		sleep(0.75);
		goto mulai;
	}
}else{
	echo "[!] failed to update data..\n";
	goto mulai;
}
?>
