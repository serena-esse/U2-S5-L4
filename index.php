<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .info {
            margin-top: 20px;
            text-align: center;
        }
        .info p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Informazioni sulla biblioteca</h1>
        <div class="info">
        <?php

// Definizione dell'interfaccia Prestito
interface Prestito {
    public function presta();
    public function restituisci();
}

// Classe astratta MaterialeBibliotecario che implementa l'interfaccia Prestito
abstract class MaterialeBibliotecario implements Prestito {
    protected static $contatoreMateriali = 0;

    public function __construct() {
        self::$contatoreMateriali++;
    }

    public function presta() {
        echo "Il materiale è stato prestato." . PHP_EOL;
    }

    public function restituisci() {
        echo "Il materiale è stato restituito." . PHP_EOL;
    }

    public static function getContatoreMateriali() {
        return self::$contatoreMateriali;
    }
}

// Sottoclasse di MaterialeBibliotecario: Libro
class Libro extends MaterialeBibliotecario {
    private $titolo;
    private $autore;
    private $annoPubblicazione;

    public function __construct($titolo, $autore, $annoPubblicazione) {
        parent::__construct();
        $this->titolo = $titolo;
        $this->autore = $autore;
        $this->annoPubblicazione = $annoPubblicazione;
    }

    public static function contaLibri() {
        return self::$contatoreMateriali;
    }
}

// Sottoclasse di MaterialeBibliotecario: DVD
class DVD extends MaterialeBibliotecario {
    private $titolo;
    private $regista;
    private $annoPubblicazione;

    public function __construct($titolo, $regista, $annoPubblicazione) {
        parent::__construct();
        $this->titolo = $titolo;
        $this->regista = $regista;
        $this->annoPubblicazione = $annoPubblicazione;
    }

    public static function contaDVD() {
        return self::$contatoreMateriali;
    }
}

// Test dell'applicazione
$libro1 = new Libro("Il Signore degli Anelli", "J.R.R. Tolkien", 1954);
$dvd1 = new DVD("Inception", "Christopher Nolan", 2010);

$libro2 = new Libro("Cronache del ghiaccio e del fuoco", "George R.R. Martin", 1996);
$dvd2 = new DVD("Interstellar", "Christopher Nolan", 2014);

echo "Numero totale di libri nella biblioteca: " . Libro::contaLibri() . PHP_EOL;
echo "Numero totale di DVD nella biblioteca: " . DVD::contaDVD() . PHP_EOL;

// Simuliamo il prestito e la restituzione
$libro1->presta();
$libro1->restituisci();
$libro2->presta();
$dvd1->presta();
$dvd1->restituisci();

echo "Numero totale di libri nella biblioteca: " . Libro::contaLibri() . PHP_EOL;
echo "Numero totale di DVD nella biblioteca: " . DVD::contaDVD() . PHP_EOL;

?>
        </div>
    </div>
</body>
</html>
