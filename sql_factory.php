<?php

$title = "Как работает и зачем необходим стабилизатор напряжения";
$description = "Стабилизаторы ЭНЕРГОТЕХ - это устройства, которые разработаны с учетом реальных условий отечественных сетей электропитания, и способны удовлетворить требования самого изысканного потребителя.";
$image = "/upload/1.png";

$sql = "INSERT INTO products(title, description, image) values($title, $description, $image)";

for($i = 1; $i <= 20; $i++) mysqli_query($link, $sql);