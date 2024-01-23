public class Square {
    protected double side;

    public Square(double side) {
        this.side = side;
    }

    public double getVolume() {
        // Volume of the base (square) in this case is just the area
        return side * side;
    }
}