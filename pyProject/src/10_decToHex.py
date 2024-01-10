
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
