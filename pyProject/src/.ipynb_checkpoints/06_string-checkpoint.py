# String Manipulation

import sys

def isvowel(ch: str) -> bool:
    vowels = ['a', 'e', 'i', 'o', 'u']
    if ch.lower() in vowels:
        return True
    else:
        return False


def vowelWordChange(w):

    l = len(w)
    if l == 1:
        return w

    start, end = w[0], w[l - 1]
    mid = w[1:l - 1]
    return end + mid + start


def wordChange(w):

    l = len(w)
    if l <= 2:
        return w[::-1]

    last, sec_last = w[l - 1], w[l - 2]
    a, b, c = w[:1], w[1:2], w[2:l - 2]
    return a + last + b + sec_last + c


# get input string
# inp = "I am Arunabha Saha. I love to travel in Himalayas"
inp = input("enter string: ")

if inp == "":
    print("ERROR: Null input given")
    sys.exit()

# extract words from the string
new_inp = ""
for char in inp:

    if char in ".,;!?":
        outChar = " %s" % char

    else:
        outChar = char
    new_inp += outChar

words = new_inp.split()

# manipulate strings according to rules
result = []
for word in words:

    if isvowel(word[0]):
        result.append(vowelWordChange(word))

    else:
        result.append(wordChange(word))

# display the output
output_str = ""
for x in result:
    if x in ".,;?!":
        output_str = output_str.strip()
        output_str += x + " "

    else:
        output_str = output_str + x + " "

print(output_str)
