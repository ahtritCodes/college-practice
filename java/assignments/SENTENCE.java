import java.util.Arrays;
import java.util.Scanner;

public class SENTENCE {
	private String sentence;
	private String[] words;

	// Constructor
	public SENTENCE() {
		Scanner scanner = new Scanner(System.in);
		System.out.println("\tEnter a sentence:");
		System.out.print("\t"); 
		this.sentence = scanner.nextLine();
		this.words = null;
	}

	// Method to split the sentence into words based on the given delimiter or space
	// if no delimiter is provided
	public void split(char delimiter) {
		if (delimiter == '\0') {
			words = sentence.split("\\s+");
		} else {
			words = sentence.split(String.valueOf(delimiter));
		}

		// Print words line by line
		System.out.println("\n\tWords:");
		System.out.println("\t=====");
		for (String word : words) {
			System.out.println("\t" + word);
		}
	}

	// Method to sort and print the words in ascending order
	public void sort() {
		if (words != null) {
			Arrays.sort(words);
			System.out.println("\n\tSorted Words:");
			System.out.println("\t===============");
			for (String word : words) {
				System.out.println("\t" + word);
			}
		} else {
			System.out.println("No words to sort. Please call split() method first.");
		}
	}

	// Destructor
	@Override
	protected void finalize() throws Throwable {
		System.out.println("\n\tComplete task....bye");
		super.finalize();
	}

	public static void main(String[] args) throws Throwable {
		SENTENCE sentenceObj = new SENTENCE();
		char delim = ' ';
		sentenceObj.split(delim); // Split using space as delimiter
		sentenceObj.sort();
		sentenceObj.finalize();
	}
}
