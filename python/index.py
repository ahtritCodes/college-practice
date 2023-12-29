
import cv2
import numpy as np

# img = cv2.imread("./img/boy.jpg")
# res = img.shape
# out_img = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)

# conver_method = [i for i in dir(cv2) if i.startswith('COLOR_')]

# print(conver_method)

# cv2.imshow("Test", img)
# cv2.imshow("Test", out_img)

# ==============================


# def nothing(x):
#     pass


# # Create a black image, a window
# img = np.zeros((512, 512, 3), np.uint8)
# cv2.namedWindow('image', cv2.WINDOW_NORMAL)

# # create trackbars for color change
# cv2.createTrackbar('R', 'image', 0, 255, nothing)
# cv2.createTrackbar('G', 'image', 0, 255, nothing)
# cv2.createTrackbar('B', 'image', 0, 255, nothing)


# while True:
# 	cv2.imshow('image', img)
#     # if cv2.waitKey(1) == ord('q'):
#     #     break

# 	# get current positions of three trackbars
# 	r = cv2.getTrackbarPos('R', 'image')
# 	g = cv2.getTrackbarPos('G', 'image')
# 	b = cv2.getTrackbarPos('B', 'image')

# 	img[:] = [b, g, r]



cv2.waitKey(0)
cv2.destroyAllWindows()
