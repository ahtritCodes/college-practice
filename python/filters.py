import cv2
import numpy as np
import matplotlib.pyplot as plt

img = cv2.imread("./img/gauss-noise.png")

# gauss = np.random.normal(0, 1, img.size)
# gauss = gauss.reshape(img.shape[0], img.shape[1], img.shape[2]).astype('uint8')

# img_gauss = cv2.add(img,gauss)

# cv2.imwrite("gauss-noise.png", img_gauss)

# cv2.imshow('a', img_gauss)

kernel = np.ones((5, 5), np.float32) / 25
kernel2 = np.ones((3, 3), np.float32) / 25

dst = cv2.filter2D(img, -1, kernel)
dst2 = cv2.blur(img, (5, 5))


plt.subplot(121), plt.imshow(img), plt.title('Original')
plt.xticks([]), plt.yticks([])
# plt.subplot(122), plt.imshow(dst), plt.title('Averaging')
# plt.xticks([]), plt.yticks([])
plt.subplot(122), plt.imshow(dst2), plt.title('Averaging blur')
plt.xticks([]), plt.yticks([])
plt.show()

# cv2.waitKey(0)
# cv2.destroyAllWindows()
