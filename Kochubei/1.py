import random, os

def get_number_of_mines(field_size):
    """Функция получает от пользователя и возвращает количество минут.
         Проверяет, было ли предоставлено целое число.
         Функция получает размер поля."""
    while (True):
        try:
            mines = int(input("Введите количество мин на доске: "))
        except ValueError:
            print("Целое число не введено")
        else:
            if mines >= field_size and mines < 1:
                print("ОШИБКА! Пожалуйста, введите правильное количество минут: ")
            else:
                return mines

def deploy_mines(mines, width, height):
    """Функция создает двумерный массив и заполняет его минами в случайных местах.
         В качестве аргументов принимает количество мин, ширину и высоту поля.
         Возвращает массив мин."""
    #временный массив, который будет возвращен. значение 9 = мое в этом квадрате.
    tmparr=[[0 for x in range(width)] for y in range(height)]
    tmpMines=mines#чтобы проверить, что все мины были установлены
    while(True):
        if tmpMines==0:
            return tmparr
        # переменные для рандомизации позиций min
        tmpx = random.randint(0, height - 1)
        tmpy = random.randint(0, width - 1)
        #print("я вставил do x: ", tmpx, " y:", tmpy)
        if 0 == tmparr[tmpx][tmpy]:
            tmparr[tmpx][tmpy]=9
            tmpMines-=1

def number_of_neighboring_mines(zMinami, x, y):
    """
    Функция возвращает количество мин на соседних полях.
     В качестве параметров он принимает следующее:
     шахта доска
     координаты текущей проверяемой ячейки (x,y)
    """
    nom=0### количество мин
    for i in range(-1, 2):
        for j in range(-1, 2):
            if (i==0 and j==0) or x+i<0 or y+j<0:
                pass
            else:
                try:
                    zMinami[x+i][y+j]==9
                except IndexError:
                    pass
                else:
                    if int(zMinami[x+i][y+j])==9:
                        nom+=1
    return nom

def create_board(zMinami):
    """
    Функция дополняет таблицу с минами, задавая оставшиеся поля с количеством мин в полях вокруг.
     Принимает щит с минами.
     Возвращает заполненный массив.
    """
    height= len(zMinami)
    width= len(zMinami[0])
    for i in range(height):
        for j in range(width):
            if zMinami[i][j]==0:
                zMinami[i][j]=number_of_neighboring_mines(zMinami, i, j)
    return zMinami


def reveal_squears(tabGlowna, tabCzyOdkryte, x, y):
    """
    Функция обнаружения полей.
     В качестве аргументов принимает:
     :param tabGlowna: таблица с минами и количеством мин в соседних полях
     :tabparamDiscovered: таблица, в которой отслеживаются уже обнаруженные поля. Нужен для показа.
     :param x: координата обнаруженного поля
     :params: координата обнаруженного поля
     :возврат: ничего
    """
    if tabGlowna[x][y]!=0:
            tabCzyOdkryte[x][y]=1
    else:
        #Таблица Выявлено[x][y] = 1
        for i in range(-1, 2):
            for j in range(-1, 2):
                if (i == 0 and j == 0) or x + i < 0 or y + j < 0 or x+i>len(tabGlowna)-1 or y+j>len(tabGlowna[0])-1:
                    tabCzyOdkryte[x][y] = 1
                else:
                    if tabCzyOdkryte[x+i][y+j]==0:
                        tabCzyOdkryte[x + i][y + j] = 1
                        reveal_squears(tabGlowna, tabCzyOdkryte, x+i, y+j)
        #выявить_squears (вкладка Glowna, вкладка CzyOdkryte, i, j)

def print_board(tabGlowna, tabCzyOdkryte):
    kolumny=" "
    for z in range(len(tabGlowna)):
        kolumny+=str(z)
        kolumny+=" "
    print(kolumny)
    print((" " + chr(9473)) * len(tabGlowna))
    rzad=" "
    for i in range(len(tabGlowna[0])):
        rzad = chr(9475)
        for j in range(len(tabGlowna)):
            if tabCzyOdkryte[i][j]==0:
                rzad += " " #gdy не раскрытый
                rzad += chr(9475)
            else:
                if tabGlowna[i][j]==9:
                    rzad += "*"
                    rzad += chr(9475)
                elif tabGlowna[i][j]==0:
                    rzad += "0" #gdy раскрытый
                    rzad += chr(9475)
                else:
                    rzad += str(tabGlowna[i][j])
                    rzad += chr(9475)
        print(rzad+str(i))
        print((" " + chr(9473)) * len(tabGlowna))

def is_over(tabCzyOdkryte):
    """
    проверяет, закончилась ли игра (все ли пустые клетки были открыты)
     :return: количество уже обнаруженных полей
    """
    tmp_control=0
    for i in range(len(tabCzyOdkryte)):
        for j in range(len(tabCzyOdkryte[0])):
            if tabCzyOdkryte[i][j]==1:
                tmp_control+=1
    return tmp_control

def sapper():
    while(True):
        try:
            width = int(input("Введите ширину: "))
        except ValueError:
            print("Целое число не введено")
        else:
            break
    while(True):
        try:
            height = int(input("Введите высоту: "))
        except ValueError:
            print("Целое число не введено")
        else:
            break
    mines = get_number_of_mines(width*height)
    tab_with_mines = deploy_mines(mines, width, height)
    tab_final = create_board(tab_with_mines)
    ### Создайте массив, который сообщает вам, должны ли отображаться поля
    tabCzyOdkryte = [[0 for x in range(width)] for y in range(height)]
    #os.system('cls')
    #os.system('clear')
    kontrola_konca_gry = height*width-mines #количество полей без мин. Если так много квадратов открыто, это победа
    print_board(tab_final, tabCzyOdkryte)
    while(True):        
        while (True):
            try:
                x = int(input("Введите координату y: "))
            except ValueError:
                print("Целое число не введено")
            else:
                break
        while (True):
            try:
                y = int(input("Введите координату x: "))
            except ValueError:
                print("Целое число не введено")
            else:
                break
        if tab_final[x][y]==9:
            reveal_squears(tab_final, tabCzyOdkryte, x, y)
            print_board(tab_final, tabCzyOdkryte)
            print("ты проиграл!")
            break
        else:
            reveal_squears(tab_final, tabCzyOdkryte, x, y)
            print_board(tab_final,  tabCzyOdkryte)
            if kontrola_konca_gry == is_over(tabCzyOdkryte):
                print("Поздравляем! Ты выиграл!")
                break

if __name__ == '__main__':
    sapper()
