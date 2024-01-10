
def correct_article_placement(input_file, output_file):
    try:
        with open(input_file, 'r') as file:
            input_text = file.read()

        # Split the text into sentences
        sentences = input_text.split('.')

        # Check and correct article placement in each sentence
        corrected_sentences = []
        for sentence in sentences:
            words = sentence.split()
            if words:
                for i in range(len(words) - 1):
                    if words[i].lower() == 'a' and words[i + 1][0].lower() in ['a', 'e', 'i', 'o', 'u']:
                        words[i] = 'an'

                corrected_sentence = ' '.join(words)
                corrected_sentences.append(corrected_sentence)

        # Join the corrected sentences
        corrected_text = '. '.join(corrected_sentences)

        # Write the corrected text to the output file
        with open(output_file, 'w') as out_file:
            out_file.write(corrected_text)
            out_file.write("\n")

        print(
            f"Article placement errors corrected. Corrected text saved to {output_file}")

    except FileNotFoundError:
        print("Input file not found.")
    except Exception as e:
        print("ERROR:", e.args)


# Drive code
input_file_path = './articles.txt'
output_file_path = './output.txt'

correct_article_placement(input_file_path, output_file_path)
