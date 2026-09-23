<?php
header('Content-Type: application/json; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); echo json_encode(['message'=>'Geçersiz istek.']); exit; }
if (!empty($_POST['website'] ?? '')) { echo json_encode(['message'=>'Teşekkürler.']); exit; }
function clean($v){ return trim(strip_tags((string)$v)); }
$type=clean($_POST['form_type']??''); $name=clean($_POST['name']??''); $email=filter_var($_POST['email']??'',FILTER_VALIDATE_EMAIL); $phone=clean($_POST['phone']??'');
if(!$name||!$email||!$phone){http_response_code(422);echo json_encode(['message'=>'Lütfen zorunlu alanları doğru doldurun.']);exit;}
$to='say@saygikurumsal.com'; $subject='SAY Kurumsal Web Formu';
$body="Ad Soyad: $name\nE-posta: $email\nTelefon: $phone\n";
if($type==='career'){$dep=clean($_POST['department']??'');$msg=clean($_POST['message']??'');$subject="Kariyer Başvurusu - $dep - $name";$body.="Departman: $dep\nÖn yazı: $msg\n";}
else{$company=clean($_POST['company']??'');$service=clean($_POST['service']??'');$msg=clean($_POST['message']??'');$subject="İletişim / Teklif Talebi - $name";$body.="Firma: $company\nHizmet: $service\nMesaj: $msg\n";}
$boundary=md5((string)microtime(true));$headers="From: SAY Kurumsal Web <say@saygikurumsal.com>\r\nReply-To: $email\r\nMIME-Version: 1.0\r\nContent-Type: multipart/mixed; boundary=\"$boundary\"";
$message="--$boundary\r\nContent-Type: text/plain; charset=UTF-8\r\nContent-Transfer-Encoding: 8bit\r\n\r\n$body\r\n";
if($type==='career' && isset($_FILES['cv']) && $_FILES['cv']['error']===UPLOAD_ERR_OK){$f=$_FILES['cv'];$allowed=['application/pdf','application/msword','application/vnd.openxmlformats-officedocument.wordprocessingml.document'];$mime=(new finfo(FILEINFO_MIME_TYPE))->file($f['tmp_name']);if($f['size']>5*1024*1024||!in_array($mime,$allowed,true)){http_response_code(422);echo json_encode(['message'=>'CV yalnızca PDF/DOC/DOCX ve en fazla 5 MB olabilir.']);exit;}$data=chunk_split(base64_encode(file_get_contents($f['tmp_name'])));$fn=preg_replace('/[^A-Za-z0-9._-]/','_',basename($f['name']));$message.="--$boundary\r\nContent-Type: $mime; name=\"$fn\"\r\nContent-Transfer-Encoding: base64\r\nContent-Disposition: attachment; filename=\"$fn\"\r\n\r\n$data\r\n";}
$message.="--$boundary--";
if(@mail($to,'=?UTF-8?B?'.base64_encode($subject).'?=',$message,$headers)){echo json_encode(['message'=>'Talebiniz başarıyla alındı. En kısa sürede sizinle iletişime geçeceğiz.']);}else{http_response_code(500);echo json_encode(['message'=>'Sunucuda e-posta servisi yapılandırılmamış. Hosting tarafında mail/SMTP ayarı yapılmalıdır.']);}
