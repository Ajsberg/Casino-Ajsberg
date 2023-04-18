const guzik = document.getElementById('guzikgraj'); //Zdefiniowanie guzika


function losulosu(){ //Funkcja losująca
    const stawka = Number(document.getElementById('tstawka').value);
    const mult = 20;
    const wygrana = 0;
    if(stawka > 0){
        const meritumwynik1 = Math.floor(Math.random() * 6) + 1; //Określenie losowych wartości dla wyników gry
        const meritumwynik2 = Math.floor(Math.random() * 6) + 1;
        const meritumwynik3 = Math.floor(Math.random() * 6) + 1;

        const mw1 = document.getElementById('meritumwyn1');
        const mw2 = document.getElementById('meritumwyn2');
        const mw3 = document.getElementById('meritumwyn3');
        const stawka = Number(document.getElementById('tstawka').value); //Odczytanie wysokości stawki z pola
        

        mw1.innerHTML = meritumwynik1; //Wyświetlenie wyników losowania na stronie
        mw2.innerHTML = meritumwynik2;
        mw3.innerHTML = meritumwynik3;
        if(meritumwynik1 == meritumwynik2 && meritumwynik2 == meritumwynik3){ //Wyświetlenie gratulacji w przypadku wygranej, lub napisu "SPRÓBUJ PONOWNIE" w przypadku przegranej
            const grat = document.getElementById('gratulacje');
            wygrana = stawka * mult;
            grat.innerHTML = "GRATULACJE WYGRAŁEŚ/AŚ " + wygrana + " ZŁ";
        } else {
            const grat = document.getElementById('gratulacje');
            grat.innerHTML = "SPRÓBUJ PONOWNIE";
        }
    } else {
        const grat = document.getElementById('gratulacje');
        grat.innerHTML = "PODAJ STAWKĘ I WCIŚNIJ GRAJ";
    }

    const koszt = stawka; 
    const formData = new FormData(); //Wysłanie zmian w saldzie gracza do bazy (ChatGPT)
    formData.append('koszt', koszt);
    formData.append('wygrana', wygrana);
    
    fetch('aktualizuj_saldo.php', {
      method: 'POST',
      body: formData
    })
}

guzik.addEventListener('click', losulosu);

// Autor: Kamil Mrowiec GitHub: https://github.com/Ajsberg/Casino-Ajsberg
//Szansa wygranej: Poniżej 3%