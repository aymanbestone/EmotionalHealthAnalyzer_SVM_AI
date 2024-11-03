import pandas as pd
import re
import joblib
from sklearn.linear_model import LogisticRegression
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics import classification_report
from sklearn.model_selection import train_test_split

def preprocess_text(text):
    # Convert text to lowercase
    text = text.lower()
    # Remove punctuation and special characters
    text = re.sub(r'[^\w\s]', '', text)
    return text.strip()

def load_dataset(dataset_path):
    """
    Load the dataset from a CSV file.

    """
    dataset = pd.read_csv(dataset_path)
    return dataset

def preprocess_dataset(dataset):
    """
    Preprocess the dataset by applying text preprocessing to the reviews.

    """

    dataset['text'] = dataset['text'].apply(preprocess_text)  # Apply preprocessing to text
    return dataset

def split_data(X, y):
    """
    Split the dataset into training and testing sets.

    """
    X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)
    return X_train, X_test, y_train, y_test

def build_model():
    """
    Build a logistic regression model for text classification using TF-IDF Vectorizer.

    """
    vectorizer = TfidfVectorizer()
    model = LogisticRegression()
    return model, vectorizer

def train_model(X_train, y_train, model, vectorizer):
    """
    Train the logistic regression model on the training data.

    """
    X_train_vectorized = vectorizer.fit_transform(X_train)
    model.fit(X_train_vectorized, y_train)
    return model, vectorizer  # Return both the trained model and vectorizer

def evaluate_model(X_test, y_test, model):
    """
    Evaluate the logistic regression model on the test set and generate a classification report.

    """
    X_test_vectorized = model[1].transform(X_test)  # Transform using the saved vectorizer
    y_pred = model[0].predict(X_test_vectorized)  # Predict using the saved model
    evaluation_report = classification_report(y_test, y_pred)
    return evaluation_report

def save_model(model, vectorizer, filename="sentiment_model.pkl"):
    """
    Save the trained model and vectorizer to a file.

    """
    joblib.dump((model, vectorizer), filename)
    print("Model and vectorizer saved successfully.")

def main(dataset_path):
    # Load dataset
    dataset = load_dataset(dataset_path)

    # Preprocess dataset
    dataset = preprocess_dataset(dataset)

    # Split data into features (text) and labels
    X = dataset["text"]
    y = dataset["label"]

    # Split data into training and testing sets
    X_train, X_test, y_train, y_test = split_data(X, y)

    # Build model
    model, vectorizer = build_model()

    # Train model
    model = train_model(X_train, y_train, model, vectorizer)

    # Evaluate model
    evaluation_report = evaluate_model(X_test, y_test, model)
    print("Evaluation Report:")
    print(evaluation_report)

    # Save model and vectorizer
    save_model(model,vectorizer)


if __name__ == "__main__":
    dataset_path = "./data-set/mental_health.csv"
    main(dataset_path)
