public class Cylinder extends Square {
    private double height;

    public Cylinder(double side, double height) {
        super(side);
        this.height = height;
    }

    @Override
    public double getVolume() {
        // Volume of the cylinder is π * r^2 * h, where r is the side of the square
        // (base)
        return Math.PI * side * side * height;
    }
}