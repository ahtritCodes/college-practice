import java.util.Scanner;

// class Square {
//     protected double side;

//     public Square(double side) {
//         this.side = side;
//     }

//     public double getVolume() {
//         // Volume of the base (square) in this case is just the area
//         return side * side;
//     }
// }

// class Cylinder extends Square {
//     private double height;

//     public Cylinder(double side, double height) {
//         super(side);
//         this.height = height;
//     }

//     @Override
//     public double getVolume() {
//         // Volume of the cylinder is π * r^2 * h, where r is the side of the square
//         // (base)
//         return Math.PI * side * side * height;
//     }
// }

public class VolumeDemo {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        System.out.print("Enter the side length of the square: ");
        double side = scanner.nextDouble();

        System.out.print("Enter the height of the cylinder: ");
        double height = scanner.nextDouble();

        Square square = new Square(side);
        Cylinder cylinder = new Cylinder(side, height);

        System.out.println("Volume of the square: " + String.format("%.3f", square.getVolume()));
        System.out.println("Volume of the cylinder: " + String.format("%.3f", cylinder.getVolume()));

        scanner.close();
    }
}
