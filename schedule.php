<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "scelet";

    // Подключаемся к базе данных для заполнения таблицы с экзаменами
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT `id`, `DayOfWeek`, DATE_FORMAT(date,'%d/%m/%Y') as Date, `Subject`, `Teacher`, `Classroom`, `LessonNumber`, `EventType` FROM `exams` WHERE 1";
    $result = $conn->query($sql);

    if ($result === false) {
        die("Error executing query: " . $conn->error);
    }
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <meta name="keywords" content="">
        <meta name="description" content="">
        <title>schedule</title>
        <link rel="stylesheet" href="nicepage.css" media="screen">
        <link rel="stylesheet" href="schedule.css" media="screen">
        <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
        <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
        <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Playfair Display', sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f2f2f2;
            }
            .download-link {
                display: inline-block;
                width: fit-content;
                font-family: 'Playfair Display', sans-serif;
                background-color: #9370DB;
                color: white;
                border: none;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                font-size: 18px;
                margin: 4px 2px;
                cursor: pointer;
                border-radius: 15px;
            }
            .download-link:hover {
                background-color: #9400D3; /* Фиолетовый цвет при наведении */
                color: white;
            }
            .data-table {
                font-family: 'Playfair Display', sans-serif;
                font-size: 18px;
                width: 100%;
                border-collapse: collapse;
                margin-top: 30px;
                margin-left: 10px;
                margin-bottom: 20px;
                overflow: hidden;
            }
            .data-table th,
            .data-table td {
                border: 4px solid white;
                padding: 8px;
                text-align: center;
            }
            .data-table th {
                background-color: #9370DB;
                color: white;
            }
            .data-table tr:nth-child(even) {
                background-color: #F0F8FF;
            }
            #daySelect {
                font-family: 'Playfair Display', sans-serif;
                font-size: 18px;
                border: 2px solid #ccc;
                border-radius: 15px;
                padding: 10px;
                margin-top: 30px;
            }
            .day-dropdown {
                text-align: center;
            }
            #schedule-table th:first-child {
                width: 140px; /* Установите нужную вам ширину для столбца "Время" */
            }
            #schedule-table th:nth-child(3) {
                width: 600px; /* Установите нужную вам ширину для столбца "Время" */
            }
            /* Стили для надписи о четности недели */
            .week-info {
                font-family: 'Playfair Display', sans-serif;
                margin-top: 30px; /* Расстояние сверху */
                font-size: 18px; /* Размер шрифта */
                color: #555; /* Цвет текста */
            }
            .star {
                font-size: 20px; /* рамер звездочки */
            }

        </style>
    </head>

    <body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="ru">
        <section class="u-align-center u-clearfix u-section-1" id="carousel_149b">
            <div class="u-clearfix u-sheet u-sheet-1">
                <p class="u-align-right u-custom-font u-font-playfair-display u-large-text u-text u-text-default u-text-variant u-text-1">Расписание</p>
                <div class="custom-expanded u-border-2 u-border-grey-dark-1 u-line u-line-horizontal u-line-1"></div>
                <div class="container">
                    <button id="lessonsBtn" class="btn" onclick="loadLessons()">Расписание пар</button>
                    <button id="examsBtn" class="btn" onclick="loadData()">Расписание экзаменов и зачетов</button>
                    <a href="schedule.xlsx" class="download-link" download>Скачать расписание пар</a>
                    
                    <!-- Выпадающий список дней недели -->
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div id="dayDropdown" style="display: none;">
                            <select id="daySelect" name="selectedDay" onchange="this.form.submit()">
                                <option value="">День недели</option>
                                <option value="Понедельник">Понедельник</option>
                                <option value="Вторник">Вторник</option>
                                <option value="Среда">Среда</option>
                                <option value="Четверг">Четверг</option>
                                <option value="Пятница">Пятница</option>
                            </select>
                        </div>
                    </form>

                    <!-- Таблица для отображения расписания -->
                    <table id="schedule-table" class="data-table" style="display: none;">
                            <tr>
                                <th>Время</th> <!-- Добавлен заголовок для времени -->
                                <th>Номер пары</th>
                                <th>Предмет</th>
                                <th>Преподаватель</th>
                                <th>Аудитория</th>
                                <th>Подгруппа</th>
                            </tr>
                        <tbody>
                            <!-- Содержимое таблицы будет добавлено динамически -->
                        </tbody>
                    </table>
                    <!-- Надпись о четности недели -->
                    <div class="week-info">
                        <span class="star" style="color: #ffd800;">&#9733;</span><span> - нечетная неделя,  <span  class="star" style="color: #009900;">&#9733;</span> - четная неделя</span>
                    </div>

                    <!-- Таблица для отображения расписания экзаменов -->
                    <table id="exams-table" class="data-table" style="display: none;">
                        <thead>
                            <tr>
                                <!--<th>День недели</th>
                                <th>Дата</th>-->
                                <th>Предмет</th>
                                <th>Преподаватель</th>
                                <!--<th>Аудитория</th>
                                <th>Номер пары</th>-->
                                <th>Событие</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Содержимое таблицы будет добавлено динамически -->
                        </tbody>
                    </table>

                    <!-- Добавляем скрипт для загрузки данных по нажатию на кнопку -->
                    <script>
                        function loadData() {
                            var table = document.getElementById('exams-table');
                            var btnText = document.getElementById('examsBtn');

                            // Проверяем текущее состояние таблицы
                            if (table.style.display === 'none') {
                                // Если таблица скрыта, показываем её
                                table.style.display = 'table';
                                // Очищаем содержимое таблицы
                                table.getElementsByTagName('tbody')[0].innerHTML = '';

                                // Изменяем текст кнопки на "Скрыть расписание"
                                btnText.innerHTML = "Скрыть расписание";

                                // JavaScript код для динамического заполнения таблицы с экзаменами
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "var row = document.createElement('tr');";
                                        echo "row.innerHTML = '<td>{$row['Subject']}</td><td>{$row['Teacher']}</td><td>{$row['EventType']}</td>';";
                                        //echo "row.innerHTML = '<td>{$row['DayOfWeek']}</td><td>{$row['Date']}</td><td>{$row['Subject']}</td><td>{$row['Teacher']}</td><td>{$row['Classroom']}</td><td>{$row['LessonNumber']}</td><td>{$row['EventType']}</td>';";
                                        echo "table.getElementsByTagName('tbody')[0].appendChild(row);";
                                    }
                                }
                                ?>
                            } else {
                                // Если таблица видима, скрываем её
                                table.style.display = 'none';
                                // Изменяем текст кнопки на "Расписание экзаменов и зачетов"
                                btnText.innerHTML = "Расписание экзаменов и зачетов";
                            }

                            // Установим ширину для столбцов 
                            //table.rows[0].cells[1].style.width = "120px"; // Ширина столбца "Дата"
                            //table.rows[0].cells[6].style.width = "160px"; // Ширина столбца "Событие"
                            table.rows[0].cells[3].style.width = "80px"; // Ширина столбца "Предмет"
                        }
                        
                        function loadLessons() {
                            var dropdown = document.getElementById('dayDropdown');
                            var table = document.getElementById('schedule-table');
                            var btnText = document.getElementById('lessonsBtn');

                            // Проверяем текущее состояние таблицы
                            if (table.style.display === 'none') {
                                // Если таблица скрыта, показываем её
                                table.style.display = 'table';
                                // Очищаем содержимое таблицы
                                table.getElementsByTagName('tbody')[0].innerHTML = '';

                                // Изменяем текст кнопки на "Скрыть расписание"
                                btnText.innerHTML = "Скрыть расписание";

                                // Показываем выпадающий список дней недели
                                dropdown.style.display = 'block';
                                
                            
                            } else {
                                // Если таблица видима, скрываем её
                                table.style.display = 'none';
                                // Изменяем текст кнопки на "Расписание пар"
                                btnText.innerHTML = "Расписание пар";

                                // Скрываем выпадающий список дней недели
                                dropdown.style.display = 'none';
                            }
                        }

                    </script>

                    <?php
                        // Проверяем, был ли отправлен POST-запрос
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (!empty($_POST["selectedDay"])) {
                                $selectedDay = $_POST["selectedDay"];

                                // Подключаемся к базе данных
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                // Проверяем подключение
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // Подготовленный запрос для выбора расписания по дню недели
                                $sql = "SELECT `id`, `DayName`, `number`, `Subject`, `prepod`, `Classroom`, `GroupNumber` FROM `schedule` WHERE `DayName` = ?";

                                // Подготавливаем запрос
                                $stmt = $conn->prepare($sql);

                                // Привязываем параметр
                                $stmt->bind_param("s", $selectedDay);

                                // Выполняем запрос
                                $stmt->execute();

                                // Получаем результат
                                $result = $stmt->get_result();

                                // Проверяем наличие результатов
                                if ($result->num_rows > 0) {
                                    echo "<table id='schedule-table' class='data-table'>";
                                    echo "<thead><tr><th>Время</th><th>Номер пары</th><th>Предмет</th><th>Преподаватель</th><th>Аудитория</th><th>Подгруппа</th></tr></thead>";
                                    echo '<tbody>';
                                    
                                    // Создаем массив с временем пар
                                    $lessonTimes = array(
                                        "8:00 - 9:30",
                                        "9:40 - 11:10",
                                        "11:25 - 12:55",
                                        "13:05 - 14:35"
                                    );
                                    
                                    // Перебираем время пар
                                    foreach ($lessonTimes as $time) {
                                        echo "<tr><td>$time</td>";
                                        
                                        // Проверяем наличие данных о паре в базе данных
                                        $row = $result->fetch_assoc();
                                        if ($row) {
                                            // Если есть данные, выводим их
                                            echo "<td>" . $row['number'] . "</td><td>" . $row['Subject'] . "</td><td>" . $row['prepod'] . "</td><td>" . $row['Classroom'] . "</td><td>" . $row['GroupNumber'] . "</td></tr>";
                                        } else {
                                            // Если данных о паре нет, выводим пустые ячейки
                                            echo "<td></td><td></td><td></td><td></td><td></td></tr>";
                                        }
                                    }
                                    
                                    echo '</tbody></table>';
                                } else {
                                    echo "0 результатов";
                                }

                                // Закрываем подготовленный запрос и соединение
                                $stmt->close();
                                $conn->close();
                            }
                        }
                    ?>

                </div>
            </div>
        </section>
        <!-- Добавлен закрывающий тег </body> и </html> -->
        <section class="u-align-center u-clearfix u-image u-shading u-section-2" src="" data-image-width="1280" data-image-height="853" id="sec-febc">
            <div class="u-clearfix u-sheet u-sheet-1">
                <p class="u-custom-font u-font-playfair-display u-small-text u-text u-text-variant u-text-1"> The best of the best : ИиПИ</p>
                <p class="u-custom-font u-font-playfair-display u-text u-text-2">alexandra.2003qwer@gmail.com </p>
                <p class="u-custom-font u-font-playfair-display u-text u-text-3">Координаты: от входа налево, 2 этаж</p>
                <p class="u-custom-font u-font-playfair-display u-text u-text-4">© Alexandra Niholat</p>
            </div>
        </section>
    </body>
</html>


