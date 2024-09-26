<?

use Valitron\Validator;


$patern_phone = '/^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/';
$rules = [

    'lengthMin' => [
        ['name', 4]
    ],
    'lengthMax' => [
        ['age', 2]
    ],
    'required' => ['name', 'age','phone', 'check'],
    'numeric' => ['age','phone'],
    'integer' => ['age','phone'],
    'regex' => [
        ['name', '/[A-zА-яЁё]{4,100}$/u'],
        ['phone', $patern_phone]
    ],
    // 'boolean'=>['check', 1]
];

$labels = [
   
    "name" => "имя",
    "age" => "возвраст",
    "phone" => "телефон",
    "check" => "поле для галочки",

];

if (!empty($_POST)) {
    \Valitron\Validator::lang('ru');
    $v = new \Valitron\Validator($_POST);
    $v->labels($labels);
    $v->rules($rules);
    if ($v->validate()) {
        $_SESSION['success'] = 'данные отправлены';
        // header('location:public/index.php');

        $name = $_POST['name'];
        $age = $_POST['age'];
        $phone = $_POST['phone'];

        print_r($_POST);

        $sql = "INSERT INTO `users` (`name`, `age`, `phone`) VALUES (?, ?, ?)";
        $res = $pdo->prepare($sql);
        $res->execute([$name, $age, $phone]);


        header('location: /');
    } else {
        $errors = '<ol>';
        foreach ($v->errors() as $error) {
            foreach ($error as $item) {
                $errors .= "<li>{$item}</li>";
            }
        }
        $errors .= '</ol>';
        $_SESSION['errors'] = $errors;
    }
}
