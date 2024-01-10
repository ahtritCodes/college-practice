'''
Fibonacci Series upto N-th term.
printFib() function to generate the series. N should be taken from user input.
Implement checking for invalid inputs
'''


def printFib(n: int) -> list:
    f0 = 0
    f1 = 1

    lst = [f0, f1]

    if n == 1:
        return [f0]
    elif n == 2:
        return [f0, f1]
    else:
        for i in range(2, n):
            f2 = f0 + f1
            lst.append(f2)
            f0, f1 = f1, f2

    return lst


print()
n = input("enter n-th term for fibonacci seris: ")

try:
    n = int(n)
    if n < 0:
        n = abs(n)
        result = [str(x) for x in printFib(n)]
        print()
        print(f"Fibonacci Series upto {n}-th term: ")
        print("====================================")
        print(', '.join(result))
        print()
    elif n == 0:
        print("'n' must be greater than 0")
    else:
        result = [str(x) for x in printFib(n)]
        print()
        print(f"Fibonacci Series upto {n}-th term: ")
        print("====================================")
        print(', '.join(result))
        print()

except ValueError:
    print("Integer value required")
