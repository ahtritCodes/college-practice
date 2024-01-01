
import cv2
import numpy as np

img = cv2.imread("./img/BGR.png")

b = img[:,:,0]
g = img[:,:,1]
r = img[:,:,2]

size = img.shape[:2]
zeros = np.zeros(size, dtype=np.uint8)

# blue_BGR = zeros[:,:,0] = b
# green_BGR = zeros[:,:,1] = g
# red_BGR = zeros[:,:,2] = r

# new_img = np.vstack((red_BGR, np.hstack((blue_BGR, green_BGR))))

# cv2.imwrite("./img/Blue_BGR.png", blue_BGR)


# blue_BGR = cv2.merge((b, zeros, zeros))
# z = blue_BGR.shape

# red_BGR = cv2.merge((zeros, zeros, r))
# cv2.imwrite("./img/Red_BGR.png", red_BGR)
# cv2.imwrite("./img/Blue_BGR.png", blue_BGR)
# cv2.imshow("Blue Channel", blue_BGR)

# new_img = cv2.imread("./img/Red_BGR.png")
# cv2.imshow("original", img)
# cv2.imshow("new img", new_img)

cv2.waitKey()
cv2.destroyAllWindows()
