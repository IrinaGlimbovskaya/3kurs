// Инициализация canvas и контекста
var canvas = document.getElementById("game");
var context = canvas.getContext("2d");


// Параметры игры
var Player_size = 20;
var Player_X = Player_size;
var Player_Y = Player_size;
var Lab_Size = 20;
var score = 0;

var map_board = [
	[1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1], 
	[1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 9, 1, 8, 0, 0, 1, 9, 9], 
	[1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 2, 2, 0, 0, 0, 1, 2, 1], 
	[1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1], 
	[1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 1, 0, 1, 0, 0, 0, 0, 1], 
	[1, 1, 1, 0, 1, 0, 1, 0, 1, 1, 1, 8, 0, 0, 1, 0, 0, 1, 1, 1], 
	[1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 0, 1], 
	[1, 1, 1, 0, 1, 0, 0, 0, 1, 0, 0, 2, 0, 1, 0, 0, 0, 1, 0, 1], 
	[1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1], 
	[1, 0, 1, 1, 1, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1], 
	[1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 1, 1, 1, 1, 0, 1, 0, 1, 0, 1], 
	[1, 1, 0, 0, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1], 
	[1, 0, 0, 0, 8, 1, 0, 0, 1, 0, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1], 
	[1, 0, 1, 1, 1, 1, 0, 1, 1, 0, 0, 1, 0, 1, 1, 0, 0, 1, 0, 1], 
	[1, 0, 0, 0, 1, 1, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 1], 
	[1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 1, 1, 0, 0, 0, 1], 
	[1, 0, 8, 0, 1, 0, 1, 1, 0, 1, 0, 1, 0, 0, 0, 1, 1, 0, 1, 1], 
	[1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1],
	[1, 0, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1], 
	[1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
   ];

//Считывание массива карты с файла (проблемы перевода массива из символов в число)  
if ( ! (window.File && window.FileReader && window.FileList && window.Blob)) {
	alert('The File APIs are not fully supported in this browser.');
  }
  function handleFileSelect(evt) {
	  var file = evt.target.files[0];
	  if (!file.type.match('text.*')) {
			  return alert(file.name + " is not a valid text file.");
	  }
	  var reader = new FileReader();
	  reader.readAsText(file);
	  reader.onload = function (e) {
		 var textToArray = reader.result.split("\n").map(function(x){return x.split(",")});
		 console.log(textToArray); 
	   };
	   map_board=Number(textToArray);
	   console.log(map_board);
   }
   
   
  window.onload = function () {
   document.getElementById('file').addEventListener('change', handleFileSelect, false); 
  }


// Обработчик события нажатия клавиши
document.addEventListener("keydown", function (event) {
	movePlayer(event.keyCode);
});


// Функция отрисовки игры
function drawGame() {
	// Очистка canvas
	context.clearRect(0, 0, canvas.width, canvas.height);

	//Вывод очков
	document.getElementById("score").innerHTML ="Score: "+ score;
	
	// Отрисовка лабиринта
	for (var i = 0; i < map_board.length; i++) {
		for (var j = 0; j < map_board[i].length; j++) {
			if (map_board[i][j] == 1) {//Стена
				context.fillStyle = "#000000";
			} 
			else if(map_board[i][j] == 2){//Шипы
				context.fillStyle = "#FF0000";
			}
			else if(map_board[i][j] == 8){//Бонус
				context.fillStyle = "#FFFF00";
			}
			else if(map_board[i][j] == 9){//Выход
				context.fillStyle = "#6900C6";
			}
			else {//Остальные
				context.fillStyle = "#ffffff";
			}
			context.fillRect(j * Lab_Size, i * Lab_Size, Lab_Size, Lab_Size);
		}
	}

	// Отрисовка игрока
	context.fillStyle = "#004DFF";
	context.fillRect(Player_X, Player_Y, Player_size, Player_size);
}

// Функция перемещения игрока
function movePlayer(keyCode) {
	//координаты игрока
	var newX = Player_X;
	var newY = Player_Y;


	if (keyCode == 37|| keyCode == 65) { // Влево
		newX -= Player_size;
	} else if (keyCode == 38 || keyCode == 87) { // Вверх
		newY -= Player_size;
	} else if (keyCode == 39 || keyCode == 68) { // Вправо
		newX += Player_size;
	} else if (keyCode == 40 || keyCode == 83) { // Вниз
		newY += Player_size;
	}

	// Проверка столкновения с лабиринтом
	if (newX >= 0 && newX < canvas.width - Player_size && newY >= 0 && newY < canvas.height - Player_size) {
		var mazeX = Math.floor(newX / Lab_Size);
		var mazeY = Math.floor(newY / Lab_Size);
		if (map_board[mazeY][mazeX] == 0) {
			Player_X = newX;
			Player_Y = newY;
		}
		//Столкновение с шипом
		else if(map_board[mazeY][mazeX] == 2){
			score-=10;
			map_board[mazeY][mazeX] = 0
			Player_X = newX;
			Player_Y = newY;
		}
		//Столкновение с бонусом
		else if(map_board[mazeY][mazeX] == 8){
			score+=10;
			map_board[mazeY][mazeX] = 0
			Player_X = newX;
			Player_Y = newY;
		}
		//Столкновение с выходом
		else if(map_board[mazeY][mazeX] == 9){
			
			map_board[mazeY][mazeX] = 0
			Player_X = newX;
			Player_Y = newY;
			alert('Победа! Красавчик, лучший, но это лёгкий уровень)');
			resetGame();
		}
		if (score < 0){
			alert('Поражение! Есть сомнения в твоих интелектуальных способностях т.к уровень очень лёгкий');
			resetGame();
			score=0;
		}
	}

	drawGame();
	
}

// Функция сброса игры
function resetGame() {
	Player_X = Player_size;
	Player_Y = Player_size;

	if(score == 0){
		map_board[4][5] = 2
		map_board[5][5] = 9
		map_board[5][6] = 2
		map_board[6][5] = 2
	}
	if(20 <= score){
		map_board[4][12] = 2
		map_board[8][5] = 9
		map_board[5][6] = 8
		map_board[9][7] = 2
	}



}

// Запуск игры
drawGame();