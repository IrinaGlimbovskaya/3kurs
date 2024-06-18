<!DOCTYPE html>
<html style="font-size: 16px;" lang="ru"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="​Тягульская Людмила Анатольевна​, Наша группа">
    <title>home</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="index.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    
    <?php
    // Подключение к базе данных и выполнение SQL-запроса
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "scelet";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT `id`, `name`, `surname`, `photo`, `site` FROM `users`";
    $result = $conn->query($sql);
    ?>
  
  <body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="ru">
    <section class="u-align-center u-clearfix u-section-1" id="sec-dfe3">
      <div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-align-center u-custom-font u-font-playfair-display u-large-text u-text u-text-variant u-text-1">Программная Инженерия<br>
        </p>
        <p class="u-align-center u-custom-font u-font-playfair-display u-large-text u-text u-text-variant u-text-2">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; РФ21Д​Р62ПИ</p>
        <div class="custom-expanded u-border-2 u-border-grey-dark-1 u-line u-line-horizontal u-line-1"></div>
      </div>
    </section>
    <section class="u-clearfix u-grey-5 u-section-2" id="sec-63bf">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="custom-expanded data-layout-selected u-clearfix u-gutter-10 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout" style="">
            <div class="u-layout-row" style="">
              <div class="u-container-style u-layout-cell u-left-cell u-size-31 u-size-xs-60 u-layout-cell-1" src="">
                <div class="u-container-layout u-container-layout-1">
                  <p class="u-align-center u-custom-font u-font-playfair-display u-large-text u-text u-text-default u-text-variant u-text-1"> Тягульская Людмила Анатольевна</p>
                  <p class="u-align-center u-custom-font u-font-playfair-display u-text u-text-2"> Куратор группы, заведующий кафедрой&nbsp;&nbsp;информатики и программной инженерии</p>
                </div>
              </div>
              <div class="u-align-center u-container-align-left u-container-style u-image u-image-round u-layout-cell u-radius u-right-cell u-size-29 u-size-xs-60 u-image-1" src="" data-image-width="640" data-image-height="640">
                <div class="u-border-1 u-border-grey-90 u-container-layout u-container-layout-2" src=""></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-section-3" id="sec-7508">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="custom-expanded data-layout-selected u-align-left u-clearfix u-gutter-2 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-col">
              <div class="u-size-30">
                <div class="u-layout-row">
                  <div class="u-align-center u-container-align-center u-container-style u-layout-cell u-right-cell u-size-60 u-layout-cell-1">
                    <div class="u-container-layout u-container-layout-1">
                      <p class="u-align-center u-custom-font u-font-playfair-display u-large-text u-text u-text-variant u-text-1"> Семейный Портрет</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="u-size-30">
                <div class="u-layout-row">
                  <div class="u-container-style u-image u-image-round u-layout-cell u-radius u-right-cell u-size-60 u-image-1" src="" data-image-width="907" data-image-height="823">
                    <div class="u-border-1 u-border-grey-75 u-container-layout u-container-layout-2"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-align-center u-clearfix u-grey-5 u-section-4" id="sec-8fa8">
      <div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-custom-font u-font-playfair-display u-large-text u-text u-text-variant u-text-1">Портфолио студентов</p>
        <div class="custom-expanded u-expanded-width-md u-expanded-width-sm u-layout-horizontal u-list u-list-1">
          <div class="u-repeater u-repeater-1">
            <?php
            // Динамическая генерация слайдов на основе данных из базы данных
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="u-container-layout u-similar-container u-container-layout-1">';
                        echo '<a href="' . $row["site"] . '" target="_blank">';
                        echo '<img class="custom-expanded u-border-1 u-border-grey-75 u-image u-image-round u-radius u-image-1" alt="" src="' . $row["photo"] . '">';
                        echo '</a>';
                        echo '<a href="' . $row["site"] . '" class="u-align-center u-border-active-palette-2-base u-border-hover-palette-1-base u-border-none u-btn u-button-style u-custom-font u-font-playfair-display u-none u-text-active-palette-2-base u-text-black u-text-hover-palette-1-dark-1 u-btn-1" target="_blank">' . $row["name"] . ' ' . $row["surname"] . '</a>';
                        echo '</div>';
                    }
                } else {
                    echo "0 results";
                }

                // Закрытие соединения с базой данных
                $conn->close();
             ?>
          </div>
          <a class="u-gallery-nav u-gallery-nav-prev u-grey-70 u-hover-palette-1-light-3 u-icon-rounded u-opacity u-opacity-70 u-radius u-spacing-10 u-text-hover-palette-1-dark-1 u-text-palette-1-light-3 u-gallery-nav-1" href="#" role="button">
            <span aria-hidden="true">
              <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
            </span>
            <span class="sr-only">
              <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
            </span>
          </a>
          <a class="u-gallery-nav u-gallery-nav-next u-grey-70 u-hover-palette-1-light-3 u-icon-rounded u-opacity u-opacity-70 u-radius u-spacing-10 u-text-hover-palette-1-dark-1 u-text-palette-1-light-3 u-gallery-nav-2" href="#" role="button">
            <span aria-hidden="true">
              <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
            </span>
            <span class="sr-only">
              <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
            </span>
          </a>
        </div>
        <div class="custom-expanded u-absolute-hcenter u-border-2 u-border-grey-dark-1 u-line u-line-horizontal u-line-1"></div>
      </div>
      
      
      
    </section>
    <section class="u-clearfix u-section-5" id="sec-c7e0">
      <div class="u-clearfix u-sheet u-sheet-1">
        <a href="schedule.php" class="u-align-center u-border-2 u-border-active-palette-2-dark-1 u-border-hover-palette-1-dark-1 u-border-palette-1-light-2 u-btn u-btn-round u-button-style u-custom-font u-font-playfair-display u-gradient u-none u-radius u-text-body-alt-color u-text-hover-white u-btn-1" target="_blank">Расписание учебных мероприятий</a>
      </div>
    </section>
    <section class="u-align-center u-clearfix u-grey-5 u-section-6" id="carousel_d767">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <p class="u-align-left u-custom-font u-font-playfair-display u-large-text u-text u-text-default-lg u-text-default-md u-text-default-sm u-text-default-xl u-text-variant u-text-1">Студенческий актив</p>
        <div class="custom-expanded u-border-2 u-border-grey-dark-1 u-line u-line-horizontal u-line-1"></div>
        <div class="u-expanded-width-sm u-expanded-width-xs u-list u-list-1">
          <div class="u-repeater u-repeater-1">
            <div class="u-align-left u-container-style u-custom-item u-list-item u-repeater-item u-shape-rectangle">
              <div class="u-container-layout u-similar-container u-container-layout-1">
                <p class="u-custom-font u-font-playfair-display u-text u-text-2">Председатель старостата, староста группы - Осипова Виктория</p>
              </div>
            </div>
            <div class="u-align-left u-container-style u-custom-item u-list-item u-repeater-item u-shape-rectangle">
              <div class="u-container-layout u-similar-container u-container-layout-2">
                <p class="u-custom-font u-font-playfair-display u-text u-text-3"> Профорг - Озтинен Дарья</p>
              </div>
            </div>
            <div class="u-align-left u-container-style u-custom-item u-list-item u-repeater-item u-shape-rectangle">
              <div class="u-container-layout u-similar-container u-container-layout-3">
                <p class="u-custom-font u-font-playfair-display u-text u-text-4"> Председатель студкома, комсорг - Нихолат Александра</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-align-center u-clearfix u-image u-shading u-section-7" src="" data-image-width="1280" data-image-height="853" id="sec-4604">
      <div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-custom-font u-font-playfair-display u-small-text u-text u-text-variant u-text-1">The best of the best : ИиПИ</p>
        <p class="u-custom-font u-font-playfair-display u-text u-text-2">alexandra.2003qwer@gmail.com </p>
        <p class="u-custom-font u-font-playfair-display u-text u-text-3">Координаты: от входа налево, 2 этаж</p>
        <p class="u-custom-font u-font-playfair-display u-text u-text-4">© Alexandra Niholat</p>
      </div>
    </section>
    
  
</body></html>