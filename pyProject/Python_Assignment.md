# PYTHON ASSIGNMENT

## CMSA, VC, 23.11.2023

1. Write a program to generate Fibonacci series upto N-th term. Write printFib() function to generate the series. N should be taken from user input. Implement checking for invalid inputs.

```py
# Fibonacci Series upto N-th terms

def printFib(n: int) -> list:
    f0 = 0
    f1 = 1

    lst = [f0, f1]

    if n <= 1:
        return [f0]
    elif n == 2:
        return [f0, f1]
    else:
        for i in range(2, n):
            f2 = f0 + f1
            lst.append(f2)
            f0, f1 = f1, f2

    return lst


n = input("enter n-th term for fibonacci seris: ")

try:
    n = int(n)
    if n < 0:
        n = abs(n)
    elif n == 0:
        print("Zero Value not accepted")
    else:
        result = [str(x) for x in printFib(n)]
        print(f"Fibonacci Series upto {n}-th term: ")
        print("====================================")
        print(', '.join(result))

except ValueError:
    print("Integer value required")

```

2. Check all possible palindrome from a given paragraph. The paragraph should be provided in a file. Read the text from the file and store the resultsin a different file. Palindrome need to be checked word by word basis. Try to write a function to check palindrome.

```py

# Check palindrome from a given paragraph in a text file

def isPalindrome(word):
    word = word.lower()
    rev_word = word[::-1]
    if word == rev_word:
        return True
    else:
        return False


inp_file = "./paragraph.txt"
out_file = "./palindrome.txt"

with open(inp_file, "r") as f:

    pal = []
    for line in f:
        word_lst = line.strip().split()
        for w in filter(isPalindrome, word_lst):
            pal.append(w)


with open(out_file, "a") as f:
    temp = []
    for e in pal:
        if e not in temp:
            f.write(e)
            f.write("\n")
            temp.append(e)

```

3. Write a program to implement Quicksort algorithm. Take the inputs(all possible) and build the array from the user input. Report the pivot element and its position along with the array(or subarray) length. Print unsorted and sorted array in the output.

```py

# Quick sort algorithm

from array import array


def partition(arr, low, high):

    # choose pivot element
    pivot = arr[high]

    # index of smaller element and indicate
    # right position of pivot found so far
    i = low - 1

    for j in range(low, high):

        # if current element smaller than pivot
        if arr[j] <= pivot:

            # increment index of smaller element
            i += 1

            # swap the current with previous element
            arr[i], arr[j] = arr[j], arr[i]

    # swap the pivot element with actual position i.e (i+1)
    arr[i + 1], arr[high] = arr[high], arr[i + 1]

    # return the pivot position
    return (i + 1)


def quickSort(arr, low, high):

    # when low is less than high
    if low < high:

        # get the pivot position
        pivot_idx = partition(arr, low, high)

        # recursion call
        # sort the left and right
        # unsorted sub arrays recursively
        quickSort(arr, low, pivot_idx - 1)
        quickSort(arr, pivot_idx + 1, high)


if __name__ == "__main__":

    inp = "10,80,30,90,40,50,70"

    arr = array("I", [int(x) for x in inp.split(",")])
    high_idx = len(arr)

    print("Given array")
    print("===========")
    print(', '.join([str(x) for x in arr]))

    quickSort(arr, 0, high_idx - 1)

    print()
    print("Sorted Array")
    print("===========")
    print(', '.join([str(x) for x in arr]))

```

4. Take a list of numbers to find the GCD and LCM. Check for valid inputs. Use separate function to find GCD abd LCM.

```py

# GCD, LCM of two numbers
# a*b / gcd(a,b) = lcm(a,b)

from functools import reduce


def GCD(a, b):

    if a < b:
        a, b = b, a

    if b == 0:
        return a
    r = a % b
    return GCD(b, r)


def LCM(a, b):

    g = GCD(a, b)
    return (a * b) // g


inp = input("enter nums in comma seperated: ")

# checking for valid inputs
try:
    nums = [int(x) for x in inp.split(",")]
    if len(nums) < 2:

        print("Atleast two values required")
        exit()
    else:

        # calculating GCD and LCM
        res_gcd = reduce(GCD, nums)
        res_lcm = reduce(LCM, nums)

        # output
        print(f"GCD: {res_gcd}")
        print(f"LCM: {res_lcm}")

except ValueError as e:
    z = e.args[0].split()
    invalid_inp = z[len(z) - 1]
    print(f"Invalid input: {invalid_inp}; Integer required")
    print("Try again...")

```

5. Take a string as input to check whether the articles are placed correctly. The input string should be kept in a file. Find the erros and correct it if possible.

```py

def correct_article_placement(input_file, output_file):
    try:
        with open(input_file, 'r') as file:
            input_text = file.read()

        # Split the text into sentences
        sentences = input_text.split('.')

        # Check and correct article placement in each sentence
        corrected_sentences = []
        for sentence in sentences:
            words = sentence.split()
            if words:
                for i in range(len(words) - 1):
                    if words[i].lower() == 'a' and words[i + 1][0].lower() in ['a', 'e', 'i', 'o', 'u']:
                        words[i] = 'an'

                corrected_sentence = ' '.join(words)
                corrected_sentences.append(corrected_sentence)

        # Join the corrected sentences
        corrected_text = '. '.join(corrected_sentences)

        # Write the corrected text to the output file
        with open(output_file, 'w') as out_file:
            out_file.write(corrected_text)

        print(
            f"Article placement errors corrected. Corrected text saved to {output_file}")

    except FileNotFoundError:
        print("Input file not found.")
    except Exception as e:
        print("ERROR:", e.args)


# Drive code
input_file_path = './articles.txt'
output_file_path = './output.txt'

correct_article_placement(input_file_path, output_file_path)

```

6. Write a program to manipulate a string as mentioned below:
   a. Take an input string from the user
   b. If any word starts with a vowel then exchange the position of the letters at both end of that word; keep the output CASE sensative
   c. Otherwise the last two letters should be removed and placed at 2nd and 4th position
   keeping the rest of the part intact; keep the output CASE sensative
   d. Check for NULL string and report if encountered
   e. Design the code for possible exceptions as much as possible
   Input: I am Arunabha Saha. I love to travel in Himalayas.
   output: I ma arunabhA Saah. I eovl ot tlreav ni Hsiamalay.

```py

# String Manipulation

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
inp = "I am Arunabha Saha. I love to travel in Himalayas"

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

```

7. Write a menu driven program for left and right shift of a string. Take the string from the user input and mention the amount of shift. If the shift amount not mentioned then it will be
   shifted by 1 place by default. Write a function parametrized by direction(left or right) and
   the amount of shift(optional).

```py

# Menu driven program for left & right shift of a string

# function to shift the string based on the
# direction and shift amount

from consolemenu import *
from consolemenu.items import *

def shiftString(s: str, direct: str, shiftAmt=1) -> str:

    if direct.lower() == "left":
        res = s[shiftAmt:]
        return res

    elif direct.lower() == "right":
        res = s[:len(s) - shiftAmt]
        return res

    else:
        return f"{direct} not availabe"


def main():
    
    print("String Shifting")
    print("================")
    print()

    inp = input("Enter string: ")

    if inp != "":

        print("[1] Left\t[2] Right")
        direction = input("enter choice: ")

        shift = input("Enter shift amount: ")

        if direction == "1":
            if shift == "":
                result = shiftString(inp, "left")

            else:
                result = shiftString(inp, "left", int(shift))

        elif direction == "2":
            if shift == "":
                result = shiftString(inp, "right")

            else:
                result = shiftString(inp, "right", int(shift))

        else:
            print("Program quitting ...")
            exit()

    else:
        print("Empty string not valid")
        exit()

    print(result)


if __name__ == '__main__':
    main()



```

8. Write a program to arrange letters in lexicographically. Take a string as input and return letters in alphabetical order.

```py


# Arrange letter in lexicographical order

def lexOrder(s):
    r = sorted(s, key=str.lower)
    return r

    

def main():
    inp = "theonlysroy hello"
    print(' '.join(lexOrder(inp)))

# if __name__ == '__main__':
#   main()

if __name__ == '__live_coding__':
    main()
```

9. Write a program to mimic link list in python.

```py
# Implementing Linked List

class LinkedList:
    # class Node
    class Node:
        def __init__(self, data):
            self.data = data
            self.next = None

    def __init__(self):
        self.head = None

    # is_empty() method
    #  to verify if LL is empty or not
    def is_empty(self):
        return self.head is None

    # insert_at_end() method
    # to insert a node at the end of the LL
    def insert_at_end(self, data=0):
        new_node = self.Node(data)
        if self.head is None:
            self.head = new_node
            return
        curr = self.head
        while curr.next:
            curr = curr.next
        curr.next = new_node

    # insert_at_start() method
    # to insert a node at the start of the LL
    def insert_at_start(self, data=0):
        new_node = self.Node(data)
        new_node.next = self.head
        self.head = new_node

    # insert_at_mid() method
    # to insert a node at the middle of a LL

    def insert_at_mid(self, data=0, pos=0):
        if pos == 0 or self.head is None:
            self.insert_at_end(data)
            return

        curr = self.head
        k = 1
        while curr.next:
            k += 1
            if k == pos:
                break
            curr = curr.next
        new_node = self.Node(data)
        new_node.next = curr.next
        curr.next = new_node

    # remove_node() method
    # removes
    # the given valued node
    def remove_node(self, key=None):
        if self.head is None:
            return "Linked List is empty"

        if key is None:
            curr = self.head
            if curr.next is None:
                val = curr.data
                self.head = None
                curr = None
                return f"Data Node {val} is deleted"
            # remove from the end
            prev = None
            while curr.next:
                prev = curr
                curr = curr.next
            prev.next = None
            return f"Data Node {curr.data} deleted"

        else:
            curr = self.head
            if curr and curr.data == key:
                val = curr.data
                self.head = curr.next
                curr = None
                return f"Node {val} deleted"

            # search for the node to be deleted
            prev = None
            while curr.next and curr.data != key:
                prev = curr
                curr = curr.next

            # if the key is not present in the list
            if curr is None:
                return f"Invalid node"

            val = curr.data
            prev.next = curr.next
            curr = None
            return f"Node {val} deleted"

    # printLL() method
    # to print the linked list in order
    def printLL(self, message="Linked List"):
        print(message)
        print("=" * len(message))
        curr = self.head
        while curr:
            print(curr.data, end=" --> ")
            curr = curr.next
        print("None")
        print()


def main():
    ll = LinkedList()
    ll.insert_at_end(10)
    ll.insert_at_end(20)
    ll.insert_at_end(40)
    ll.insert_at_end(50)

    # displaying the list
    ll.printLL("Original List")

    # insert 0 at start
    ll.insert_at_start(0)
    ll.printLL("Inserted 0 at end")

    # inserted 30 at mid position 4
    ll.insert_at_mid(30, 4)
    ll.printLL("Inserted 30 at postion 4")

    # deleted node 0
    ll.remove_node(0)
    ll.printLL("Deleted node 0")

    # deleted node 30
    ll.remove_node(30)
    ll.printLL("Deleted node 30")


# Driver code
if __name__ == '__main__':
    main()

```

10. Write a program to convert decimal to hexadecimal numbers.

```py

# Convert decimal number format to hexadecimal

inp = input("enter decimal number: ")

try:
    n = int(inp)
    res = hex(n)[2:].upper()

    print(f"{inp} in hexadecimal is {res}")

except ValueError as e:
    z = e.args[0].split()
    invalid_inp = z[len(z) - 1]
    print(f"Integer expected; given {invalid_inp}")

```
