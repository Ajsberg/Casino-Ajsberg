const cytaty = [ //Zbiór cytatów mogących wyświetlić się pod resztą zawartości.
    "Och, tak, przecież na pewno nie ma nic ważniejszego niż przepuszczenie całej swojej pensji w kasynie.",
    "Nie no, zdecydowanie lepiej zapomnieć o płaceniu rachunków.",
    "Nie sądzisz, że Twoje pieniądze mogłyby znaleźć lepsze zastosowanie?",
    "No to co, kolejny pewniaczek?",
    "Jesteś z siebie dumny?",
    "Dobrze ci z tym?",
    '<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">KLIKNIJ MNIE ABY DOSTAĆ DARMOWE 20000 ZŁ</a>'
];

const losowyIndeks = Math.floor(Math.random() * cytaty.length); //Losowanie jednego z cytatów z tablicy i wyświetlenie go u dołu zawartości
const losowyCytat = cytaty[losowyIndeks];

const cytat = document.getElementById('cytat');

cytat.innerHTML = losowyCytat;


setTimeout(function(){ //Przeniesienie użytkownika na stronę główną po 10 sekundach od załadowania strony
    window.location.href = "index.php";
}, 10000);

// Autor: Kamil Mrowiec GitHub: https://github.com/Ajsberg/Casino-Ajsberg