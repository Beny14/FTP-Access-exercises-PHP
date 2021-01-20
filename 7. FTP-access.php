<?php
// .............. 1 ............
// Connectarea la FTP prin PHP

    // $ftpConexiune = ftp_connect("IP");
    // ftp_login($ftpConexiune, "username", "password"); // Parametrii: obiectul de conexiune, numele de utilizator și parola
    // $listaFisiere = ftp_nlist($ftpConexiune, "www"); // Parametrii:  ftpConexiunea și folderul de pe calculatorul remote pe care trebuie să-l citească

    // foreach($listaFisiere as $fisier){
    //     echo $fisier;
    // }
/*
    Când ajungem la un anumit fișier pe care dorim să-l preluăm prin
    intermediul codului sau al interfeței de utilizator a aplicației noastre,
    putem utiliza funcția ftp_get().

    Parametrii: conexiunea FTP, 
                locația și numele fișierului de pe serverul FTP local (unde va fi salvat),
                locațiafișierului de pe serverul remote (de unde va fi preluat), 
                modul detransfer (binar sau ascii).
*/
    // ftp_get($ftpConexiune, "fisierulTinta.txt", "www/proba.txt", FTP_ASCII); 
/*
    Dacă în loc să preluăm un anumit fișier, dorim să-l punem pe serverul
    FTP, vom utiliza funcția ftp_put, în locul funcției ftp_get, cu același
    layout de parametrii.
*/
    // ftp_put($ftpConexiune, "www/proba.txt1", "proba.txt", FTP_ASCII);

/*
    Alte functii:
    ftp_delete() - șterge fișierul de pe serverul ftp, ftp_delete($ftpConexiune, "www/proba.txt");

    ftp_rename() – redenumește fișierul de pe serverul ftp, ftp_rename($conn,“vechi.txt", “nou.txt");

    ftp_mkdir() – crează foldere pe serverul ftp, ftp_mkdir($ftpConexiunea, "www/test");

    ftp_rmdir() – șterge foldere de pe serverul ftp, ftp_rmdir($ftpConexiunea, "www/test");

    ftp_size() – dimensiunea (în bytes) fișierului de pe serverul ftp, echo ftp_size($conn, “proba.txt");

    ftp_chdir() - schimbă folderul curent de pe server

    ftp_rename() - Schimbă numele fișierului de pe server

    ftp_alloc() - Pregătește spațiul pentru încărcarea (uploading) fișierelor pe serverul ftp.

    ftp_chmod() - Schimbă atributele fișierului
*/

// .............. 2 ............
/*
    Schimbarea atributelor disierului(privilegii).
    Numerele reprezintă privilegiile pe care un anumit grup le are asupra unui fișier:

    0 – nu poate să facă nimic cu fișierul
    1 – poate să activeze fișierul
    2 – poate să scrie în fișier
    3 – poate să scrie și să activeze fișierul
    4 – poate să citească din fișier
    5 – poate să citească și să activeze fișierul
    6 – poate să citească și să scrie în fișier
    7 – poate să citească, să scrie și să activeze fișierul
    Așadar, o combinație prin care toți utilizatorii pot să facă orice în fișier ar fi: 777.
*/

    // ftp_chmod($conn, 0777, 'proba.txt');

/*
    O aplicație care să copieze toate fișierele de pe un server pe altul.
*/

    // //crearea unei conexiuni ftp
    // $fconn = ftp_connect("IP_FTP");

    // //introducerea datelor de utilizator
    // ftp_login($fconn,"username","password");

    // //listarea continutului din folder. Mai intai, se descarca continutul din folder
    // $fisiere = ftp_nlist($fconn, "www");

    // //iteratia prin fiecare membru al folderului individual
    // foreach($fisier as $fisier){
    //         //daca membrul nu este un folder (este un fisier)
    //     if(!is_dir($fisier)){
    //         echo $fisier;
    //     }
    //         //copiaza, iar daca copierea este reusita, scrie: - copiat cu succes
    //     if(ftp_get($fconn, "link/".$fisier, "www/" . $fisier, FTP_ASCII)){
    //         echo " - copiat cu succes";
    //     }else{
    //         echo " - eroare in timpul copierii";
    //         echo "<br>";
    //     }
    // }
    // // inchide conexiunea
    // ftp_close($fconn);

// .............. 3 ............
/*
    Acești identificatori sunt rezultatul oricărei funcții din setul
    Non-blocking, iar status-ul de transfer poate fi verificat în orice
    moment, indiferent dacă este vorba de inițializarea transportului sau
    de punctele sale de control (ftp_nb_continue)
*/

// //initializare standard a conexiunii si login
//     $conn = ftp_connect('IP_FTP');
//     ftp_login($conn, 'username', 'password');

// //in loc de ftp_get, utilizam ftp_nb_get si atribuim rezultatul la valoare
//     $r = ftp_nb_get($conn, "fisierLocal", "www/fisierRemote", FTP_BINARY);
//     $i = 0;

// //initializam bucla care se va executa atata timp cat identificatorul returneaza o valoare
// //care nu e FTP_MOREDATA, sau cand statusul se schimba
//     while($r == FTP_MOREDATA) {

//         //atata timp cat exista date, transferul continua
//         $r = ftp_nb_continue($conn);

//         //vom afisa fiecare iteratie pentru a vedea daca programul a operat in timpul transferului
//         echo $i++ . "<br>";
//     }
?>