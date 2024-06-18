import numpy as np
import matplotlib.pyplot as plt
from sklearn import svm

# Генерация случайных точек на плоскости
num_points = 15
good_points = np.random.normal(2, 1, (num_points, 2))
bad_points = np.random.normal(-2, 1, (num_points, 2))
points = np.concatenate((good_points, bad_points), axis=0)
labels = np.array([1] * num_points + [0] * num_points)

# Создание и обучение модели метода опорных векторов
model = svm.SVC(kernel='linear')
model.fit(points, labels)

# Визуализация разделения точек
plt.scatter(good_points[:, 0], good_points[:, 1], color='green', label='Good Points')
plt.scatter(bad_points[:, 0], bad_points[:, 1], color='yellow', label='Bad Points')

# Получение коэффициентов разделяющей гиперплоскости
w = model.coef_[0]
b = model.intercept_[0]

# Вычисление координат x и y для построения разделяющей линии
x = np.linspace(-5, 5, 15)
y = -(w[0] * x + b) / w[1]

plt.plot(x, y, color='gray', linewidth=2, label='Decision Boundary')

plt.legend()
plt.show()
