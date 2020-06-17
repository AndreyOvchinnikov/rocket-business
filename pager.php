<?php
function pagePrint($page, $title, $show, $active_class = '', $main_class = 'pager_item visual')
{
    $active = !$show ? $active_class : '';
    echo "<a class=\"$main_class $active\" href=\"?page=$page\"> $title </a>";
}

define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', 'line100');
define('DB_NAME', 'db_rocket');

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$link) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$products = [];
$page = (int)$_GET['page'];
if(empty($page)) $page = 1;

$page_setting = [
    'limit' => 8, // кол-во записей на странице
    'show' => 3, // 5 до текущей и после
    'prev_show' => 0, // не показывать кнопку "предыдущая"
    'next_show' => 0, // не показывать кнопку "следующая"
    'first_show' => 0, // не показывать ссылку на первую страницу
    'last_show' => 0, // не показывать ссылку на последнюю страницу
    'class_active' => 'active',
    'separator' => '<span class="pager_item visual empty">...</span>',
];

$result = mysqli_query($link, "SELECT * FROM products");
$count_products = mysqli_num_rows($result);
$page_count = ceil($count_products / $page_setting['limit']);
$page_left = $page - $page_setting['show']; // левая граница
$page_right = $page + $page_setting['show']; // правая граница
$page_prev = $page - 1; // номер предыдушей страницы
$page_next = $page + 1; // номер следующей страницы
if ($page_left < 2) {
    $page_left = 2;
} // левая граница не может быть меньше 2, так как 2 - первое целое число после 1
if ($page_right > ($page_count - 1)) {
    $page_right = $page_count - 1;
} // правая граница не может ровняться или быть больше, чем всего страниц
if ($page > 1) {
    $page_setting['prev_show'] = 1;
} // если текущая страница не первая, значит существует предыдущая
if ($page != 1) {
    $page_setting['first_show'] = 1;
} // показываем ссылку на первую страницу, если мы не на ней
if ($page < $page_count) {
    $page_setting['next_show'] = 1;
} // если текущая страница не последняя, значит существуюет следующая
if ($page != $page_count) {
    $page_setting['last_show'] = 1;
}

// выбираем данные в соответствии с настройками количества выводимых элементов и переданным GET параметром
$start = ($page - 1) * $page_setting['limit'];
$query = "SELECT * FROM products LIMIT {$start},{$page_setting['limit']}";

$result = mysqli_query($link, $query);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
}

mysqli_close($link);

$show_pager = !empty($products) && $count_products > (int)$page_setting['limit'];


// буферизация пагинации
ob_start();
pagePrint(1, 1, $page_setting['first_show'], $page_setting['class_active']);
if ($page_left > 2) {
    echo $page_setting['separator'];
}
for ($i = $page_left; $i <= $page_right; $i++) {
    $page_show = 1;
    if ($page == $i) {
        $page_show = 0;
    }
    pagePrint($i, $i, $page_show, $page_setting['class_active']);
}
if ($page_right < ($page_count - 1)) {
    echo $page_setting['separator'];
}
if ($page_count != 1) {
    pagePrint($page_count, $page_count, $page_setting['last_show'], $page_setting['class_active']);
}
$pager_content = ob_get_contents();
ob_end_clean();
