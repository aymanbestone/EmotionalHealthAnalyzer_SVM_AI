import joblib
import re

def preprocess_text(text):
    # Convert text to lowercase
    text = text.lower()
    # Remove punctuation and special characters
    text = re.sub(r'[^\w\s]', '', text)
    return text.strip()

def load_model(model_filename="sentiment_model.pkl"):
    """
    Load the trained model and vectorizer from the file.

    """
    model, vectorizer = joblib.load(model_filename)
    return model, vectorizer

def predict_sentiment(text, modVec):
    """
    Predict the sentiment of the input text using the loaded model and vectorizer.

    """
    # Preprocess the input text
    model, vectorizer =modVec

    text_processed = preprocess_text(text)
    
    # Transform the preprocessed text into TF-IDF representation
    text_tfidf = vectorizer.transform([text_processed])
    
    # Predict the sentiment using the model
    prediction = model[0].predict(text_tfidf)
    
    return prediction[0]

# if __name__ == "__main__":
#     # Example usage
#     modVec= load_model()

    
#     texts = [
#         "I love this product!",
#         "This movie is terrible.",
#         'last strawhi everyonei  years old malewho born raised turkey then wanted go germany education without parents approvali  sisterswho  i came back germany turkey  years ago lived germany almost  years alone without anybodybefore came turkeyi knew stuff wrong check hospitali thyroid hormones high germany roommate pharmacist checked low blood sugar i unconsciousi took care issues turkeyalthough mental state also badi month without shower going germany oncei started smoking therenot much drugs thoi never liked sedatedmost life learned things myselfmy father teaching things need know childhood example proper body care maleafter came back germanyi went many psychiatrist since came backi used lot antidepressantsneurolepticsi tried break bonds friendsi cut stab knife many timesnot redflagbut forgetting emotions pains physical onei like friendsmy familymy lifemyselflooks like coming endmy doctor said parentsthat give responsibilitiesback kidmy sisters look likethey respect all ask mewhatever want please aski try answer questions thanks reading'
#         "The food was amazing."
#     ]
#     for text in texts:
#         print("Text:", text)
#         print("Predicted sentiment:", predict_sentiment(text,modVec))
