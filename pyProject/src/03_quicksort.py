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

    # inp = "10,80,30,90,40,50,70"
    inp = input("enter array numbers (comma seperated): ")

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
    print()
