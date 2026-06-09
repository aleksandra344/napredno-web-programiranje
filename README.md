# FitLife

FitLife je web aplikacija razvijena u PHP-u i MySQL-u namijenjena korisnicima koji žele pronaći fitness vježbe, pratiti zdrav način života i koristiti korisne fitness alate.

## Funkcionalnosti

* Registracija korisnika
* Prijava i odjava korisnika
* Hashiranje lozinki pomoću `password_hash()`
* Provjera lozinke pomoću `password_verify()`
* Administracija korisnika (CRUD)
* Administracija kategorija (CRUD)
* Administracija vježbi (CRUD)
* Upload i brisanje slika vježbi
* Pregled i pretraživanje vježbi
* Galerija vježbi
* BMI kalkulator
* Kalkulator dnevnih kalorijskih potreba
* Motivacijski fitness citati
* JSON API
* XML API
* API Dashboard za pregled statistike vježbi

## Tehnologije

* PHP
* MySQL
* HTML5
* CSS3
* JavaScript
* XAMPP

## Sigurnost

* Zaštita administratorskog dijela pomoću sesija
* Hashiranje korisničkih lozinki
* Provjera prijave korisnika
* Korištenje funkcije `htmlspecialchars()` za sigurniji prikaz podataka

## Baza podataka

Projekt koristi MySQL bazu podataka **fitlife** sa sljedećim tablicama:

* users
* categories
* exercises

## Autor

Aleksandra Blažeković

Studentski projekt izrađen u sklopu kolegija Web aplikacije (2025./2026.).
