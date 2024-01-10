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
    print("Linked List Implementation")
    ll = LinkedList()
    ll.insert_at_end(10)
    ll.insert_at_end(20)
    ll.insert_at_end(40)
    ll.insert_at_end(50)

    # displaying the list
    ll.printLL("Original List")

    # insert 0 at start
    ll.insert_at_start(0)
    ll.printLL("Inserted 0 at start")

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
