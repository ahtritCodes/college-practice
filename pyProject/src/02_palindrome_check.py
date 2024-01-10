# Check palindrome from a given paragraph in a text file

from time import time
import sys

# function to if any word
#  is palindrome or not
def isPalindrome(word):
    word = word.lower()
    rev_word = word[::-1]
    if word == rev_word:
        return True
    else:
        return False


# main method of execution
def main():

    print("\nChecking palindrome words in a given paragraph")
    print("===============================================")
    print()

    inp_file = input("enter filename (with extension): ")

    pal_words = []

    try:
        with open(inp_file, "r") as f:

            for line in f:
                word_lst = line.strip().split()
                for w in filter(isPalindrome, word_lst):
                    if w not in pal_words:
                        pal_words.append(w)

        if len(pal_words) > 0:

            out_file = "./" + "palindrome_" + str(int(time())) + ".txt"

            try:
                with open(out_file, "a") as f:
                    for e in pal_words:
                        f.write(e)
                        f.write("\n")

                print(f"Output file {out_file} generated")
                print()

            except Exception as e:
                print(f"ERROR: {e.args}")
                sys.exit()

        else:
            print("No palindrome words found in file")
            print()

    except Exception as e:
        print(f"ERROR: {e.args}")


# Driver code
if __name__ == '__main__':
    main()
