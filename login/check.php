<!-- 암호화 / 세션 확인 -->

<?php
    error_reporting(E_ALL);
    ini_set('display_errors',1); //에러메세지

// 로그인됐는지 판단
function is_login(){

    global $con; //글로벌 변수

//isset 괄호안의 값이 존재하면 T 아니면 F

//세션이 있다면
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) ){ //세션이 존재하고 비어있지 않다면

        $stmt = $con->prepare("select username from users where username=:username"); //디비에 아이디 찾아서
        $stmt->bindParam(':username', $_SESSION['user_id']); // 아이디랑 세션아이디랑 비교
        $stmt->execute();
        $count = $stmt->rowcount();

        if ($count == 1){

            return true; //로그인 상태
        }else{
            //사용자 테이블에 없는 사람
            return false;
        }
    }else{

        return false; //로그인 안된 상태
    }
}

//https://stackoverflow.com/a/46872528

// 암호화
function encrypt($plaintext, $salt) {
    $method = "AES-256-CBC";
    $key = hash('sha256', $salt, true);
    $iv = openssl_random_pseudo_bytes(16);

    $ciphertext = openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv);
    $hash = hash_hmac('sha256', $ciphertext, $key, true);

    return $iv . $hash . $ciphertext;
}

//암호화 독해
function decrypt($ivHashCiphertext, $salt) {
    $method = "AES-256-CBC";
    $iv = substr($ivHashCiphertext, 0, 16);
    $hash = substr($ivHashCiphertext, 16, 32);
    $ciphertext = substr($ivHashCiphertext, 48);
    $key = hash('sha256', $salt, true);

    if (hash_hmac('sha256', $ciphertext, $key, true) !== $hash) return null;

    return openssl_decrypt($ciphertext, $method, $key, OPENSSL_RAW_DATA, $iv);
}


?>
