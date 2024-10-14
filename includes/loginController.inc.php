<?

declare(strict_types=1);

function is_input_empty(string $email, string $password){
    if(empty($email) || empty($password)){
        return true;
    }
    return false;
}

function is_username_wrong(array $result){
    if(!$result){
        return false;
    }
    return true;
}

function is_password_wrong(array $result, string $password){
    if($result['password'] === $password){
        return false;
    }
    return true;
}