import cv2
import numpy as np

black_img = np.zeros((300,300), dtype=np.uint8)
cv2.rectangle(black_img, (100,100), (120,200), (255), -1)

cv2.imshow("rect", black_img)
cv2.waitKey(0)
cv2.destroyAllWindows()
