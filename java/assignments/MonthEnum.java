public class MonthEnum {
    // Enum representing months and their corresponding days
    public enum MONTH {
        January(31), February(28), March(31), April(30),
        May(31), June(30), July(31), August(31),
        September(30), October(31), November(30), December(31);

        private final int days;

        MONTH(int days) {
            this.days = days;
        }

        public int getDays() {
            return days;
        }
    }

    public static void main(String[] args) {
        // a. Print all months and days in a tabular format
        System.out.println("a. All months and days in a tabular format:");
        System.out.println("___________________________");
        System.out.printf("|%-12s|%12s|%n", "Month", "Days");
        System.out.println("|------------|------------|");
        for (MONTH month : MONTH.values()) {
            System.out.printf("|%-12s|%12d|%n", month, month.getDays());
        }
        System.out.println("---------------------------");

        // b. Print name of the months having 31 days
        System.out.println("b. Months with 31 days:");
        for (MONTH month : MONTH.values()) {
            if (month.getDays() == 31) {
                System.out.println(month);
            }
        }
        System.out.println();

        // c. Count and print the number of months having number of days less than 31
        System.out.println("c. Number of months with less than 31 days:");
        int count = 0;
        for (MONTH month : MONTH.values()) {
            if (month.getDays() < 31) {
                count++;
                System.out.println(month);
            }
        }
        System.out.println("Total: " + count + " months");
    }
}
