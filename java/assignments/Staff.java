/**
 * Staff
 */
public class Staff extends Person {
    private String school;
    private double pay;

    public Staff(String name, String address, String school, double pay) {
        super(name, address);
        this.school = school;
        this.pay = pay;
    }

    public void setStaff(String name, String address, String school, double pay) {
        setPerson(name, address);
        this.school = school;
        this.pay = pay;
    }

    @Override
    public String toString() {
        return "Person [name=" + this.name + ", address=" + this.address + ", School=" + school + ", pay=" + pay + "]";
    }

}
