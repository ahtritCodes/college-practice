import java.util.Scanner;

/**
 * HandleException
 */
public class HandleException {

    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        try {

            // Handling ArrayIndexOutOfBoundsException
            int[] arr = { 1, 2, 3, 4, 5 };
            System.out.println("\tEnter an index to fetch array value");
            int index = sc.nextInt();
            System.out.println("\tArray Element at index " + index + " : " + arr[index]);

            // Handling for ArithmeticException
            System.out.println("\tEnter divident and divisor to peform division");
            int i = sc.nextInt();
            int j = sc.nextInt();
            int quo = i / j;
            System.out.println("\tQuotient of division: " + quo);

        } catch (ArrayIndexOutOfBoundsException e) {
            System.out.println("ERROR: " + e.getMessage());
        } catch (ArithmeticException e) {
            System.out.println("ERROR: " + e.getMessage());
        } catch (Exception e) {
            System.out.println("Other exception occured: " + e.getMessage());
        } finally {
            sc.close();
        }
    }
}