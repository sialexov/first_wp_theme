<?php

// 1
$book = array (
    'title' => 'PHP для начинающих',
    'author' => 'Иван Петров',
    'year' => '2023'
);

echo "Название: " . $book['title'] . "\n";
echo "Автор: " . $book['author'] . "\n";
echo "Год: " . $book['year'] . "\n";

// 2
$student = [];
$student['name'] = "Анна";
$student['group'] = 'ПИ-101';
$student['course'] = 1;
print_r($student);

// 3
$settings = [
    'theme' => 'dark',
    'language' => 'ru',
    'notifications' => true
];

$settings['theme'] = 'light';
$settings['notifications'] = true;
$settings['timezone'] = 'Europe/Moscow';

foreach ($settings as $key => $value) {
    echo $key . ": " . $value . "\n";
}

// 4
$data = array(
    0 => "первый",
    'name' => "тест",
    1 => "второй",
    'value' => 100
);
echo $data['name'] . "\n";
echo $data[1] . "\n";
print_r($data);

// 5
$product = [
    'name' => 'Ноутбук',
    'brand' => 'Lenovo',
    'price' => 45000,
    'in_stock' => true
];
?>
<ul>
<?php foreach ($product as $key => $value) { ?>
    <li><?php echo $key . ": " . $value;?></li>
<?php 
} 
?>
</ul>

<?php
// 6
$user1 = array (
    'login' => 'alex',
    'email' => 'alex@mail.ru',
);
$user2 = array (
    'login' => 'maria',
    'email' => 'maria@yandex.ru'
);
print_r($user1);
print_r($user2);

// 7
$project = [
    'name' => 'Веб-сайт магазина',
    'tags' => ['php', 'html', 'css'],
    'status' => 'в разработке'
];
echo $project['name'] . "\n";
echo $project['tags'][2] . "\n"; // Выводим третий элемент 
var_dump($project);