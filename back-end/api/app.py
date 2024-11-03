from flask import Flask, request, jsonify
from flask_cors import CORS
import sys


# Importer les fonctions nécessaires
sys.path.append(r'C:/wamp64/www/pfa/back-end')
from modele.utile import predict_sentiment, load_model 
modVec = load_model("../modele/sentiment_model.pkl")

print(f"the model :  {modVec}")
print("sentiment :",predict_sentiment("hello ",modVec))
# Initialiser l'application Flask
app = Flask(__name__)

# Activer CORS pour l'application
CORS(app)

# Charger le modèle


@app.route('/hello', methods=['POST'])
def hello():
    data = request.json
    username = data['username']
    return jsonify({"message": f"your name is {username}"})

@app.route('/predict', methods=['POST'])
def predict():
        data = request.json
        text = data['text']
        prediction = predict_sentiment(text, modVec)
        return jsonify({"message": f"{prediction}"})

if __name__ == '__main__':
    app.run(debug=True)
