<!-- Esercizio di oggi: cartella/repo php-ajax-dischi Stampare a schermo una decina di dischi musicali (vedi screenshot). 
Utilizzare: Html, Sass, JS, VueJS, PHP Prima Milestone: Stampiamo i dischi solo con l’utilizzo di PHP, che stampa direttamente i dischi in pagina: al caricamento della pagina ci saranno tutti i dischi. 
Seconda Milestone: Attraverso l’utilizzo di axios: al caricamento della pagina axios chiederà, attraverso una chiamata api, i dischi a php e li stamperà attraverso vue. 
Bonus: Attraverso un’altra chiamata api, filtrare gli album per genere. -->

<?php 
    require __DIR__ . '/db/db.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- my style -->
    <link rel="stylesheet" href="css/style.css">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CDN Vue -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>

    <!-- CDN axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>Document</title>
</head>
<body>
    <div id="app">
        <header>
            <div class="container d-flex justify-content-center">
                <label for="genre">Seleziona un genere</label>
                <select name="genre" id="genre" @change="filterGenere" v-model="genere">
                    <option v-for="genre in arrayGeneri" :value="genre">{{genre}}</option>
                </select>
            </div>
        </header>
        <main>
            <div class="container mt-5">
                <div class="row row-cols-5 g-3">
                    <div v-for="disco in arrayFiltrato" class="col">
                        <div class="card">
                            <img :src="disco.poster" class="card-img-top" alt="album cover">
                            <h5 class="card-title">{{disco.title}}</h4>
                            <p class="card-text">{{disco.author}}</p>
                            <p class="card-text">{{disco.genre}}</p>
                            <p class="card-text">{{disco.year}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="js/script.js"></script>
</body>
</html>