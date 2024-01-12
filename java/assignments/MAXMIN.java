import java.util.Scanner;

public class MAXMIN {
    private int m;
    private int n;
    private int[][] matrix;

    public MAXMIN(int m, int n) {
        this.m = m;
        this.n = n;
        this.matrix = new int[m][n];
    }

    public void inputMatrix() {
        Scanner sc = new Scanner(System.in);
        System.out.println("\tEnter the " + m + "x" + n + " matrix:");
        for (int i = 0; i < m; i++) {
        	System.out.print("\t"); 
            for (int j = 0; j < n; j++) {
                matrix[i][j] = sc.nextInt();
            }
        }
    }

    public void printMatrix() {
    	System.out.println("\nResult of row and column min:\n"); 
        System.out.print("\t\t" + m + "x" + n);
        System.out.print("\t\t|");
        System.out.println(" Row Minimum");
        System.out.println("\t\t------------------------------");
        for (int i = 0; i < m; i++) {
            int rowMin = Integer.MAX_VALUE;
            System.out.print("\t\t"); 
            for (int j = 0; j < n; j++) {
                System.out.print(matrix[i][j] + "  ");
                rowMin = Math.min(rowMin, matrix[i][j]);
            }
            System.out.println("\t| " + rowMin);
        }
        System.out.println("\t\t------------------------------");

        System.out.print("  Col Minimum\t");
        for (int j = 0; j < n; j++) {
            int colMin = Integer.MAX_VALUE;
            for (int i = 0; i < m; i++) {
                colMin = Math.min(colMin, matrix[i][j]);
            }
            System.out.print(colMin + "   ");
        }
        System.out.println("\t|");
        System.out.println("\t\t------------------------------");
        System.out.println(); 
    }

    public static void main(String[] args) {
        int m = 4;
        int n = 3;
        MAXMIN maxminObj = new MAXMIN(m, n);
        maxminObj.inputMatrix();
        maxminObj.printMatrix();
    }
}
