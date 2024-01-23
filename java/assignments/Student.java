/**
 * Student
 */
public class Student extends Person {
    private String program;
    private String year;
    private double fees;

    public Student(String name, String address, String prog, String year, double fees) {
        super(name, address);
        this.program = prog;
        this.year = year;
        this.fees = fees;
    }

    public void setStudent(
            String name, String address, String program, String year, double fees) {
        setPerson(name, address);
        this.program = program;
        this.year = year;
        this.fees = fees;
    }

    @Override
    public String toString() {
        String displayStr = "Person[" + "name=" + this.name + ",address=" + this.address + ",Program=" + this.program
                + ",Year=" + this.year + ",Fees=" + this.fees;
        return displayStr;
    }
}