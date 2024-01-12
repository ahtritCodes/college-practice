import java.util.Scanner;

/**
 * COMPLEX_NO
 */
public class COMPLEX_NO {

    private double real;
    private double imag;

    public COMPLEX_NO() {
        this.real = 0.0;
        this.imag = 0.0;
    }

    public COMPLEX_NO(double real, double imag) {
        this.real = real;
        this.imag = imag;
    }

    public double magnitude() {
        double x = this.real;
        double y = this.imag;
        return Math.sqrt(x * x + y * y);
    }

    public double argument() {
        double x = this.real;
        double y = this.imag;
        return Math.atan2(y, x);
    }

    public COMPLEX_NO add(COMPLEX_NO obj) {
        this.real += obj.real;
        this.imag += obj.imag;
        return this;
    }

    public COMPLEX_NO subtract(COMPLEX_NO obj) {
        this.real -= obj.real;
        this.imag -= obj.imag;
        return this;
    }

    public COMPLEX_NO conjugate() {
        this.imag = -this.imag;
        return this;
    }

    @Override
    public String toString() {
        return "(" + this.real + " + " + this.imag + "i" + ")";
    }

    // get inputs
    public static COMPLEX_NO getInputs(Scanner sc) {
        System.out.println("\tEnter real and imaginary parts of a complex number: ");
        System.out.print(" ");
        COMPLEX_NO obj = new COMPLEX_NO(sc.nextDouble(), sc.nextDouble());
        return obj;
    }

    // main method
    public static void main(String[] args) {
        COMPLEX_NO A, B, res;
        int choice;
        double result;

        Scanner sc = new Scanner(System.in);

        // Menu
        System.out.println("\n\tComplex Number Operations");
        System.out.println("\t===========================");
        do {
            System.out.println("\n\tMenu: ");
            System.out.println("\t========");
            System.out.println("\t1. Magnitude of Complex Number");
            System.out.println("\t2. Argument of Complex Number");
            System.out.println("\t3. Add two Complex Numbers");
            System.out.println("\t4. Subtract two Complex Numbers");
            System.out.println("\t5. Conjugate of Complex Number");
            System.out.println("\t6. Exit");
            System.out.println("\tEnter you choice: ");
            System.out.print(" ");
            choice = sc.nextInt();

            switch (choice) {
                case 1:
                    A = getInputs(sc);
                    result = A.magnitude();
                    System.out.println("\tMagnitude of the given complex number: " + String.format("%.4f", result));
                    break;
                case 2:
                    A = getInputs(sc);
                    result = A.argument();
                    System.out.println("\tArgument of the given complex number: " + String.format("%.4f", result));
                    break;
                case 3:
                    System.out.println("\tEnter two complex numbers");
                    A = getInputs(sc);
                    B = getInputs(sc);
                    res = A.add(B);
                    System.out.print("\tSum of " + A.toString() + " and " + B.toString() + " : ");
                    System.out.println(res.toString());
                    break;
                case 4:
                    System.out.println("\tEnter two complex numbers");
                    A = getInputs(sc);
                    B = getInputs(sc);
                    res = A.add(B);
                    System.out.print("\tDifference of " + A.toString() + " and " + B.toString() + " : ");
                    System.out.println(res.toString());
                    break;
                case 5:
                    A = getInputs(sc);
                    res = A.conjugate();
                    System.out.print("\tConjugate of " + A.toString() + " : ");
                    System.out.println(res.toString());
                    break;
                case 6:
                    System.exit(0);
                    break;

                default:
                    System.out.println("Invalid option. Please enter a valid option again.");
                    break;
            }
        } while (choice != 6);
    }
}