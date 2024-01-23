// /**
//  * Person
//  */
// class Person {
//     protected String name;
//     protected String address;

//     public Person(String name, String address) {
//         this.name = name;
//         this.address = address;
//     }

//     public void setPerson(String name, String add) {
//         this.name = name;
//         this.address = add;
//     }

//     @Override
//     public String toString() {
//         return "Person [name=" + name + ", address=" + address + "]";
//     }

// }

// /**
//  * Student
//  */
// class Student extends Person {
//     private String program;
//     private String year;
//     private double fees;

//     public Student(String name, String address, String prog, String year, double fees) {
//         super(name, address);
//         this.program = prog;
//         this.year = year;
//         this.fees = fees;
//     }

//     public void setStudent(
//             String name, String address, String program, String year, double fees) {
//         setPerson(name, address);
//         this.program = program;
//         this.year = year;
//         this.fees = fees;
//     }

//     @Override
//     public String toString() {
//         String displayStr = "Person[" + "name=" + this.name + ",address=" + this.address + ",Program=" + this.program
//                 + ",Year=" + this.year + ",Fees=" + this.fees;
//         return displayStr;
//     }
// }

// /**
//  * Staff
//  */
// class Staff extends Person {
//     private String school;
//     private double pay;

//     public Staff(String name, String address, String school, double pay) {
//         super(name, address);
//         this.school = school;
//         this.pay = pay;
//     }

//     public void setStaff(String name, String address, String school, double pay) {
//         setPerson(name, address);
//         this.school = school;
//         this.pay = pay;
//     }

//     @Override
//     public String toString() {
//         return "Person [name=" + this.name + ", address=" + this.address + ", School=" + school + ", pay=" + pay + "]";
//     }

// }

/**
 * Main
 */
public class PersonMain {
    public static void main(String[] args) {
        Person person = new Person("John", "123 Main St");
        System.out.println(); 
        System.out.println(person);

        Student student = new Student("Alice", "456 University Ave", "Computer Science", "Sophomore", 5000.0);
        System.out.println(); 
        System.out.println(student);

        Staff staff = new Staff("Bob", "789 School Rd", "High School", 60000.0);
        System.out.println(); 
        System.out.println(staff);

        // updating student
        System.out.println(); 
        System.out.println("\tUpdating Student and Staff details");
        student.setStudent("Ahtrit", "R.A. Sarani", "CMSA", "2024", 12885.00);

        System.out.println(); 
        System.out.println(student);

        // updating staff
        staff.setStaff("Sroy", "24 M.B Road", "CAEHS", 7000);
        System.out.println(); 
        System.out.println(staff);

    }
}