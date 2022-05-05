import os
import sys
import cv2
import numpy as np
from keras import backend as K
from keras.models import model_from_json
from PIL import Image


image_path = sys.argv[1]

# load json and create model
json_file = open('model/model_2/model.json', 'r')
loaded_model_json = json_file.read()
json_file.close()
model = model_from_json(loaded_model_json)
# load weights into new model
model.load_weights("model/model_2/model.h5")

im = Image.open(image_path)
im = im.crop( (150, 300, 406, 364) ) # previously, image was 826 pixels wide, cropping to 825 pixels wide
im.save('temporary.png') # saves the image
# im.show() # opens the image 

image = cv2.imread('temporary.png', cv2.IMREAD_GRAYSCALE)


alphabets = u"ABCDEFGHIJKLMNOPQRSTUVWXYZ-' "

def imgpreprocess(img):
    (h, w) = img.shape
    
    final_img = np.ones([64, 256])*255 #creates an array with value 255 which is blank white image
    
    # crop
    if w > 256:
        img = img[:, :256]
        
    if h > 64:
        img = img[:64, :]
    
    
    final_img[:h, :w] = img
    return cv2.rotate(final_img, cv2.ROTATE_90_CLOCKWISE)

def num_to_label(num):
    ret = ""
    for ch in num:
        if ch == -1:  # CTC Blank
            break
        else:
            ret+=alphabets[ch]
    return ret

image = imgpreprocess(image)
image = image/255.


pred = model.predict(image.reshape(1, 256, 64, 1))
decoded = K.get_value(K.ctc_decode(pred, input_length=np.ones(pred.shape[0])*pred.shape[1], greedy=True)[0][0])
print(num_to_label(decoded[0]))

os.remove('temporary.png', dir_df=None)