# Menu driven program for left & right shift of a string

# function to shift the string based on the
# direction and shift amount
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

        shift = input("Enter shift amount (optional): ")

        if direction == "1":
            if shift == "":
                print("Default 1 place shift")
                result = shiftString(inp, "left")

            else:
                result = shiftString(inp, "left", int(shift))

        elif direction == "2":
            if shift == "":
                print("Default 1 place shift")
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
    print()


if __name__ == '__main__':
    main()
