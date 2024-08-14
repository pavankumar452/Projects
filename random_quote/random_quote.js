let btn=document.getElementById('btn');
let time_of_day=document.getElementById("time_of_day");
let Quote=document.getElementById("Quote");
let background=document.getElementById("background");
let quotes=
[
    "The only way to do great work is to love what you do.",
    
    "Life is what happens when you're busy making other plans.",

    "Do not watch the clock. Do what it does. Keep going.",

     "Success is not final, failure is not fatal: It is the courage to continue that counts.",

 "It is never too late to be what you might have been.",

 "Believe you can and you're halfway there.",

 "The greatest glory in living lies not in never falling, but in rising every time we fall.",

 "It does not matter how slowly you go as long as you do not stop.",

 "Everything you've ever wanted is on the other side of fear.",

 "Act as if what you do makes a difference. It does.",
];
let Author=document.getElementById("Author");
let authors=
[
    "Steve Jobs",
    "John Lennon",
    "Sam Levenson",
    "Winston Churchill",
    "George Eliot",
    "Theodore Roosevelt",
    "Nelson Mandela",
    "Confucius",
    "George Addair",
    "William James",
]
let bcolors=
[
    "blueviolet",
    "orangered",
    "green",
    "red",
    "purple",
    "darkblue",
    "darkred",
    "darkslategray",
    "darkviolet",
    "deeppink"
]
let colors=
[
    "rgb(181, 117, 241)",
    "rgb(241, 120, 76)",
    "rgb(141, 248, 141)",
    "rgb(248, 140, 140)",
    "rgb(249, 153, 249)",
    "rgb(151, 151, 244)",
    "rgb(248, 129, 129)",
    "rgb(151, 254, 254)",
    "rgb(225, 173, 248)",
    "rgb(248, 143, 199)"
]
let body= document.body;
let timeOfDay;
function displayQuote()
{
    const time=new Date();

    if(time.getHours()<4)timeOfDay="Night";

    else if(time.getHours()<12)timeOfDay="morning";

    else if(time.getHours()<16)timeOfDay="Afternoon";

    else if(time.getHours()<21)timeOfDay="Evening";

    else TOD="Night";
    time_of_day.innerHTML=`<h3>Lets's start our ${timeOfDay} with a new quote</h3>`;

    let index=Math.floor(Math.random()*quotes.length);
    let randomQuote=quotes[index];
    let randomAuthor=authors[index];
    Quote.innerHTML=`&ldquo; ${randomQuote} &rdquo;`;
    Author.innerHTML=`-${randomAuthor}`;
    body.style.backgroundColor=bcolors[index];
    btn.style.backgroundColor=bcolors[index];
    background.style.backgroundColor=colors[index];
    btn.style.borderColor=bcolors[index];
    body.style.color=bcolors[index];
}
window.onload=function(){
    displayQuote();
};