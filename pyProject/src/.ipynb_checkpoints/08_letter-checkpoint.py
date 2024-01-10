
def sort_letters(inp_str):

    words = inp_str.strip().split()
    srt_words = []
    for val in words:
        srt_words.append(''.join(sorted(val)))

    return (' '.join(srt_words))


def main():

    print("Arrange Letters Lexicographically")
    print("=================================")
    print()

    inp = input("enter a string: ")

    result = sort_letters(inp)

    print("\nSorted letters: ")
    print(result)


if __name__ == '__main__':
    main()
