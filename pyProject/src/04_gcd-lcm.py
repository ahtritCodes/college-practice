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
