const predictBtn = document.querySelector("input[type='submit']");
const sentimentInput = document.querySelector("input.sentiment");
const chatbox = document.getElementById("chatbox");

let baseUrl = "http://127.0.0.1:5000";

async function getPrediction(sentiment) {
  let response = await axios.post(`${baseUrl}/predict`, {
    text: sentiment,
  });

  let data = response.data;

  return data["message"];
}

predictBtn.addEventListener("click", async function (event) {
  event.preventDefault();

  let sentiment = sentimentInput.value;
  if (sentiment.trim() === "") return;

  // Add user's message to chatbox
  const userMessage = document.createElement('div');
  userMessage.className = 'message user-message';
  userMessage.textContent = sentiment;
  chatbox.appendChild(userMessage);

  // Clear the input field
  sentimentInput.value = '';

  // Auto-scroll to the bottom of the chatbox
  chatbox.scrollTop = chatbox.scrollHeight;

  // Get the bot's response
  let prediction = await getPrediction(sentiment);
  console.log("the prediction ", prediction ,"okey");

  // Add bot's response to chatbox
  const botMessage = document.createElement('div');
  botMessage.className = 'message bot-message';

  // Show specific message based on the prediction
  if (prediction == 1) {
    botMessage.innerHTML = `
     Here are three treasures that could make you happy in your case:
     <ul>
       <li style="list-style:none ;">-Forget the past.</li>
       <li style="list-style:none ;">-Smile more, it can improve your mood.</li>
       <li style="list-style:none ;">-Watch a good movie to relax.</li>
       <li style="list-style:none ;">-Play a fun game to entertain yourself.</li>
     </ul>
     You can do one of these activities: visit the following links:
      <ul>
        <li style="list-style: none;"><a href="https://www.happython.com/" target="_blank">SMILE</a></li>
        <li style="list-style: none;"><a href="https://www.allocine.fr/film/meilleurs/" target="_blank">WATCH MOVIES</a></li>
        <li style="list-style: none;"><a href="https://plarium.com/landings/en/desktop/raid/rdo/media/cave_f002_jt3281?plid=1388766&pxl=google_performance_max&publisherid=RAID_WW_EN_PMAX_1388766&gad_source=1&gclid=CjwKCAjwg8qzBhAoEiwAWagLrK88oMXJJU3-w8UdF0gxz-RP25IdZubV4KGe4P6VrRhu9U5Cnsi22xoC9tIQAvD_BwE" target="_blank"> PLAY GAME</a></li>
      </ul>
    `;
  } else if (prediction == 0) {
    botMessage.innerHTML = `
     Keep enjoying life.
      Here are some beautiful words for you:
      <blockquote style="color:yellow;">Life is beautiful, keep shining and inspiring others.</blockquote>
    `;
  } else {
    botMessage.textContent = "Réponse inattendue de l'API";
  }

  chatbox.appendChild(botMessage);

  // Auto-scroll to the bottom of the chatbox
  chatbox.scrollTop = chatbox.scrollHeight;
});
