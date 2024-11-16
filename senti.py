import pandas as pd

def sentiment_analysis(file_path):
    """
    Perform sentiment analysis based on time taken and correct answers.
    
    Parameters:
    - file_path: str (Path to the CSV file)
    
    Returns:
    - DataFrame with sentiment analysis results
    """
    # Read the CSV file
    try:
        data = pd.read_csv(file_path)
    except Exception as e:
        print(f"Error reading file: {e}")
        return None

    # Ensure the necessary columns are present
    if "TimeTaken" not in data.columns or "CorrectAnswers" not in data.columns:
        print("Error: CSV file must contain 'TimeTaken' and 'CorrectAnswers' columns.")
        return None
    
    # Define thresholds for sentiment
    def calculate_sentiment(row):
        time = row['TimeTaken']
        correct = row['CorrectAnswers']
        
        # Positive sentiment: Fast and high accuracy
        if time <= 30 and correct >= 80:
            return "Positive"
        # Neutral sentiment: Moderate time and correct answers
        elif 30 < time <= 60 and 50 <= correct < 80:
            return "Neutral"
        # Negative sentiment: Slow and low accuracy
        else:
            return "Negative"

    # Apply the sentiment function to the dataset
    data['Sentiment'] = data.apply(calculate_sentiment, axis=1)

    return data

# Path to your CSV file
csv_file_path = "quiz_results.csv"

# Perform sentiment analysis
results = sentiment_analysis(csv_file_path)

if results is not None:
    print(results)

    # Save the results to a new CSV file
    results.to_csv("quiz_results_with_sentiment.csv", index=False)
    print("\nSentiment analysis saved to 'quiz_results_with_sentiment.csv'.")
